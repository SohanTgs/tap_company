<?php

namespace App\Http\Controllers;

use App\BonusHistory;
use App\Deposit;
use App\Gateway;
use App\User;
use App\UserLogin;
use App\Withdrawal;
use App\WithdrawMethod;
use Carbon\Carbon;
use App\BonusSetting;
use Illuminate\Http\Request;
use App\Transaction;
use App\TransferBalance;
use App\CurrencyRate;
use App\GeneralSetting;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\Controller;

class BalanceTransferController extends Controller
{

    public function __construct()
    {
        $this->activeTemplate = activeTemplate();
    }

    public function transferForm(){
        $page_title = 'Balance Transfer';
        $currencies = CurrencyRate::where('status', 1)->first();
        $user = Auth::user();
        return view($this->activeTemplate . 'user.balance_transfer', compact('page_title', 'user', 'currencies'));
    }

    Public function transferUserSearch(Request $request){

          $senderEmail = User::where('email',$request->email)->where('id','!=',$request->currentId)->first();

          if($senderEmail){
            return ['success'=>true,'message'=>$senderEmail];
          }else{
            return ['success'=>false,'message'=>'There is no User to sent your balance'];
          }

  }


    public function checkTransferBalance(Request $request){
        $bonus_setting = BonusSetting::first();
        $amount = $request->amount;
        $afterCharge = $amount + $amount * $bonus_setting->transaction_bonus / 100;

        $fromCurrency = '';
        if ($request->from_currency == 'BDT') {
            $fromCurrency = 'balance';
        } else {
            $fromCurrency = $request->from_currency;
        }

        $currentCurrencyRates = CurrencyRate::where('status', 1)->first();
        $fromCurrecnyRate = json_decode($currentCurrencyRates->currency_rate, true)['rates'][$request->from_currency];
        $sender = Auth::user();

        if( $sender->$fromCurrency < $afterCharge ){
            return ['success' => false, 'message' => "You haven't sufficient balance to transfer from ". $request->from_currency];
        }else if( $amount == 0 ){
            return ['success' => false, 'message' => "Invalid Amount"];
        }else{
            return ['success' => true, 'message' => "Good Job!"];
        }


    }


    public function transferConfirm(Request $request){

        $currency = CurrencyRate::where('status', 1)->first();
        $currencyCode = implode(',', array_keys(json_decode($currency->currency_rate, true)['rates']));

        $request->validate([
            'receiver_id' => 'required|integer|gt:0|exists:users,id',
            'amount' => 'required|gt:0',
            'reference'=> 'required',
            'from_currency' => 'required|in:'.$currencyCode,
            'to_currency' => 'required|in:'.$currencyCode
        ]);
        return 21;
        return $this->transferConfirmChild($request);

    }

    public function transferConfirmChild($request){

        $general = GeneralSetting::first();
        $amount = $request->amount;
        $currentCurrencyRates = CurrencyRate::where('status', 1)->first();
        $fromCurrecnyRate = json_decode($currentCurrencyRates->currency_rate, true)['rates'][$request->from_currency];
        $toCurrecnyRate = json_decode($currentCurrencyRates->currency_rate, true)['rates'][$request->to_currency];

        $fromCurrency = '';
        if ($request->from_currency == 'BDT') {
            $fromCurrency = 'balance';
        } else {
            $fromCurrency = $request->from_currency;
        }

        $toCurrency = '';
        if ($request->to_currency == 'BDT') {
            $toCurrency = 'balance';
        } else {
            $toCurrency = $request->to_currency;
        }

        $afterConvertedDestinationAmount = '';
        if ($request->from_currency ==  $request->to_currency) {
            $afterConvertedDestinationAmount = $request->amount;
        } else if ($request->from_currency == 'USD') {
            $afterConvertedDestinationAmount = $fromCurrecnyRate * $amount * $toCurrecnyRate;
        } else if ($request->from_currency != 'USD') {
            $convertToUsd = 1 / $fromCurrecnyRate;
            $afterConvertedDestinationAmount = $convertToUsd * $amount * $toCurrecnyRate;
        }

        $bonus_setting = BonusSetting::first();

        $senderUser = Auth::user();
        $afterChargeAmount = $amount + $amount * $bonus_setting->transaction_bonus / 100;

        if ($senderUser->$fromCurrency < $afterChargeAmount) {
            $notify[] = ['error', "Sorry you haven't sufficient balance"];
            return back()->withNotify($notify);
        }

        $totalCharge = $amount * $bonus_setting->transaction_bonus / 100;

        $recieverUser = User::find($request->receiver_id);
        $recieverUser->$toCurrency += $afterConvertedDestinationAmount;
        $recieverUser->save();

        $senderUser->$fromCurrency -= $afterChargeAmount;
        $senderUser->save();

        if(User::find(Auth::user()->ref_by)) {
            $referralCommission = '';
            if ($request->from_currency == 'BDT') {
                $referralCommission = $totalCharge;
            } else if ($request->from_currency == 'USD') {
                $referralCommission = $totalCharge * json_decode($currentCurrencyRates->currency_rate, true)['rates'][$general->cur_text];
            } else {
                $convertedToUsd = 1 / $fromCurrecnyRate;
                $referralCommission = $totalCharge * $convertedToUsd * json_decode($currentCurrencyRates->currency_rate, true)['rates'][$general->cur_text];
            }

            $transactionFirstLevelBonus = User::find(Auth::user()->ref_by);
            $transactionFirstLevelBonus->balance += $referralCommission * $bonus_setting->transaction_bonus_first_level / 100;
            $transactionFirstLevelBonus->save();

            $bonusHistory = new BonusHistory();
            $bonusHistory->user_id = $transactionFirstLevelBonus->id;
            $bonusHistory->currency_code = $general->cur_text;
            $bonusHistory->amount = $referralCommission * $bonus_setting->transaction_bonus_first_level / 100;
            $bonusHistory->bonus_type = 'transaction_bonus_first_level';
            $bonusHistory->save();

            $transaction = new Transaction();
            $transaction->user_id = $transactionFirstLevelBonus->id;
            $transaction->currency_code = $general->cur_text;
            $transaction->amount = $referralCommission * $bonus_setting->transaction_bonus_first_level / 100;
            $transaction->post_balance = $transactionFirstLevelBonus->$fromCurrency;
            $transaction->trx_type = '+';
            $transaction->details = 'First level bonus for transfer balance';
            $transaction->trx = getTrx();
            $transaction->save();
        }
        $transactionTwo = new Transaction();
        $transactionTwo->user_id = Auth::user()->id;
        $transactionTwo->currency_code = $request->from_currency;
        $transactionTwo->amount = $amount;
        $transactionTwo->post_balance = $senderUser->$fromCurrency;
        $transactionTwo->charge = $totalCharge;
        $transactionTwo->trx_type = '-';
        $transactionTwo->details = 'Balance transter using Investment website';
        $transactionTwo->trx = getTrx();
        $transactionTwo->save();

        $transactionThree = new Transaction();
        $transactionThree->user_id = $recieverUser->id;
        $transactionThree->currency_code = $request->to_currency;
        $transactionThree->amount = $afterConvertedDestinationAmount;
        $transactionThree->post_balance = $recieverUser->$toCurrency;
        $transactionThree->charge = $totalCharge;
        $transactionThree->trx_type = '+';
        $transactionThree->details = 'Balance receiver using Investment website';
        $transactionThree->trx = getTrx();
        $transactionThree->save();

        $transfer = new TransferBalance();
        $transfer->sender = Auth::user()->id;
        $transfer->currency_code = $request->from_currency;
        $transfer->get_currency_code = $request->to_currency;
        $transfer->receiver = $recieverUser->id;
        $transfer->amount = $request->amount;
        $transfer->get_amount = $afterConvertedDestinationAmount;
        $transfer->reference = $request->reference;
        $transfer->charge = $totalCharge;
        $transfer->trx = $transactionTwo->trx;
        $transfer->save();

        $notify[] = ['success', 'Transfer your balance successfully'];
        return redirect()->route('user.transfer.history')->withNotify($notify);

    }


    public function transferHistory(){
        $page_title = 'Transfer History';
        $BalanceReceivers = TransferBalance::where('sender',Auth::user()->id)->latest()->paginate(getPaginate());
        return view($this->activeTemplate . 'user.transfer_history', compact('page_title', 'BalanceReceivers'));
    }

    public function getBalanceLogs(){
        $page_title = 'Receive Balances';
        $receiveBalances = TransferBalance::where('receiver',Auth::user()->id)->latest()->paginate(getPaginate());
        return view($this->activeTemplate . 'user.getBalances', compact('page_title', 'receiveBalances'));
    }

    public function searchReceiver(Request $request){
        $response = [];
        $value = $request->value;
        if ($value != null) {
            $response = User::where('email', 'LIKE', '%' . $value . '%')->where('id','!=',Auth::user()->id)->take(8)->get();
        } else {
            $response = '';
        }
        return $response;
    }














}
