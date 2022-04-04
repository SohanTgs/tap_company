@php

$banner_two = getContent('banner_two.content',true);
$texts = getContent('banner_two.element');

@endphp


<div class="about_us_wrapper index2_about_us_wrapper index3_about_us float_left">
        <div class="container">
            <div class="row">

                <div class="col-xl-6 col-md-12 col-lg-12 col-sm-12 col-12">
                    <div class="about_content_wrapper">
                        <div class="sv_heading_wraper index2_heading index3_heading index3_headung2">
                            <h4>{{ __($banner_two->data_values->title) }}</h4>
                            <h3>{{ __($banner_two->data_values->heading) }}</h3>
                            <div class="line_shape line_shape2"></div>
                        </div>
                        <div class="welcone_savehiyp float_left">
                            <p>{{ __($banner_two->data_values->paragraph) }}</p>
                            <div class="welcome_save_inpvate_wrapper index3_welcome_checkbox">
                                <ul>
                                @foreach($texts as $text)
                                    <li class="blue_inovate">
                                        <a href="javascript:void(0)"><i class="flaticon-check-box"></i>
                                            {{ __($text->data_values->text) }}
                                        </a></li>
                                @endforeach
                                </ul>
                            </div>
                            <div class="about_btn index3_about_btn float_left">
                                <ul>
                                    <li>
                                        <a href="{{ __($banner_two->data_values->button_link) }}">
                                            {{ __($banner_two->data_values->button_text) }}
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-6 col-md-12 col-lg-12 col-sm-12 col-12">
                    <div class="index3_about_img_wrapper">

                        <img src="{{ getImage('assets/images/frontend/banner_two/'.$banner_two->data_values->image) }}" alt="About" class="img-responsive">

                    </div>
                </div>
            </div>
        </div>
    </div>
