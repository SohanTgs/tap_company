@php
    $gateways =  App\Gateway::all();
    $gateway = getContent('accept_gateway.content',true);
@endphp

<div class="payments_wrapper float_left">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12">

                    <div class="sv_heading_wraper index2_heading index3_heading index3_headung2">
                        <h4>{{ __($gateway->data_values->title) }}</h4>
                        <h3>{{ __($gateway->data_values->heading) }}</h3>
                        <div class="line_shape line_shape2"></div>
                    </div>
                </div>
                <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
                    <div class="payment_slider_wrapper index3_payment_slider_wrapper">
                        <div class="owl-carousel owl-theme">
                    @foreach($gateways as $value)
                            <div class="item">

                                <div class="">
                                    <img src="{{ getImage(imagePath()['gateway']['path'].'/'.$value->image ) }}" class="img-responsive" alt="img">
                                </div>

                            </div>
                    @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
