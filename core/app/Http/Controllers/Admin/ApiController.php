<?php

namespace App\Http\Controllers\Admin;

use App\Deposit;
use App\Gateway;
use App\User;
use App\UserLogin;
use App\BonusHistory;
use App\Withdrawal;
use App\WithdrawMethod;
use App\Transaction;
use Carbon\Carbon;
use App\DepositLevelTree;
use App\CurrencyRate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;

use function GuzzleHttp\json_decode;

class ApiController extends Controller
{

    public function currencyApi()
    {   $page_title = 'Currency Conversion Rate API';
        $currenciesApi = CurrencyRate::latest()->paginate(getPaginate());
        return view('admin.api.currency', compact('page_title', 'currenciesApi'));
    }

    public function currencyApiCreate(Request $request){
        $request->validate([
            'use_all_currency' => 'required|in:0,1',
            'api_key' => 'required',
            'whole_url' => 'required',
            'currency_codes' => 'required'
        ]);
        $currencies = strtoupper(implode(',', $request->currency_codes));
        $currenciesJson = array_map('strtoupper', $request->currency_codes);
        $currecyTable = new CurrencyRate();

        $apikey = $request->api_key;
        $handle = curl_init('https://api.currencyfreaks.com/latest' . '?apikey=' . $apikey . '&symbols=' . $currencies);
        curl_setopt($handle, CURLOPT_RETURNTRANSFER, true);
        $json = curl_exec($handle);

        $handle2 = curl_init($request->whole_url);
        curl_setopt($handle2, CURLOPT_RETURNTRANSFER, true);
        $json2 = curl_exec($handle2);

        if(array_key_exists('error', json_decode($json, true))) {
            $notify[] = ['error', json_decode($json, true)['error']['message']];
            return back()->withNotify($notify);
        }
        if (array_key_exists('error', json_decode($json2, true))) {
            $notify[] = ['error', json_decode($json2, true)['error']['message']];
            return back()->withNotify($notify);
        }

        if( $request->use_all_currency == 0 ){
            $currecyTable->currency_rate = $json;
            $currecyTable->use_all_currency = $request->use_all_currency;
            $currecyTable->api_key = $request->api_key;
            $currecyTable->status = CurrencyRate::count() == 0 ? 1 : 0;
            $currecyTable->whole_url = $request->whole_url;
            $currecyTable->currency_codes = json_encode($currenciesJson);
            $currecyTable->save();
            $notify[] = ['success', 'Currency Conversion Rate API Added Successfully'];
            return back()->withNotify($notify);
        }else{
            $currecyTable->currency_rate = $json2;
            $currecyTable->use_all_currency = $request->use_all_currency;
            $currecyTable->api_key = $request->api_key;
            $currecyTable->status = CurrencyRate::count() == 0 ? 1 : 0;
            $currecyTable->whole_url = $request->whole_url;
            $currecyTable->currency_codes = json_encode($currenciesJson);
            $currecyTable->save();
            $notify[] = ['success', 'Currency Conversion Rate API Added Successfully'];
            return back()->withNotify($notify);
        }

    }

    public function currencyApiEdit(Request $request){
        $request->validate([
            'use_all_currency' => 'required|in:0,1',
            'api_key' => 'required',
            'whole_url' => 'required',
            'currency_codes' => 'required'
        ]);
        $currencies = strtoupper(implode(',', $request->currency_codes));
        $currenciesJson = array_map('strtoupper', $request->currency_codes);
        $currecyTable = CurrencyRate::find($request->up_id);

        $apikey = $request->api_key;
        $handle = curl_init('https://api.currencyfreaks.com/latest' . '?apikey=' . $apikey . '&symbols=' . $currencies);
        curl_setopt($handle, CURLOPT_RETURNTRANSFER, true);
        $json = curl_exec($handle);

        $handle2 = curl_init($request->whole_url);
        curl_setopt($handle2, CURLOPT_RETURNTRANSFER, true);
        $json2 = curl_exec($handle2);

        if(array_key_exists('error', json_decode($json, true))) {
            $notify[] = ['error', json_decode($json, true)['error']['message']];
            return back()->withNotify($notify);
        }
        if (array_key_exists('error', json_decode($json2, true))) {
            $notify[] = ['error', json_decode($json2, true)['error']['message']];
            return back()->withNotify($notify);
        }

        if ($request->status == 1) {
            CurrencyRate::where('id', '!=', $request->up_id)->update(['status' => 0]);
        }

        if ($request->use_all_currency == 0) {
            $currecyTable->currency_rate = $json;
            $currecyTable->use_all_currency = $request->use_all_currency;
            $currecyTable->api_key = $request->api_key;
            $currecyTable->status = $request->status;
            $currecyTable->whole_url = $request->whole_url;
            $currecyTable->currency_codes = json_encode($currenciesJson);
            $currecyTable->save();
            $notify[] = ['success', 'Currency Conversion Rate API Edited Successfully'];
            return back()->withNotify($notify);
        } else {
            $currecyTable->currency_rate = $json2;
            $currecyTable->use_all_currency = $request->use_all_currency;
            $currecyTable->api_key = $request->api_key;
            $currecyTable->status = $request->status;
            $currecyTable->whole_url = $request->whole_url;
            $currecyTable->currency_codes = json_encode($currenciesJson);
            $currecyTable->save();
            $notify[] = ['success', 'Currency Conversion Rate API Edited Successfully'];
            return back()->withNotify($notify);
        }

    }

    public function currencyApiRate($id){
        $page_title = 'Currency Conversion Rate';
        $currencieApiRate = CurrencyRate::find($id);
        return view('admin.api.rate', compact('page_title', 'currencieApiRate'));
    }















    }












