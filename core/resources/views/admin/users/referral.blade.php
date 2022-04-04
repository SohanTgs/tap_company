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
                                <th scope="col">@lang('Username')</th>
                                <th scope="col">@lang('Name')</th>
                                <th scope="col">@lang('Email')</th>
                                <th scope="col">@lang('Mobile')</th>
                                <th scope="col">@lang('Join')</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach ($totalReferrals as $referral)
                                <tr>
                                    <td>{{ $loop->index + 1 }}</td>
                                    <td>
                                        <a href="{{ route('admin.users.detail', $referral->id) }}">
                                            {{ __($referral->username) }}
                                        </a>
                                    </td>
                                    <td>{{ __($referral->firstname.' '.$referral->lastname) }}</td>
                                    <td>{{ __($referral->email) }}</td>
                                    <td>{{ __($referral->mobile) }}</td>
                                    <td>{{ showDateTime($referral->created_at) }}</td>
                                </tr>
                                @endforeach
                           </tbody>
                        </table><!-- table end -->
                    </div>
                </div>
                <div class="card-footer py-4">
      		{{ $totalReferrals->links('admin.partials.paginate') }}
              </div>
            </div><!-- card end -->
        </div>

    </div>

@endsection
