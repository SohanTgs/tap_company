@php
$features = getContent('features.element')->take(4);
$text = getContent('features.content',true);
@endphp
<div class="investment_plans index2_investment_plans index3_investment_plans float_left">

        <div class="container">
            <div class="row">

                <div class="col-md-12 col-lg-12 col-sm-12 col-12">
                    <div class="sv_heading_wraper heading_wrapper_dark dark_heading index2_heading index2_heading_center index3_heading ">
                        <h4>{{ __($text->data_values->heading) }}</h4>
                        <h3>{{ __($text->data_values->title) }}</h3>
                        <div class="line_shape line_shape2"></div>
                    </div>
                </div>

@foreach($features as $feature)
                <div class="col-xl-3 col-md-6 col-lg-6 col-sm-6 col-12">
                    <div class="investment_box_wrapper index2_investment_box_Wraper index3_investment_box_Wraper float_left">
                        <img src="{{asset($activeTemplateTrue.'bkash/images/in2.png')}}" alt="img">
                        <div class="investment_icon_circle">
                            @php
                                echo $feature->data_values->icon
                            @endphp
                        </div>
                        <div class="investment_border_wrapper"></div>
                        <div class="investment_content_wrapper">
                            <h1><a href="#">{{ __($feature->data_values->feature_name) }}</a></h1>
                            <div class="line_shape line_shape2"></div>
                            <p>
                                {{ __($feature->data_values->paragraph) }}
                            </p>
                        </div>
                        <div class="about_btn plans_btn index2_investment_btn">
                            <ul>
                                <li>
                                    <a href="javascript:void(0)">{{ __($feature->data_values->feature_name) }}</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
@endforeach

            </div>
        </div>
    </div>
    <div class="btm_investment_wrapper float_left">
        <div class="investment_overlay"></div>
    </div>
