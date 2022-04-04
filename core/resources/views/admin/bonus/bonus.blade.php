@extends('admin.layouts.app')

@section('panel')

@if($bonusSettingData)
    <form action="{{ route('admin.bonus.setting.update') }}" method="post">
@else
    <form action="{{ route('admin.bonus.setting.save') }}" method="post">
@endif

<input type="hidden" name="id" value="{{ $bonusSettingData ? $bonusSettingData->id : '' }}">

<div class="payment-method-body">
    <div class="row">

    <div class="col-sm-12 col-md-6 col-lg-6 col-xl-4">
        <div class="card border--primary mt-2">
            <h5 class="card-header bg--primary">@lang('Registration/Singin bonus')</h5>
                <div class="card-body">
                    <div class="input-group mb-3">
                        <label class="w-100"><b>@lang('Fixed Amount')</b> <span class="text-danger">*</span></label>
                        <div class="input-group-prepend">
                            <div class="input-group-text">{{ $general->cur_text }}</div>
                        </div>
<input type="text" name="regi_bonus" class="form-control" placeholder="0" value="{{ $bonusSettingData->regi_bonus ?? '' }}"/>
                    </div>
                </div>
            </div>
        </div>
@csrf
    <div class="col-sm-12 col-md-6 col-lg-6 col-xl-4">
        <div class="card border--primary mt-2">
            <h5 class="card-header bg--primary">@lang('Instant bonus')</h5>
                <div class="card-body">
                    <div class="input-group mb-3">
                        <label class="w-100">@lang('Percentage') <span class="text-danger">*</span></label>
                        <div class="input-group-prepend">
                            <div class="input-group-text">{{ $general->cur_text }}</div>
                        </div>
<input type="text" name="instant_bonus" class="form-control" placeholder="0" value="{{ $bonusSettingData->instant_bonus ?? '' }}"/>
                    </div>
                </div>
            </div>
        </div>


    <div class="col-sm-12 col-md-6 col-lg-6 col-xl-4">
        <div class="card border--primary mt-2">
            <h5 class="card-header bg--primary">@lang('Referral signin bonus')</h5>
                <div class="card-body">
                    <div class="input-group mb-3">
                        <label class="w-100"><b>@lang('Fixed Amount')</b> <span class="text-danger">*</span></label>
                        <div class="input-group-prepend">
                            <div class="input-group-text">{{ $general->cur_text }}</div>
                        </div>
<input type="text" name="ref_registration_bonus" class="form-control" placeholder="0" value="{{ $bonusSettingData->ref_registration_bonus ?? '' }}"/>
                    </div>
                </div>
            </div>
        </div>


    {{-- <div class="col-sm-12 col-md-6 col-lg-6 col-xl-4">
        <div class="card border--primary mt-2">
            <h5 class="card-header bg--primary">@lang('Withdraw Charge')</h5>
                <div class="card-body">
                    <div class="input-group mb-3">
                        <label class="w-100">@lang('Percentage') <span class="text-danger">*</span></label>
                        <div class="input-group-prepend">
                            <div class="input-group-text">{{ $general->cur_text }}</div>
                        </div>
 <input type="text" name="withdraw_bonus" class="form-control" placeholder="0" value="{{ $bonusSettingData->withdraw_bonus ?? '' }}"/>
                    </div>
                </div>
            </div>
        </div> --}}


    {{-- <div class="col-sm-12 col-md-6 col-lg-6 col-xl-4">
        <div class="card border--primary mt-2">
            <h5 class="card-header bg--primary">@lang('First level deposit bonus')</h5>
                <div class="card-body">
                    <div class="input-group mb-3">
                        <label class="w-100">@lang('Percentage') <span class="text-danger">*</span></label>
                        <div class="input-group-prepend">
                            <div class="input-group-text">{{ $general->cur_text }}</div>
                        </div>
 <input type="text" name="first_level_bonus" class="form-control" placeholder="0" value="{{ $bonusSettingData->first_level_bonus ?? '' }}"/>
                    </div>
                </div>
            </div>
        </div> --}}


    {{-- <div class="col-sm-12 col-md-6 col-lg-6 col-xl-4">
        <div class="card border--primary mt-2">
            <h5 class="card-header bg--primary">@lang('Second level deposit bonus')</h5>
                <div class="card-body">
                    <div class="input-group mb-3">
                        <label class="w-100">@lang('Percentage') <span class="text-danger">*</span></label>
                        <div class="input-group-prepend">
                            <div class="input-group-text">{{ $general->cur_text }}</div>
                        </div>
 <input type="text" name="second_level_bonus" class="form-control" placeholder="0" value="{{ $bonusSettingData->second_level_bonus ?? '' }}"/>
                    </div>
                </div>
            </div>
        </div> --}}


        {{-- <div class="col-sm-12 col-md-6 col-lg-6 col-xl-4">
            <div class="card border--primary mt-2">
                <h5 class="card-header bg--primary">@lang('Third level deposit bonus')</h5>
                    <div class="card-body">
                        <div class="input-group mb-3">
                            <label class="w-100">@lang('Percentage') <span class="text-danger">*</span></label>
                            <div class="input-group-prepend">
                                <div class="input-group-text">{{ $general->cur_text }}</div>
                            </div>
<input type="text" name="third_level_bonus" class="form-control" placeholder="0" value="{{ $bonusSettingData->third_level_bonus ?? '' }}"/>
                        </div>
                    </div>
                </div>
            </div> --}}


    <div class="col-sm-12 col-md-6 col-lg-6 col-xl-4">
        <div class="card border--primary mt-2">
            <h5 class="card-header bg--primary">@lang('Transaction Charge')</h5>
                <div class="card-body">
                    <div class="input-group mb-3">
                        <label class="w-100">@lang('Percentage') <span class="text-danger">*</span></label>
                        <div class="input-group-prepend">
                            <div class="input-group-text">{{ $general->cur_text }}</div>
                        </div>
    <input type="text" name="transaction_bonus" class="form-control" placeholder="0" value="{{ $bonusSettingData->transaction_bonus ?? '' }}"/>
                </div>
            </div>
        </div>
    </div>


    <div class="col-sm-12 col-md-6 col-lg-6 col-xl-4">
        <div class="card border--primary mt-2">
            <h5 class="card-header bg--primary">@lang('Transaction first level bonus')</h5>
                <div class="card-body">
                    <div class="input-group mb-3">
                        <label class="w-100">@lang('Percentage') <span class="text-danger">*</span></label>
                        <div class="input-group-prepend">
                            <div class="input-group-text">{{ $general->cur_text }}</div>
                        </div>
    <input type="text" name="transaction_bonus_first_level" class="form-control" placeholder="0" value="{{ $bonusSettingData->transaction_bonus_first_level ?? '' }}"/>
                </div>
            </div>
        </div>
    </div>


    <div class="col-sm-12 col-md-6 col-lg-6 col-xl-4">
        <div class="card border--primary mt-2">
            <h5 class="card-header bg--primary">@lang('Withdraw first level Bonus')</h5>
                <div class="card-body">
                    <div class="input-group mb-3">
                        <label class="w-100">@lang('Percentage') <span class="text-danger">*</span></label>
                        <div class="input-group-prepend">
                            <div class="input-group-text">{{ $general->cur_text }}</div>
                        </div>
    <input type="text" name="withdraw_bonus_first_level" class="form-control" placeholder="0" value="{{ $bonusSettingData->withdraw_bonus_first_level ?? '' }}"/>
                </div>
            </div>
        </div>
    </div>


        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-4">

        <div class="card-body">
            <div class="input-group mb-3">
    @if($bonusSettingData)
        <input type="submit" style="background: blueviolet;color:white;" id="update_btn" value="Update" class="form-control" />
    @else
        <input type="submit" style="background: blueviolet;color:white;" name="submit_btn" value="Submit" class="form-control" />
    @endif

            </div>
        </div>

        </div>

                </div>
            </div>
        </div>
    </div>
</form>

@endsection



