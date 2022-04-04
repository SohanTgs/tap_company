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
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;

class ApiController extends Controller
{

    public function details()
    {
        return 21;
    }


}
