@php
$banner_one = getContent('banner_one.content',true);
$links = getContent('banner_one.element');
@endphp

<div class="slider-area slider_index2_wrapper slider_index3_wrapper  float_left">
        <div class="bg-animation">
            <img class="zoom-fade" src="{{asset($activeTemplateTrue.'bkash/images/pattern.png')}}" alt="img">
        </div>
        <div class="index2_sliderbg index3_sliderbg">
            <img src="{{ getImage('assets/images/frontend/banner_one/'.$banner_one->data_values->background_image) }}" alt="img" class="img-responsive">
        </div>
        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner" role="listbox">
                <div class="carousel-item active">
                    <div class="carousel-captions caption-1">
                        <div class="container">
                            <div class="row">
                                <div class="col-xl-6 col-lg-10 col-md-12 col-sm-12 col-12">
                                    <div class="content">

                                        <h2 data-animation="animated bounceInUp">
                                            {{ __($banner_one->data_values->hilight_one) }}
                                        </h2>

                                        <h3 data-animation="animated bounceInUp">
                                            {{ __($banner_one->data_values->heading_one) }}
                                        </h3>
                                        <p data-animation="animated bounceInUp">
                                            {{ __($banner_one->data_values->title_one) }}
                                        </p>

                                        <div class="slider_btn index2_sliderbtn index3_sliderbtn float_left">
                                            <ul>
                                                {{-- <li data-animation="animated bounceInLeft">
                                                    <a href="#">start now</a>
                                                </li> --}}
                                                <li data-animation="animated bounceInLeft">
                                                    <a href="{{ $banner_one->data_values->button_one_link }}">
                                                        {{ __($banner_one->data_values->button_one_text) }}
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                        <div data-animation="animated bounceInLeft" class="social_link_foter slider_btm_icon_links">
                                            <ul>
                                            @foreach($links as $link)
                                              <li>
                                                  <a href="{{ $link->data_values->social_link }}">
                                                     @php echo $link->data_values->social_icon @endphp
                                                  </a>
                                              </li>
                                            @endforeach
                                            </ul>
                                        </div>
                                        <div class="clear"></div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="carousel-captions caption-2">
                        <div class="container">
                            <div class="row">
                                <div class="col-xl-6 col-lg-10 col-md-12 col-sm-12 col-12">
                                    <div class="content">

                                        <h2 data-animation="animated bounceInUp">
                                            {{ __($banner_one->data_values->hilight_two) }}
                                        </h2>

                                        <h3 data-animation="animated bounceInUp">
                                            {{ __($banner_one->data_values->heading_two) }}
                                        </h3>

                                        <p data-animation="animated bounceInUp">
                                            {{ __($banner_one->data_values->title_two) }}
                                        </p>

                                        <div class="slider_btn index2_sliderbtn index3_sliderbtn float_left">
                                            <ul>
                                                <li data-animation="animated bounceInLeft">
                                                    <a href="{{ $banner_one->data_values->button_two_link }}">
                                                        {{ __($banner_one->data_values->button_two_text) }}
                                                    </a>
                                                </li>
                                                {{-- <li data-animation="animated bounceInLeft">
                                                    <a href="#">view plans</a>
                                                </li> --}}
                                            </ul>
                                        </div>
                                        <div data-animation="animated bounceInLeft" class="social_link_foter slider_btm_icon_links">
                                             <ul>
                                            @foreach($links as $link)
                                              <li>
                                                  <a href="{{ $link->data_values->social_link }}">
                                                     @php echo $link->data_values->social_icon @endphp
                                                  </a>
                                              </li>
                                            @endforeach
                                            </ul>
                                        </div>
                                        <div class="clear"></div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>


                <ol class="carousel-indicators">

                    <li data-target="#carousel-example-generic" data-slide-to="0" class="active"><span class="number">01</span>
                    </li>
                    <li data-target="#carousel-example-generic" data-slide-to="1" class=""><span class="number">02</span>
                    </li>

                </ol>
                <div class="carousel-nevigation">
                    <a class="prev" href="#carousel-example-generic" role="button" data-slide="prev"> <span></span> <i class="flaticon-left-arrow"></i>
                    </a>
                    <a class="next" href="#carousel-example-generic" role="button" data-slide="next"> <span></span> <i class="flaticon-arrow-pointing-to-right"></i>
                    </a>
                </div>
            </div>
        </div>

    </div>
