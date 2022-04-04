@extends($activeTemplate.'layouts.frontend')

@section('content')
@php
    $contactUs = getContent('contact.content',true);
    $gateways =  App\Gateway::all();
    $gateway = getContent('accept_gateway.content',true);
@endphp

<div class="contact_section float_left">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="sv_heading_wraper heading_wrapper_dark dark_heading">
                        <h4>{{ __($contactUs->data_values->heading) }}</h4>
                        <h3>{{ __($contactUs->data_values->title) }}</h3></h3>
                    </div>

                </div>
                <div class="col-lg-10 offset-lg-1 col-md-12 col-sm-12 col-12">
                    <form action="{{ route('contact.send') }}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-lg-6 col-md-6">
                                <div class="form-pos">
                                    <div class="form-group i-name">

                                          <input name="name" type="text" placeholder="@lang('Your Name')" class="form-control"
                           value="{{ old('name') }}" required>

                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <div class="form-pos">
                                    <div class="form-group i-name">

                                       <input name="email" type="text" placeholder="@lang('Enter E-Mail Address')" class="form-control"
                           value="{{old('email')}}" required>

                                    </div>
                                </div>
                            </div>
                            <!-- /.col-md-12 -->
                            <div class="col-lg-12 col-md-6">
                                <div class="form-e">
                                    <div class="form-group i-email">
                                        <label class="sr-only">Email </label>
                                        <input name="subject" type="text" placeholder="@lang('Write your subject')" class="form-control"
                           value="{{old('subject')}}" required>

                                    </div>
                                </div>
                            </div>
                            <!-- /.col-md-12 -->
                            <!-- /.col-md-12 -->
                            <div class="col-md-12">
                                <div class="form-m">
                                    <div class="form-group i-message">

                                        <textarea name="message" wrap="off" placeholder="@lang('Write your message')"
                              class="form-control">{{old('message')}}</textarea>

                                    </div>
                                </div>
                            </div>
                            <!-- /.col-md-12 -->
                            <div class="col-md-12">
                                <div class="tb_es_btn_div">
                                    <div class="response"></div>
                                    <div class="tb_es_btn_wrapper conatct_btn2 cont_bnt">
                                        <input type="hidden" name="form_type" value="contact" />
                                        <button type="submit" class="submitForm">send message !</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

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

@endsection
