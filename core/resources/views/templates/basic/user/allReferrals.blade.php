@extends( $activeTemplate.'layouts.app' )

@section('panel')

<div class="main-content">

        <div class="col-lg-12"><h3 align='center'>{{ $page_title }}</h3>
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive table-responsive--sm">
                        <table class="default-data-table table ">
                            <thead>
                            <tr>
                                <th scope="col">@lang('Sl')</th>
                                <th scope="col">@lang('Name')</th>
                                <th scope="col">@lang('Email')</th>
                                <th scope="col"> @lang('Mobile')</th>
                                <th scope="col"> @lang('Join')</th>
                            </tr>
                            </thead>
                          <tbody>
                            @php($i=1)
                            @foreach($referrals as $referral)
                            <tr>
                                <td>{{ $i++ }}</td>
                                <td>
                                @if($referral->image == null)
                                    <img alt="image" style="height: 40px;border-radius:50%" src="{{ getImage('assets/images/user/profile/'.'default.png')}}" class="rounded-circle author-box-picture">
                                @else
                                    <img alt="image" style="height: 40px;border-radius:50%" src="{{ getImage('assets/images/user/profile/'. $referral->image)}}" class="rounded-circle author-box-picture">
                                @endif
                                   &nbsp; {{ $referral->firstname.' '.$referral->lastnmae }}
                                </td>
                                <td>{{ $referral->email }}</td>
                                <td>{{ $referral->mobile }}</td>
                                <td>{{ showDateTime($referral->created_at) }}</td>
                            </tr>
                            @endforeach
                          </tbody>
                        </table>
                    </div>
                </div>
                <div class="card-footer py-4">
      {{ $referrals->links() }}
              </div>
            </div>
        </div>
    </div>

@endsection


