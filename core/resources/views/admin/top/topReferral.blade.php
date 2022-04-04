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
                                <th scope="col">@lang('Name')</th>
                                <th scope="col">@lang('Email')</th>
                                <th scope="col">@lang('Mobile')</th>
                                <th scope="col">@lang('Total Referral')</th>
                            </tr>
                            </thead>
                            <tbody>
                                 @foreach($topReferralList as $referral)
                                    <tr>
                                        <td>{{ $loop->index + 1 }}</td>
                                        <td>
                                            <a href="{{ route('admin.users.detail', $referral->ref_by) }}">
                                                {{ $referral->getRefUser->fullname }}
                                            </a>
                                        </td>
                                        <td>{{ $referral->getRefUser->email }}</td>
                                        <td>{{ $referral->getRefUser->mobile }}</td>
                                        <td>{{ $referral->count }}</td>
                                   </tr>
                                @endforeach
                           </tbody>
                        </table><!-- table end -->
                    </div>
                </div>
                <div class="card-footer py-4">
                    {{ $topReferralList->links() }}
              </div>
            </div><!-- card end -->
        </div>

    </div>

@endsection
