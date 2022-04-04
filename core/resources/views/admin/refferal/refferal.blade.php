@extends('admin.layouts.app')

@section('panel')

<div class="row">

       <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive table-responsive--sm">
                        <table class="default-data-table table ">
                            <thead>
                            <tr>
                                <th scope="col">@lang('SL')</th>
                                <th scope="col">@lang('User Email')</th>
                                <th scope="col">@lang('Bonus Type')</th>
                                <th scope="col">@lang('Amount')</th>
                                <th scope="col">@lang('Time')</th>
                            </tr>
                            </thead>
                            <tbody>
                                 @foreach($refferalBonuses as $referral)
                                    <tr>
                                        <td>{{ $loop->index + 1 }}</td>
                                        <td>
                                            <a href="{{ route('admin.users.detail', $referral->user_id) }}">
                                                {{ $referral->registrationBonusUser->fullname }}
                                            </a>
                                        </td>
                                        <td>{{ $referral->bonus_type }}</td>
                                        <td>{{ $referral->amount }} {{ $referral->currency_code }}</td>
                                        <td>{{ showDateTime($referral->created_at) }}</td>
                                   </tr>
                                @endforeach
                           </tbody>
                        </table><!-- table end -->
                    </div>
                </div>
                <div class="card-footer py-4">
                    {{ $refferalBonuses->links() }}
              </div>
            </div><!-- card end -->
        </div>

    </div>

@endsection
