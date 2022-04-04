<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Transaction;
use App\CurrencyRate;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function transaction()
    {   $currencies = CurrencyRate::first();
        $currencies_code = json_decode($currencies->currency_rate, true)['rates'];
        $page_title = 'Transaction Logs';
        $transactions = Transaction::with('user')->latest()->paginate(getPaginate());
        $empty_message = 'No transactions.';
        return view('admin.reports.transactions', compact('page_title', 'currencies_code', 'transactions', 'empty_message'));
    }

    public function transactionSearch(Request $request)
    {
        $request->validate(['search' => 'required']);
        $search = $request->search;
        $page_title = 'Transactions Search - ' . $search;
        $empty_message = 'No transactions.';

        $transactions = Transaction::with('user')->whereHas('user', function ($user) use ($search) {
            $user->where('username', 'like',"%$search%");
        })->orWhere('trx', $search)->paginate(getPaginate());

        return view('admin.reports.transactions', compact('page_title', 'transactions', 'empty_message'));
    }

    public function currencyWiseTransaction($id, $wallet){
        $page_title = 'Transactions Wise Log for '.$wallet;
        $empty_message = 'No transactions';
        $transactions = '';
        if($id == 'all'){
            $transactions = Transaction::where('currency_code', $wallet)->latest()->paginate(getPaginate());
        }else{
            $transactions = Transaction::where('user_id', $id)->where('currency_code', $wallet)->latest()->paginate(getPaginate());
        }

        return view('admin.wallet.transactions', compact('page_title', 'transactions', 'empty_message'));
    }






}
