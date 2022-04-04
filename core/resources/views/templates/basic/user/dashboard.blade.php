@extends($activeTemplate.'layouts.app' )

@section('panel')

<div class="main-content">
        <section class="section">
            <div class="row">
                <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <div class="card">
                    <div class="card-statistic-4">
                    <div class="align-items-center justify-content-between">
                        <div class="row ">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pr-0 pt-3">
                            <div class="card-content">
                            <h5 class="font-15">My Referral Link</h5>
                            <h2 class="mb-3 font-18">
                                <p id='p1'>{{ route('user.refer.register',['reference'=>Auth::user()->username]) }}</p>
                            </h2>
                            <p class="mb-0"><button class="btn btn-primary" onclick="copyToClipboard('#p1')">Copy</button></p>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pl-0">
                            <div class="banner-img">
                            <img src="{{asset('assets/admin/dahsboard/img/banner/1.png')}}" alt="">
                            </div>
                        </div>
                        </div>
                    </div>
                    </div>
                </div>
                </div>
                <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <div class="card">
                    <div class="card-statistic-4">
                    <div class="align-items-center justify-content-between">
                        <div class="row ">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pr-0 pt-3">
                            <div class="card-content">
                            <h5 class="font-15">Referral Registration Bonus</h5>
                            <h2 class="mb-3 font-18">{{ $bonusType['ref_registration_bonus'] }} {{ $general->cur_text }}</h2>
                            <p class="mb-0"><span class="col-orange"></span>
                                <a href="{{ route('user.referral.bonus') }}" class="btn btn-primary">View All</a>
                            </p>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pl-0">
                            <div class="banner-img">
                            <img src="{{asset('assets/admin/dahsboard/img/banner/2.png')}}" alt="">
                            </div>
                        </div>
                        </div>
                    </div>
                    </div>
                </div>
                </div>
                <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <div class="card">
                    <div class="card-statistic-4">
                    <div class="align-items-center justify-content-between">
                        <div class="row ">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pr-0 pt-3">
                            <div class="card-content">
                            <h5 class="font-15">Registration Bonus</h5>
                            <h2 class="mb-3 font-18">{{ __($bonusType["regi_bonus"]) }} {{ $general->cur_text }}</h2>
                            <p class="mb-0"><span class="col-green"></span>
                                </p>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pl-0">
                            <div class="banner-img">
                            <img src="{{asset('assets/admin/dahsboard/img/banner/3.png')}}" alt="">
                            </div>
                        </div>
                        </div>
                    </div>
                    </div>
                </div>
                </div>
                <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <div class="card">
                    <div class="card-statistic-4">
                    <div class="align-items-center justify-content-between">
                        <div class="row ">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pr-0 pt-3">
                            <div class="card-content">
                            <h5 class="font-15">BDT Balance </h5>
                            <h2 class="mb-3 font-18">{{ number_format(__($user->balance),2) }} {{ $general->cur_text }}</h2>
                            <p class="mb-0"><span class="col-green"></span>
                            <a href="{{ route('user.wallet.history', ['currency'=>'BDT']) }}" class="btn btn-primary">View All</a>
                            </p>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pl-0">
                            <div class="banner-img">
                            <img src="{{asset('assets/admin/dahsboard/img/banner/4.png')}}" alt="">
                            </div>
                        </div>
                        </div>
                    </div>
                    </div>
                </div>
                </div>
            </div>

        <div class="row ">
            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-xs-12">
              <div class="card">
                <div class="card-statistic-4">
                  <div class="align-items-center justify-content-between">
                    <div class="row ">
                      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pr-0 pt-3">
                        <div class="card-content">
                          <h5 class="font-15">Bonus From Admin</h5>
                          <h2 class="mb-3 font-18">{{ number_format($bonusType['instant_bonus'],2) }} {{ $general->cur_text }}</h2>
                          <p class="mb-0"><span class="col-green"></span>
                        <a href="{{ route('user.instant.bonus') }}" class="btn btn-primary">View All</a>
                        </p>
                        </div>
                      </div>
                      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pl-0">
                        <div class="banner-img">

                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-xs-12">
              <div class="card">
                <div class="card-statistic-4">
                  <div class="align-items-center justify-content-between">
                    <div class="row ">
                      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pr-0 pt-3">
                        <div class="card-content">
                          <h5 class="font-15">Total Levels Bonus For Deposit</h5>
                          <h2 class="mb-3 font-18">{{ number_format($bonusType['total_level_bonus'],2) }} {{ $general->cur_text }}</h2>
                          <p class="mb-0"><span class="col-green"></span>
                        <a href="{{ route('user.all.level.bonus') }}" class="btn btn-primary">View All</a>
                        </p>
                        </div>
                      </div>
                      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pl-0">
                        <div class="banner-img">

                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-xs-12">
              <div class="card">
                <div class="card-statistic-4">
                  <div class="align-items-center justify-content-between">
                    <div class="row ">
                      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pr-0 pt-3">
                        <div class="card-content">
                          <h5 class="font-15">First Level Bonus For Withdraw</h5>
                          <h2 class="mb-3 font-18">{{ number_format($bonusType['withdraw_bonus_first_level'],2) }} {{ $general->cur_text }}</h2>
                          <p class="mb-0"><span class="col-green"></span>
                        <a href="{{ route('user.withdraw.bonus') }}" class="btn btn-primary">View All</a>
                        </p>
                        </div>
                      </div>
                      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pl-0">
                        <div class="banner-img">

                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
             <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-xs-12">
              <div class="card">
                <div class="card-statistic-4">
                  <div class="align-items-center justify-content-between">
                    <div class="row ">
                      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pr-0 pt-3">
                        <div class="card-content">
                          <h5 class="font-15">First Level Bonus For Transfer Money</h5>
                          <h2 class="mb-3 font-18">{{ number_format($bonusType['transaction_first_level_bonus'],2) }} {{ $general->cur_text }}</h2>
                          <p class="mb-0"><span class="col-green"></span>
                         <a href="{{ route('user.transaction.bonus') }}" class="btn btn-primary">View All</a>
                        </p>
                        </div>
                      </div>
                      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pl-0">
                        <div class="banner-img">

                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
        </div>

          <div class="row justify-content-xl-between">
            <div class="col-xl col-md-4 col-sm-6">
                <div class="card l-bg-purple">
                  <div class="card-statistic-3">
                    <div class="card-icon card-icon-large"><i class="fa fa-dollar-sign"></i></div>
                    <div class="card-content">
                      <h4 class="card-title">USD Balance</h4>
                      <h5>{{ number_format($user->USD, 2) }}</h5>
                      <p class="mb-0 text-sm">
                        <span class="mr-2"> </span>
                        <span class="text-nowrap">
                            <a href="{{ route('user.wallet.history', ['currency'=>'USD']) }}" class="btn btn-primary">View All</a>
                        </span>
                      </p>
                    </div>
                  </div>
                </div>
            </div>
             <div class="col-xl col-md-4 col-sm-6">
                <div class="card l-bg-purple">
                  <div class="card-statistic-3">
                    <div class="card-icon card-icon-large"><i class="fa fa-euro-sign"></i></div>
                    <div class="card-content">
                      <h4 class="card-title">EUR Balance</h4>
                      <h5>{{ number_format($user->EUR, 2) }}</h5>
                      <p class="mb-0 text-sm">
                        <span class="mr-2"></span>
                         <span class="text-nowrap">
                            <a href="{{ route('user.wallet.history', ['currency'=>'EUR']) }}" class="btn btn-primary">View All</a>
                        </span>
                      </p>
                    </div>
                  </div>
                </div>
            </div>
             <div class="col-xl col-md-4 col-sm-6">
                <div class="card l-bg-purple">
                  <div class="card-statistic-3">
                    <div class="card-icon card-icon-large"><i class="fab fa-btc" style="font-size:100px"></i></div>
                    <div class="card-content">
                      <h4 class="card-title">BTC Balance</h4>
                      <h5>{{ number_format($user->BTC, 2) }}</h5>
                      <p class="mb-0 text-sm">
                        <span class="mr-2"></span>
                         <span class="text-nowrap">
                            <a href="{{ route('user.wallet.history', ['currency'=>'BTC']) }}" class="btn btn-primary">View All</a>
                        </span>
                      </p>
                    </div>
                  </div>
                </div>
            </div>
             <div class="col-xl col-md-4 col-sm-6">
                <div class="card l-bg-purple">
                  <div class="card-statistic-3">
                    <div class="card-icon card-icon-large"><i class="fa fa-pound-sign"></i></div>
                    <div class="card-content">
                      <h4 class="card-title">GBP Balance</h4>
                      <h5>{{ number_format($user->GBP, 2) }}</h5>
                      <p class="mb-0 text-sm">
                        <span class="mr-2"></span>
                        <span class="text-nowrap">
                            <a href="{{ route('user.wallet.history', ['currency'=>'GBP']) }}" class="btn btn-primary">View All</a>
                        </span>
                      </p>
                    </div>
                  </div>
                </div>
            </div>
             <div class="col-xl col-md-4 col-sm-6">
                <div class="card l-bg-purple">
                  <div class="card-statistic-3">
                    <div class="card-icon card-icon-large"><i class="fa fa-coins"></i></div>
                    <div class="card-content">
                      <h4 class="card-title">LTC Balance</h4>
                      <h5>{{ number_format($user->LTC, 2) }}</h5>
                      <p class="mb-0 text-sm">
                        <span class="mr-2"></span>
                         <span class="text-nowrap">
                            <a href="{{ route('user.wallet.history', ['currency'=>'LTC']) }}" class="btn btn-primary">View All</a>
                        </span>
                      </p>
                    </div>
                  </div>
                </div>
            </div>
          </div>

          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <h4>My Referral Links</h4>
                  <div class="card-header-form">
                    <form>
                      <div class="input-group">
                        <input type="text" class="form-control" placeholder="Search">
                        <div class="input-group-btn">
                          <button class="btn btn-primary"><i class="fas fa-search"></i></button>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
                <div class="card-body p-0">
                  <div class="table-responsive">
                    <table class="table table-striped">
                      <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Mobile</th>
                        <th>Join</th>
                      </tr>
                @foreach($myReferralLink as $link)
                      <tr>
                        <td>
                        @if($link->image == null)
                            <img alt="image" style="height: 40px;border-radius:50%" src="{{ getImage('assets/images/user/profile/'.'default.png')}}" class="rounded-circle author-box-picture">
                        @else
                            <img alt="image" style="height: 40px;border-radius:50%" src="{{ getImage('assets/images/user/profile/'. $user->image)}}" class="rounded-circle author-box-picture">
                        @endif
                        &nbsp; {{ __($link->firstname.' '.$link->lastname) }}</td>
                        <td>{{ __($link->email) }}</td>
                        <td class="text-truncate">
                            {{ $link->mobile }}
                        </td>
                        <td>
                          <div class="badge badge-success">{{ showDateTime($link->created_at) }}</div>
                        </td>
                      </tr>
                @endforeach
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>

        </section>

        <div class="row">
            <div class="col-12 col-sm-12 col-lg-4">
              <div class="card">
                <div class="card-header">
                  <h4>Chart</h4>
                </div>
                <div class="card-body">
                  <div id="depositWithdrawChart" class="chartsh"></div>
                </div>
              </div>
            </div>
            <div class="col-12 col-sm-12 col-lg-4">
              <div class="card">
                <div class="card-header">
                  <h4>Chart</h4>
                </div>
                <div class="card-body">
                  <div class="summary">
                    <div class="summary-chart active" data-tab-group="summary-tab" id="summary-chart">
                      <div id="chart3" class="chartsh"></div>
                    </div>
                    <div data-tab-group="summary-tab" id="summary-text">
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-12 col-sm-12 col-lg-4">
              <div class="card">
                <div class="card-header">
                  <h4>Chart</h4>
                </div>
                <div class="card-body">
                  <div id="chart2" class="chartsh"></div>
                </div>
              </div>
            </div>
          </div>

      </div>

    </div>



@endsection


@push('script')
<script>
    function copyToClipboard(element) {
        var $temp = $("<input>");
        $("body").append($temp);
        $temp.val($(element).text()).select();
        document.execCommand("copy");
        $temp.remove();
    }

$(document).ready(function(){
  _intChart();

});   

function _intChart(){
   /* Set Deposit Wtidraw Chart */
   let depositWithdrawData = {
      series:  [{
            name: 'series1',
            // data: [31, 40, 28, 51, 22, 64, 80]
            data: '<?php echo json_encode($depositSeriesData); ?>'
          }, {
            name: 'series2',
            // data: [11, 32, 67, 32, 44, 52, 41]
             data: '<?php echo json_encode($witdrawSeriesData); ?>'
          }], 

       // categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'July']
       categories: '<?php echo json_encode($months); ?>'
    };  

   setDepositWithdrawChart(depositWithdrawData);
}
console.log('series1: ', '<?php echo json_encode($months); ?>');

</script>

@endpush
