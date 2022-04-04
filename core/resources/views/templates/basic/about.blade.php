@extends($activeTemplate.'layouts.frontend')
@section('content')
@php
    $about = getContent('about.content',true);
@endphp

<div class="sv_about_wrapper fixed_portion float_left">

        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-12 col-sm-12">
                    <div class="border_about_wrapper float_left">
                        <div class="row">
                            <div class="col-lg-6 col-md-12 col-12 col-sm-12">
                                <div class="sv_abt_img_wrapper float_left">
                                    <img src="{{ getImage('assets/images/frontend/about/'.$about->data_values->image_one) }}" alt="img" class="img-responsive">
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-12 col-12 col-sm-12">
                                <div class="sv_abt_content_wrapper float_left">
                                    <h1>{{ __($about->data_values->first_heading) }}</h1>
                                    <p>{{ __($about->data_values->fitst_title) }}</p>
                                </div>
                                <p>{{ __($about->data_values->first_description) }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="sv_money_wrapper float_left">

        <div class="container">
            <div class="row">

                <div class="col-lg-6 col-md-12 col-12 col-sm-12">
                    <div class="sv_money_text_wrapper float_left">
                        <h1>{{ __($about->data_values->second_heading) }}</h1>
                        <h2>{{ __($about->data_values->second_title) }}<br></h2>
                        <p></p>
                        <div class="about_btn float_left inner_abt_btn">
                            <ul>
                                <li>
                                    {{ __($about->data_values->second_description) }}
                                </li>
                            </ul>
                        </div>
                    </div>

                </div>
                <div class="col-lg-6 col-md-12 col-12 col-sm-12">

                    <div class="sv_abt_img_wrapper float_left">
                        <img src="{{ getImage('assets/images/frontend/about/'.$about->data_values->image_two) }}" alt="img" class="img-responsive">
                    </div>
                </div>
            </div>
        </div>
    </div>


     <div class="counter_section float_left">
        <div class="investment_overlay"></div>
        <div class="counter-section2">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-3 col-12 col-sm-6">
                        <div class="counter_cntnt_box">
                            <div class="tb_icon investment_icon_circle">
                                <div class="icon"><i class="flaticon-bar-chart"></i>

                                </div>
                                <div class="investment_border_wrapper"></div>
                            </div>
                            <div class="count-description"><span class="timer">{{ totalGateway() }}</span>
                                <h5 class="con1"> <a href="#">Total Gateway</a></h5>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-12 col-sm-6">
                        <div class="counter_cntnt_box">
                            <div class="tb_icon investment_icon_circle blue_icon_circle">
                                <div class="icon"><i class="flaticon-user"></i>

                                </div>
                                <div class="investment_border_wrapper blue_border_wrapper"></div>
                            </div>
                            <div class="count-description"> <span class="timer">{{ totalMember() }}</span>
                                <h5 class="con2"> <a href="#"> registered users </a></h5>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-12 col-sm-6">
                        <div class="counter_cntnt_box">
                            <div class="tb_icon investment_icon_circle red_info_circle">
                                <div class="icon"><i class="flaticon-salary"></i>

                                </div>
                                <div class="investment_border_wrapper red_border_wrapper"></div>
                            </div>
                            <div class="count-description"> <span class="timer">{{ totalDeposit() }}</span>
                                <h5 class="con2"> <a href="#"> total deposit </a></h5>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-12 col-sm-6">
                        <div class="counter_cntnt_box">
                            <div class="tb_icon investment_icon_circle green_info_circle">
                                <div class="icon"><i class="flaticon-withdrawal"></i>

                                </div>
                                <div class="investment_border_wrapper green_border_wrapper"></div>
                            </div>
                            <div class="count-description"> <span class="timer">{{ totalWithdraw() }}</span>
                                <h5 class="con4"> <a href="#"> total  withdraw</a></h5>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
     </div>

@php
$topInvestor = App\Deposit::where('status',1)->groupBy('user_id')->selectRaw('sum(amount) as sum, user_id')->take(5)->get('sum','user_id');
$text = getContent('top_investor.content',true);
@endphp

<div class="investors_wrapper float_left">

        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12">

                    <div class="sv_heading_wraper index2_heading index3_heading index3_headung2">
                        <h4>{{ __($text->data_values->title) }}</h4>
                        <h3>{{ __($text->data_values->heading) }}</h3>
                        <div class="line_shape line_shape2"></div>
                    </div>
                </div>
                <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12 sw_spectrm_padding">
                    <div class="investors_slider_wrapper index2_investors_slider_Wrapper index3_investors_slider">
                        <div class="owl-carousel owl-theme">

                    @foreach($topInvestor as $value)
                            <div class="item">
                                <div class="inves_slider_cntn index2_inves_slider_cntnt index3_investment_box float_left">
                                    <div class="investment_box_wrapper index_investment float_left">

                                        <div class="inves_main_border float_left">
                                            <div class="inves_img_wrapper">
                @if($value->user->image == null)
                <img src="{{ getImage('assets/images/user/profile/'.'default.png') }}" class="img-responsive" alt="img" />
                @else
                <img src="{{ getImage('assets/images/user/profile/'.$value->user->image) }}" class="img-responsive" alt="img" />
                @endif

                                            </div>
                                            <ul class="investment_slider_icon index3_investment_slider_icon">
                                                <li style="color:black;">{{ $value->user->username }}</li>


                                            </ul>
                                            <div class="investment_content_wrapper inves_heading_txt">
                                                <h1><a href="javascript:void(0)">{{ $value->user->firstname.' '.$value->user->lastname }}</a></h1>
                                                <p>{{ number_format($value->sum,2) }}</p>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



@endsection
