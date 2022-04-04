<?php

namespace App\Http\Controllers;

use App\GeneralSetting;
use App\Lib\GoogleAuthenticator;
use App\Transaction;
use App\Withdrawal;
use App\WithdrawMethod;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Validator;
use Image;
use App\User;
use App\DepositLevelTree;
use App\BonusHistory;
use App\Deposit;
use App\UserPanelColor;
use App\CurrencyRate;
use Carbon\Carbon;
use DB;

class UserController extends Controller
{
    public function __construct()
    {
        $this->activeTemplate = activeTemplate();
    }

    public function home()
    {


    $dateFormat = "DATE_FORMAT(created_at, '%m, %Y')";    
    $where = ['status' => 1, 'user_id' => Auth::user()->id];
    $selectRaw = 'round(sum(amount), 2) as sum, '.$dateFormat." as month";
    $limit = 7;

    $deposits = Deposit::selectRaw($selectRaw)
    ->where($where )
    ->groupBy(DB::raw($dateFormat))
    ->latest()
    ->limit(7)
    ->get();

    $widthraws = Withdrawal::selectRaw($selectRaw)
    ->where($where)
    ->groupBy(DB::raw($dateFormat))
    ->latest()
    ->limit($limit)
    ->get();


    $months = [
        '12, 2020',
        '11, 2020',
        '10, 2020',
        '09, 2020',
        '08, 2020',
        '07, 2020',
        '06, 2020',
    ];

    // $dataObj = new \stdClass();    
    // $series1 = new \stdClass();    
    // $series1->name = "Deposit";
    // $series1->data = [];

    // $series2 = new \stdClass();    
    // $series2->name = "Withdrawal";
    // $series2->data = [];

    // $dataObj->series = [$series1, $series2];
    // $dataObj->categories = $months;


    $depositSeriesData = [31, 40, 28, 51, 22, 64, 80];
    $witdrawSeriesData = [11, 32, 67, 32, 44, 52, 41];
    foreach($months as $monthIndex => $month){
        //depoits
        if($deposits){         
            foreach($deposits as $index1 => $deposit){
                if($month == $deposit->month){
                    // $depositSeriesData [] = $deposit->sum;
                }
            }
        }

        //withdraw
        if($widthraws){
            foreach($widthraws as $index2 => $widthraw){
                if($month == $widthraw->month){
                     // $witdrawSeriesData [] = $widthraw->sum;
                }
            }
        }
    }
    // echo '<pre>'; print_r($depositSeriesData);
    //  echo '<pre>'; print_r($witdrawSeriesData);die;
  


// let depositWithdrawData = {
    //   series:  [{
    //         name: 'Desposit',
    //         data: [31, 40, 28, 51, 22, 64, 80]
    //       }, {
    //         name: 'Withdraw',
    //         data: [11, 32, 67, 32, 44, 52, 41]
    //       }], 

    //    categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'July']
    // };










$page_title = 'Dashboard';

$bonusType['regi_bonus'] = BonusHistory::where('user_id', Auth::user()->id)->where('bonus_type','regi_bonus')->sum('amount');

$bonusType['instant_bonus'] = BonusHistory::where('user_id', Auth::user()->id)->where('bonus_type','instant_bonus')->sum('amount');

$bonusType['ref_registration_bonus'] = BonusHistory::where('user_id', Auth::user()->id)->where('bonus_type','ref_registration_bonus')->sum('amount');

$bonusType['withdraw_bonus_first_level'] = BonusHistory::where('user_id', Auth::user()->id)->where('bonus_type','withdraw_bonus_first_level')->sum('amount');

$bonusType['first_level_bonus'] = BonusHistory::where('user_id', Auth::user()->id)->where('bonus_type','first_level_bonus')->sum('amount');

$bonusType['second_level_bonus'] = BonusHistory::where('user_id', Auth::user()->id)->where('bonus_type','second_level_bonus')->sum('amount');

$bonusType['third_level_bonus'] = BonusHistory::where('user_id', Auth::user()->id)->where('bonus_type','third_level_bonus')->sum('amount');

$bonusType['transaction_first_level_bonus'] = BonusHistory::where('user_id', Auth::user()->id)->where('bonus_type', 'transaction_bonus_first_level')->sum('amount');


$deposit_label = DepositLevelTree::get('title')->map(function ($query) {
    return $query->title;
});
$bonusType['total_level_bonus'] = BonusHistory::where('user_id', Auth::user()->id)->whereIn('bonus_type', $deposit_label)->sum('amount');

$myReferralLink = User::where('ref_by',Auth::user()->id)->latest()->take(5)->get();
$user = Auth::user();

        return view($this->activeTemplate . 'user.dashboard', 
            compact('page_title', 'user','bonusType', 'myReferralLink',
                'months', 'depositSeriesData', 'witdrawSeriesData'
        )
        );
    }

    public function profile()
    {
        $data['page_title'] = "Profile Setting";
        $data['user'] = Auth::user();
        $deposit= Deposit::where('user_id',Auth::user()->id)->where('status',1)->sum('amount');
        $withdraw = Withdrawal::where('user_id', Auth::user()->id)->where('status', 1)->sum('amount');
        $upline = User::find(Auth::user()->ref_by) ? : 'No Upline';

        return view($this->activeTemplate. 'user.profile-setting', $data,compact('deposit', 'upline' ,'withdraw'));
    }

    public function submitProfile(Request $request)
    {
        $user = Auth::user();
        $request->validate([
            'firstname' => 'required|string|max:50',
            'lastname' => 'required|string|max:50',
            'email' => "sometimes|required|string|email|max:255|unique:users,email,".$user->id,
            'mobile' => "sometimes|required|unique:users,mobile,".$user->id,
            'address' => "sometimes|required|max:80",
            'state' => 'sometimes|required|max:80',
            'zip' => 'sometimes|required|max:40',
            'city' => 'sometimes|required|max:50',
            'image' => 'mimes:png,jpg,jpeg'
        ],[
            'firstname.required'=>'First Name Field is required',
            'lastname.required'=>'Last Name Field is required'
        ]);


        $in['firstname'] = $request->firstname;
        $in['lastname'] = $request->lastname;
        $in['email'] = $request->email;
        $in['mobile'] = str_replace('-', '', $request->mobile);

        $in['address'] = [
            'address' => $request->address,
            'state' => $request->state,
            'zip' => $request->zip,
            'country' => $request->country,
            'city' => $request->city,
        ];


        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = time() . '_' . $user->username . '.jpg';
            $location = 'assets/images/user/profile/' . $filename;
            $in['image'] = $filename;

            $path = './assets/images/user/profile/';
            $link = $path . $user->image;
            if (file_exists($link)) {
                @unlink($link);
            }
            $size = '350x300';
            $image = Image::make($image);
            $size = explode('x', strtolower($size));
            $image->resize($size[0], $size[1]);
            $image->save($location);
        }
        $user->fill($in)->save();
        $notify[] = ['success', 'Profile Updated successfully.'];
        return back()->withNotify($notify);
    }

    public function changePassword()
    {
        $data['page_title'] = "CHANGE PASSWORD";
        return view($this->activeTemplate . 'user.password', $data);
    }

    public function submitPassword(Request $request)
    {

        $this->validate($request, [
            'current_password' => 'required',
            'password' => 'required|min:5|confirmed'
        ]);
        try {
            $user = auth()->user();
            if (Hash::check($request->current_password, $user->password)) {
                $password = Hash::make($request->password);
                $user->password = $password;
                $user->save();
                $notify[] = ['success', 'Password Changes successfully.'];
                return back()->withNotify($notify);
            } else {
                $notify[] = ['error', 'Current password not match.'];
                return back()->withNotify($notify);
            }
        } catch (\PDOException $e) {
            $notify[] = ['error', $e->getMessage()];
            return back()->withNotify($notify);
        }
    }

    /*
     * Deposit History
     */
    public function depositHistory()
    {
        $page_title = 'Deposit History';
        $empty_message = 'No history found.';
        $logs = auth()->user()->deposits()->with(['gateway'])->latest()->paginate(getPaginate());
        // return $logs;
        return view($this->activeTemplate . 'user.deposit_history', compact('page_title', 'empty_message', 'logs'));
    }

    /*
     * Withdraw Operation
     */

    public function withdrawMoney()
    {
        $data['withdrawMethod'] = WithdrawMethod::whereStatus(1)->get();
        $data['page_title'] = "Withdraw Money";
        return view(activeTemplate() . 'user.withdraw.methods', $data);
    }

    public function withdrawStore(Request $request)
    {
        $this->validate($request, [
            'method_code' => 'required',
            'amount' => 'required|numeric'
        ]);
        $method = WithdrawMethod::where('id', $request->method_code)->where('status', 1)->firstOrFail();
        $user = auth()->user();
        if ($request->amount < $method->min_limit) {
            $notify[] = ['error', 'Your Requested Amount is Smaller Than Minimum Amount.'];
            return back()->withNotify($notify);
        }
        if ($request->amount > $method->max_limit) {
            $notify[] = ['error', 'Your Requested Amount is Larger Than Maximum Amount.'];
            return back()->withNotify($notify);
        }

        if ($request->amount > $user->balance) {
            $notify[] = ['error', 'Your do not have Sufficient Balance For Withdraw.'];
            return back()->withNotify($notify);
        }


        $charge = $method->fixed_charge + ($request->amount * $method->percent_charge / 100);
        $afterCharge = $request->amount - $charge;
        $finalAmount = getAmount($afterCharge * $method->rate);

        $w['method_id'] = $method->id; // wallet method ID
        $w['user_id'] = $user->id;
        $w['amount'] = getAmount($request->amount);
        $w['currency'] = $method->currency;
        $w['rate'] = $method->rate;
        $w['charge'] = $charge;
        $w['final_amount'] = $finalAmount;
        $w['after_charge'] = $afterCharge;
        $w['trx'] = getTrx();
        $result = Withdrawal::create($w);
        session()->put('wtrx', $result->trx);
        return redirect()->route('user.withdraw.preview');
    }

    public function withdrawPreview()
    {
        $data['withdraw'] = Withdrawal::with('method','user')->where('trx', session()->get('wtrx'))->where('status', 0)->latest()->firstOrFail();
        $data['page_title'] = "Withdraw Preview";
        return view($this->activeTemplate . 'user.withdraw.preview', $data);
    }


    public function withdrawSubmit(Request $request)
    {
        $general = GeneralSetting::first();
        $withdraw = Withdrawal::with('method','user')->where('trx', session()->get('wtrx'))->where('status', 0)->latest()->firstOrFail();

        $rules = [];
        $inputField = [];
        if ($withdraw->method->user_data != null) {
            foreach ($withdraw->method->user_data as $key => $cus) {
                $rules[$key] = [$cus->validation];
                if ($cus->type == 'file') {
                    array_push($rules[$key], 'image');
                    array_push($rules[$key], 'mimes:jpeg,jpg,png');
                    array_push($rules[$key], 'max:2048');
                }
                if ($cus->type == 'text') {
                    array_push($rules[$key], 'max:191');
                }
                if ($cus->type == 'textarea') {
                    array_push($rules[$key], 'max:300');
                }
                $inputField[] = $key;
            }
        }
        $this->validate($request, $rules);
        $user = auth()->user();

        if (getAmount($withdraw->amount) > $user->balance) {
            $notify[] = ['error', 'Your Request Amount is Larger Then Your Current Balance.'];
            return back()->withNotify($notify);
        }

        $directory = date("Y")."/".date("m")."/".date("d");
        $path = imagePath()['verify']['withdraw']['path'].'/'.$directory;
        $collection = collect($request);
        $reqField = [];
        if ($withdraw->method->user_data != null) {
            foreach ($collection as $k => $v) {
                foreach ($withdraw->method->user_data as $inKey => $inVal) {
                    if ($k != $inKey) {
                        continue;
                    } else {
                        if ($inVal->type == 'file') {
                            if ($request->hasFile($inKey)) {
                                try {
                                    $reqField[$inKey] = [
                                        'field_name' => $directory.'/'.uploadImage($request[$inKey], $path),
                                        'type' => $inVal->type,
                                    ];
                                } catch (\Exception $exp) {
                                    $notify[] = ['error', 'Could not upload your ' . $request[$inKey]];
                                    return back()->withNotify($notify)->withInput();
                                }
                            }
                        } else {
                            $reqField[$inKey] = $v;
                            $reqField[$inKey] = [
                                'field_name' => $v,
                                'type' => $inVal->type,
                            ];
                        }
                    }
                }
            }
            $withdraw['withdraw_information'] = $reqField;
        } else {
            $withdraw['withdraw_information'] = null;
        }


        $withdraw->status = 2;
        $withdraw->save();
        $user->balance  -=  $withdraw->amount;
        $user->update();

        $transaction = new Transaction();
        $transaction->user_id = $withdraw->user_id;
        $transaction->currency_code = 'BDT';
        $transaction->amount = getAmount($withdraw->amount);
        $transaction->post_balance = getAmount($user->balance);
        $transaction->charge = getAmount($withdraw->charge);
        $transaction->trx_type = '-';
        $transaction->details = getAmount($withdraw->final_amount) . ' ' . $withdraw->currency . ' Withdraw Via ' . $withdraw->method->name;
        $transaction->trx =  $withdraw->trx;
        $transaction->save();

        notify($user, 'WITHDRAW_REQUEST', [
            'method_name' => $withdraw->method->name,
            'method_currency' => $withdraw->currency,
            'method_amount' => getAmount($withdraw->final_amount),
            'amount' => getAmount($withdraw->amount),
            'charge' => getAmount($withdraw->charge),
            'currency' => $general->cur_text,
            'rate' => getAmount($withdraw->rate),
            'trx' => $withdraw->trx,
            'post_balance' => getAmount($user->balance),
            'delay' => $withdraw->method->delay
        ]);

        $notify[] = ['success', 'Withdraw Request Successfully Send'];
        return redirect()->route('user.withdraw.history')->withNotify($notify);
    }

    public function withdrawLog()
    {
        $data['page_title'] = "Withdraw History";
        $data['withdraws'] = Withdrawal::where('user_id', Auth::id())->where('status', '!=', 0)->with('method')->latest()->paginate(getPaginate());
        $data['empty_message'] = "No Data Found!";
        return view($this->activeTemplate.'user.withdraw.log', $data);
    }



    public function show2faForm()
    {
        $gnl = GeneralSetting::first();
        $ga = new GoogleAuthenticator();
        $user = auth()->user();
        $secret = $ga->createSecret();
        $qrCodeUrl = $ga->getQRCodeGoogleUrl($user->username . '@' . $gnl->sitename, $secret);
        $prevcode = $user->tsc;
        $prevqr = $ga->getQRCodeGoogleUrl($user->username . '@' . $gnl->sitename, $prevcode);
        $page_title = 'Two Factor';
        return view($this->activeTemplate.'user.twofactor', compact('page_title', 'secret', 'qrCodeUrl', 'prevcode', 'prevqr'));
    }

    public function create2fa(Request $request)
    {
        $user = auth()->user();
        $this->validate($request, [
            'key' => 'required',
            'code' => 'required',
        ]);

        $ga = new GoogleAuthenticator();
        $secret = $request->key;
        $oneCode = $ga->getCode($secret);

        if ($oneCode === $request->code) {
            $user->tsc = $request->key;
            $user->ts = 1;
            $user->tv = 1;
            $user->save();


            $userAgent = getIpInfo();
            send_email($user, '2FA_ENABLE', [
                'operating_system' => $userAgent['os_platform'],
                'browser' => $userAgent['browser'],
                'ip' => $userAgent['ip'],
                'time' => $userAgent['time']
            ]);
            send_sms($user, '2FA_ENABLE', [
                'operating_system' => $userAgent['os_platform'],
                'browser' => $userAgent['browser'],
                'ip' => $userAgent['ip'],
                'time' => $userAgent['time']
            ]);


            $notify[] = ['success', 'Google Authenticator Enabled Successfully'];
            return back()->withNotify($notify);
        } else {
            $notify[] = ['error', 'Wrong Verification Code'];
            return back()->withNotify($notify);
        }
    }


    public function disable2fa(Request $request)
    {
        $this->validate($request, [
            'code' => 'required',
        ]);

        $user = auth()->user();
        $ga = new GoogleAuthenticator();

        $secret = $user->tsc;
        $oneCode = $ga->getCode($secret);
        $userCode = $request->code;

        if ($oneCode == $userCode) {

            $user->tsc = null;
            $user->ts = 0;
            $user->tv = 1;
            $user->save();


            $userAgent = getIpInfo();
            send_email($user, '2FA_DISABLE', [
                'operating_system' => $userAgent['os_platform'],
                'browser' => $userAgent['browser'],
                'ip' => $userAgent['ip'],
                'time' => $userAgent['time']
            ]);
            send_sms($user, '2FA_DISABLE', [
                'operating_system' => $userAgent['os_platform'],
                'browser' => $userAgent['browser'],
                'ip' => $userAgent['ip'],
                'time' => $userAgent['time']
            ]);


            $notify[] = ['success', 'Two Factor Authenticator Disable Successfully'];
            return back()->withNotify($notify);
        } else {
            $notify[] = ['error', 'Wrong Verification Code'];
            return back()->with($notify);
        }
    }

    public function allLevelBonus(){

    $page_title = 'Levels Bonus';
    $deposit_label = DepositLevelTree::get('title')->map(function ($query) {
        return $query->title;
    });
    $levelsBonus = BonusHistory::where('user_id', Auth::user()->id)->whereIn('bonus_type', $deposit_label)->latest()->paginate(getPaginate());

        return view($this->activeTemplate . 'user.all_level_bonus', compact('page_title', 'levelsBonus'));
    }

    public function allReferralBonus(){
        $page_title = 'Referrals Bonus';
        $referralsBonus = BonusHistory::where('user_id',Auth::user()->id)->where('bonus_type', 'ref_registration_bonus')->latest()->paginate(getPaginate());
        return view($this->activeTemplate . 'user.referral_bonus', compact('page_title', 'referralsBonus'));
    }

    public function allTrxBonus(){
        $page_title = 'Transactions Bonus For First Level';
        $transactionsBonus = BonusHistory::where('user_id', Auth::user()->id)->where('bonus_type', 'transaction_bonus_first_level')->latest()->paginate(getPaginate());
        return view($this->activeTemplate . 'user.transaction_bonus', compact('page_title', 'transactionsBonus'));
    }

   public function allWithdrawBonus(){
        $page_title = 'Withdraw Bonus For First Level';
        $withdrawBonus = BonusHistory::where('user_id', Auth::user()->id)->where('bonus_type', 'withdraw_bonus_first_level')->latest()->paginate(getPaginate());
        return view($this->activeTemplate . 'user.withdraw_bonus', compact('page_title', 'withdrawBonus'));
    }

  public function previousHistory(){
        $page_title = 'Previous History';
        $histories = Transaction::where('user_id', Auth::user()->id)->latest()->paginate(getPaginate());
        return view($this->activeTemplate . 'user.previous_history', compact('page_title', 'histories'));
    }

//   public function previousHistory(){
//         $page_title = 'Previous History';
//         $histories = Transaction::where('user_id', Auth::user()->id)->latest()->paginate(getPaginate());
//         return view($this->activeTemplate . 'user.previous_history', compact('page_title', 'histories'));
//     }


    public function instantBonus(){
        $page_title = 'Instant Bonus';
        $instantsBonus = BonusHistory::where('user_id',Auth::user()->id)->where('bonus_type','instant_bonus')->latest()->paginate(getPaginate());
        return view($this->activeTemplate . 'user.bonus_form_admin', compact('page_title','instantsBonus'));
    }

    public function allReferralsView(){
        $page_title = 'All Referrals View';
        $referrals = User::where('ref_by',Auth::user()->id)->latest()->paginate(getPaginate());
        return view($this->activeTemplate . 'user.allReferrals', compact('page_title', 'referrals'));
    }

    public function colorChange(Request $request){
        $updateThemeColor = UserPanelColor::where('user_id', Auth::user()->id)->first();
        $updateThemeColor->theme_color = $request->theme_color;
        $updateThemeColor->save();

    }

    public function colorReset(Request $request){
        $defaultThemeColor = UserPanelColor::where('user_id', Auth::user()->id)->first();
        $defaultThemeColor->theme_color = 'light light-sidebar theme-white';
        $defaultThemeColor->save();
    }

    public function transferWallet(){
        $page_title = 'Transfer Your Wallet';
        $user = Auth::user();
        $currencies = CurrencyRate::where('status', 1)->first();
        return view($this->activeTemplate . 'user.transfer_wallet', compact('page_title', 'user', 'currencies'));
    }

    public function refressRate(){
        $currecyRateApi = CurrencyRate::where('status', 1)->first();
        $currency_codes = implode(',', json_decode($currecyRateApi->currency_codes));

        $handle = curl_init('https://api.currencyfreaks.com/latest' . '?apikey=' . $currecyRateApi->api_key . '&symbols=' . $currency_codes);
        curl_setopt($handle, CURLOPT_RETURNTRANSFER, true);
        $json = curl_exec($handle);

        if(json_decode($currecyRateApi->currency_rate, true)['date'] == json_decode($json, true)['date']){
            $currecyRateApi->updated_at = Carbon::now();
            $currecyRateApi->save();
        }else{
            $currecyRateApi->currency_rate = $json;
            $currecyRateApi->save();
        }

        $notify[] = ['success', 'Current Currecy Converted Rate Updated'];
        return back()->withNotify($notify);
    }

    public function convertAmount(Request $request){
        $fromCurrency = $request->from_currency;
        $toCurrency = $request->to_currency;
        $amount = $request->amount;

        $currentCurrencyRates = CurrencyRate::where('status', 1)->first();
        $fromCurrecnyRate = json_decode($currentCurrencyRates->currency_rate, true)['rates'][$fromCurrency];
        $toCurrecnyRate = json_decode($currentCurrencyRates->currency_rate, true)['rates'][$toCurrency];

        if( $fromCurrency == 'USD' ){
            $result = number_format($fromCurrecnyRate * $amount * $toCurrecnyRate, 4);
            $output = $result.' '.$toCurrency.'<br/>'.'1 '. $fromCurrency.' = '. number_format($fromCurrecnyRate * $toCurrecnyRate, 4) .' '. $toCurrency;
            return ['success' => true, 'message' => $output];
        }
        else if( $fromCurrency != 'USD' ){
            $convertToUsd = 1 / $fromCurrecnyRate;
            $result = number_format($convertToUsd * $amount * $toCurrecnyRate, 4);
            $output = $result.' '.$toCurrency .'<br>'.'1 '.$fromCurrency.' = ' . number_format($convertToUsd * $toCurrecnyRate, 4) .' '. $toCurrency;
            return ['success' => true, 'message' => $output];
        }

    }

    public function checkConvertAmount(Request $request){

        $fromCurrency = '';
        if ($request->from_currency == 'BDT') {
            $fromCurrency = 'balance';
        } else {
            $fromCurrency = $request->from_currency;
        }

        if( $request->from_currency == $request->to_currency){
            return ['success' => false, 'message' => 'Invalid Request'];
        }
        else if( $request->amount == 0 ){
            return ['success' => false, 'message' => 'Minimum amount 1'];
        }
        else if( Auth::user()->$fromCurrency < $request->amount ){
            return ['success' => false, 'message' => 'Insufficient Balance'];
        }
        else{
            return ['success' => true, 'message' => 'Proceed'];
        }

    }

    public function transferWalletPost(Request $request){
        $currency = CurrencyRate::where('status', 1)->first();
        $currencyCode = implode(',', array_keys(json_decode($currency->currency_rate, true)['rates']));

        $request->validate([
            'from_currency' => 'required|in:'. $currencyCode,
            'to_currency' => 'required|different:from_currency|in:'. $currencyCode,
            'amount' => 'required|gt:0',
        ]);

        return $this->currentUserWalletTransfer($request);

    }

    public function currentUserWalletTransfer($request){
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

        $currentUser = Auth::user();

        if ($currentUser->$fromCurrency < $request->amount) {
            $notify[] = ['error', 'Insufficient Balance in your ' . $request->from_currency . ' wallet'];
            return back()->withNotify($notify);
        }
        else {
            if ($request->from_currency == 'USD') {
                $currentUser->$fromCurrency -= $request->amount;
                $destinationAmount = $fromCurrecnyRate * $request->amount * $toCurrecnyRate;
                $currentUser->$toCurrency += $destinationAmount;
                $currentUser->save();

                $this->createTransferWalletTransaction($currentUser, $destinationAmount, $fromCurrency, $toCurrency, $request->amount);
                $notify[] = ['success', 'Transfer your wallet from ' . $request->from_currency . ' to ' . $request->to_currency];
                return back()->withNotify($notify);
            } else if ($request->from_currency != 'USD') {
                $convertToUsd = 1 / $fromCurrecnyRate;
                $currentUser->$fromCurrency -= $request->amount;
                $destinationAmount = $convertToUsd * $request->amount * $toCurrecnyRate;
                $currentUser->$toCurrency += $destinationAmount;
                $currentUser->save();

                $this->createTransferWalletTransaction($currentUser, $destinationAmount, $fromCurrency, $toCurrency, $request->amount);
                $notify[] = ['success', 'Transfer your wallet ' . $request->from_currency . ' to ' . $request->to_currency];
                return back()->withNotify($notify);
            }
        }

    }

    public function createTransferWalletTransaction($currentUser, $destinationAmount ,$from_currency, $to_currency, $amount){

        $transaction_id = getTrx();

        $transaction = new Transaction();
        $transaction->user_id = $currentUser->id;
        $transaction->currency_code = $to_currency == 'balance' ? 'BDT' : $to_currency;
        $transaction->amount = $destinationAmount;
        $transaction->post_balance = $currentUser->$to_currency;
        $transaction->charge = '';
        $transaction->trx_type = '+';
        $transaction->details = 'Add Wallet balance from '.$from_currency;
        $transaction->trx =  $transaction_id;
        $transaction->save();

        $transaction = new Transaction();
        $transaction->user_id = $currentUser->id;
        $transaction->currency_code = $from_currency == 'balance' ? 'BDT' : $from_currency;
        $transaction->amount = $amount;
        $transaction->post_balance = $currentUser->$from_currency;
        $transaction->charge = '';
        $transaction->trx_type = '-';
        $transaction->details = 'Less Wallet balance to '. $to_currency;
        $transaction->trx =  $transaction_id;
        $transaction->save();

    }

    public function walletHistory($currency){
        $currencyTransactions = Transaction::where('user_id', Auth::user()->id)->where('currency_code', $currency)->latest()->paginate(getPaginate());
        $page_title = 'Wallet History of '. $currency;
        return view($this->activeTemplate . 'user.wallter_history', compact('page_title', 'currencyTransactions'));
    }
















}
