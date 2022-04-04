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
                <img src="{{ getImage('assets/images/user/profile/'.'default.png') }}" style="height: 225px" class="img-responsive" alt="img" />
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
