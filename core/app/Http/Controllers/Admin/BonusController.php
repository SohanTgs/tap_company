<?php

namespace App\Http\Controllers\Admin;

use App\Deposit;
use App\Gateway;
use App\DepositLevelTree;
use App\User;
use App\UserLogin;
use App\Withdrawal;
use App\WithdrawMethod;
use Carbon\Carbon;
use App\BonusSetting;
use App\BonusHistory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\Controller;

class BonusController extends Controller
{

	public function bonusPage(){
        $page_title = 'Bonus Setting';
        $bonusSettingData = BonusSetting::first();
		return view('admin.bonus.bonus',compact('page_title','bonusSettingData'));
	}

    public function bonusSettingSave(Request $request){
        // return $request->all();
        $request->validate([
            'regi_bonus' => 'gte:0',
            'instant_bonus' => 'gte:0',
            'ref_registration_bonus' => 'gte:0',
            'withdraw_bonus' => 'gte:0',
            'first_level_bonus' => 'gte:0',
            'second_level_bonus' => 'gte:0',
            'third_level_bonus' => 'gte:0'
        ]);

        $bonusSettingData = new BonusSetting();
        $bonusSettingData->regi_bonus = $request->regi_bonus;
        $bonusSettingData->instant_bonus = $request->instant_bonus;
        $bonusSettingData->ref_registration_bonus = $request->ref_registration_bonus;
        $bonusSettingData->withdraw_bonus = $request->withdraw_bonus;
        $bonusSettingData->first_level_bonus = $request->first_level_bonus;
        $bonusSettingData->second_level_bonus = $request->second_level_bonus;
        $bonusSettingData->third_level_bonus = $request->third_level_bonus;
        $bonusSettingData->transaction_bonus = $request->transaction_bonus;
        $bonusSettingData->withdraw_bonus_first_level = $request->withdraw_bonus_first_level;
        $bonusSettingData->transaction_bonus_first_level = $request->transaction_bonus_first_level;
        $bonusSettingData->save();

        $notify[] = ['success', 'Bonous data saved successfully'];
        return back()->withNotify($notify);
    }

    public function bonusSettingUpdate(Request $request){
        $request->validate([
            'regi_bonus' => 'gte:0',
            'instant_bonus' => 'gte:0',
            'ref_registration_bonus' => 'gte:0',
            'withdraw_bonus' => 'gte:0',
            'first_level_bonus' => 'gte:0',
            'second_level_bonus' => 'gte:0',
            'third_level_bonus' => 'gte:0'
        ]);

        $bonusDataUpdate = BonusSetting::find($request->id);
        $bonusDataUpdate->regi_bonus = $request->regi_bonus;
        $bonusDataUpdate->instant_bonus = $request->instant_bonus;
        $bonusDataUpdate->ref_registration_bonus = $request->ref_registration_bonus;
        $bonusDataUpdate->withdraw_bonus = $request->withdraw_bonus;
        $bonusDataUpdate->first_level_bonus = $request->first_level_bonus;
        $bonusDataUpdate->second_level_bonus = $request->second_level_bonus;
        $bonusDataUpdate->third_level_bonus = $request->third_level_bonus;
        $bonusDataUpdate->transaction_bonus = $request->transaction_bonus;
        $bonusDataUpdate->withdraw_bonus_first_level = $request->withdraw_bonus_first_level;
        $bonusDataUpdate->transaction_bonus_first_level = $request->transaction_bonus_first_level;
        $bonusDataUpdate->save();

        $notify[] = ['success', 'Bonous data edited successfully'];
        return back()->withNotify($notify);
    }

    public function depositLevelTree(){
        $page_title = 'Deposit Level Tree';
        $empty_message = 'No Date';
        $depositLevels = DepositLevelTree::orderBy('level_order', 'ASC')->paginate(getPaginate());
        return view('admin.deposit_level.tree', compact('page_title', 'depositLevels', 'empty_message'));
    }

    public function depositLevelTreeCreate(Request $request){
        $request->validate([
            'title' => 'string|max:90|required',
            'level_order' => 'integer|gt:0|required',
            'percent' => 'gte:0|required'
        ]);

        $newDepositLevel = new DepositLevelTree();

        if( $newDepositLevel->count()+1 == $request->level_order ){
            $newDepositLevel->title = $request->title;
            $newDepositLevel->level_order = $request->level_order;
            $newDepositLevel->percent = $request->percent;
            $newDepositLevel->status = 1;
            $newDepositLevel->save();

            $notify[] = ['success', 'Deposit Level Tree Created Successfully'];
            return back()->withNotify($notify);
        }else{
            $notify[] = ['error', 'Invalid Request'];
            return back()->withNotify($notify);
        }

    }

    public function depositLevelTreeEdit(Request $request){
        $request->validate([
            'id' => 'integer|required',
            'percent' => 'gte:0|required'
        ]);
        $depositTreeLevel = DepositLevelTree::find($request->id);
        $depositTreeLevel->percent = $request->percent;
        $depositTreeLevel->save();

        $notify[] = ['success', 'Deposit Level Tree Edited Successfully'];
        return back()->withNotify($notify);
    }

    public function depositLevelTreeDelete(Request $request){
        $request->validate([
            'id' => 'integer|required|gt:0',
        ]);

        $lastLevel =  DepositLevelTree::latest()->first()->level_order;
        $deleteDepositTree = DepositLevelTree::find($request->id);
        if( $lastLevel == $deleteDepositTree->level_order ){
            $deleteDepositTree->delete();

            $notify[] = ['success', 'Deposit Level Tree Deleted Successfully'];
            return back()->withNotify($notify);
        }else{
            $notify[] = ['error', 'Invalid Request'];
            return back()->withNotify($notify);
        }

    }

    public function totalDepositBonus(){
        $page_title = 'Total Deposit Bonus';
        $empty_message = 'No Date';

        $deposit_label = DepositLevelTree::get('title')->map(function ($query) {
            return $query->title;
        });
        $totalDeposits = BonusHistory::whereIn('bonus_type', $deposit_label)->latest()->paginate(getPaginate());

        return view('admin.deposit.bonus', compact('page_title', 'totalDeposits', 'empty_message'));
    }












}
