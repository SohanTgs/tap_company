<?php

namespace App\Http\Controllers\Admin;

use App\Transaction;
use App\BonusHistory;
use App\BonusSetting;
use App\User;
use App\TransferBalance;
use App\Http\Controllers\Controller;

class TransferHistoryController extends Controller
{

    public function history(){
        $page_title = 'Transfer History';
        $transfersHistories = TransferBalance::latest()->paginate(getPaginate());
        return view('admin.transfer.history',compact('page_title', 'transfersHistories'));
    }

    public function provideBonusForm(){
        $userCount = User::count();
        $page_title = 'Provide Bonus';
        $bonus_from_admin = BonusHistory::where('bonus_type', 'instant_bonus')->sum('amount');
        return view('admin.provide.bonus',compact('page_title', 'bonus_from_admin', 'userCount'));
    }

    public function provideBonusConfirm(){

        $bonus_setting = BonusSetting::first();
        $users = User::all();

        foreach ($users as $user) {

            $bonus_history = new BonusHistory();
            $bonus_history->user_id = $user->id;
            $bonus_history->currency_code = 'BDT';
            $bonus_history->amount = $user->balance * $bonus_setting->instant_bonus / 100;
            $bonus_history->bonus_type = 'instant_bonus';
            $bonus_history->save();

            $user->balance += $user->balance * $bonus_setting->instant_bonus / 100;
            $user->save();

            $transaction = new Transaction();
            $transaction->user_id = $user->id;
            $transaction->currency_code = 'BDT';
            $transaction->amount = $bonus_history->amount;
            $transaction->post_balance = $user->balance;
            $transaction->trx_type = '+';
            $transaction->trx = getTrx();
            $transaction->details = 'Receiver bonus from admin of my current balance';
            $transaction->save();

        }

        $notify[] = ['success', 'Bonous provided Successfully'];
        return back()->withNotify($notify);
    }





}
