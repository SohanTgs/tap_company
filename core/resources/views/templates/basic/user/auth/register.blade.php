@extends($activeTemplate.'layouts.frontend')

@section('content')
@php
   $loginPageImage = getContent('login_and_register.content',true);
@endphp
    <div class="login_wrapper float_left">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="login_top_box float_left">
                        <div class="login_banner_wrapper" style="background-image: url({{ getImage('assets/images/frontend/login_and_register/'.$loginPageImage->data_values->image) }})">
                             <img src="{{getImage(imagePath()['logoIcon']['path'] .'/logo.png')}}" style="height:60px;width:120px;" alt="logo">
                            {{-- <div class="about_btn  facebook_wrap float_left">

                                <a href="#">login with facebook <i class="fab fa-facebook-f"></i></a>

                            </div>
                            <div class="about_btn google_wrap float_left">

                                <a href="#">login with pinterest <i class="fab fa-pinterest-p"></i></a>

                            </div> --}}
                            {{-- <div class="jp_regis_center_tag_wrapper jb_register_red_or">
                                <h1>OR</h1>
                            </div> --}}
                        </div>
                        <div class="login_form_wrapper register_wrapper">
                            <div class="sv_heading_wraper heading_wrapper_dark dark_heading hwd">

                                <h3> Register To {{ $general->sitename }}</h3>

                            </div>
                            <div class="card-body">
                        <form action="{{ route('user.register') }}" method="POST"
                              onsubmit="return submitUserForm();">
                            @csrf


                            @if(session()->get('reference') != null)
                                <div class="form-group row">
                                    <label for="firstname"
                                           class="col-md-4 col-form-label text-md-right">{{ __('Reference BY') }}</label>

                                    <div class="col-md-6">
                                        <input type="text" name="referBy" id="referenceBy" class="form-control"
                                               value="{{session()->get('reference')}}" readonly>
                                    </div>
                                </div>
                            @endif

                            <div class="form-group row">
                                <label for="firstname"
                                       class="col-md-4 col-form-label text-md-right">{{ __('First Name') }}</label>
                                <div class="col-md-6">
                                    <input id="firstname" type="text" class="form-control" name="firstname"
                                           value="{{ old('firstname	') }}" required>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="lastname"
                                       class="col-md-4 col-form-label text-md-right">{{ __('Last Name') }}</label>
                                <div class="col-md-6">
                                    <input id="lastname" type="text" class="form-control" name="lastname"
                                           value="{{ old('lastname	') }}" required>
                                </div>
                            </div>


                            <div class="form-group row">
                                <label for="username"
                                       class="col-md-4 col-form-label text-md-right">{{ __('Username') }}</label>
                                <div class="col-md-6">
                                    <input id="username" type="text" class="form-control" name="username"
                                           value="{{ old('username') }}" required>
                                </div>
                            </div>

                            <div class="row">

                                <label for="mobile"
                                       class="col-md-4 col-form-label text-md-right">{{ __('Mobile') }}</label>
                                <div class="col-md-6">

                                    <div class="form-group">

                                        <div class="input-group ">
                                            <input type="tel" name="mobile" value="" id="phone" class="form-control"
                                                   placeholder="@lang('Your Phone Number')" aria-label="Mobile Number"
                                                   aria-describedby="basic-addon16">
                                        </div>
                                    </div>

                                </div>
                            </div>


                            <div class="form-group row">
                                <label for="email"
                                       class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>
                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control" name="email"
                                           value="{{ old('email') }}" required>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password"
                                       class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control" name="password" required
                                           autocomplete="new-password">

                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password-confirm"
                                       class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control"
                                           name="password_confirmation" required autocomplete="new-password">
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-4 ">
                                </div>
                                <div class="col-md-6 ">
                                    @php echo recaptcha() @endphp
                                </div>
                            </div>
                            @include($activeTemplate.'partials.custom-captcha')


                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" id="recaptcha" class="form-control btn btn-primary">
                                        {{ __('Register') }}
                                    </button>
                                </div>


                                <div class="col-md-12">
                                    @if (Route::has('user.login'))
                                        <a class="btn btn-link" href="{{route('user.login')}}">
                                            {{ __('Already Have an account') }}
                                        </a>
                                    @endif

                                </div>
                            </div>
                        </form>
                    </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection


@push('style-lib')

    <link href="{{asset($activeTemplateTrue).'/css/intlTelInput.css'}}" rel="stylesheet">

@endpush


@push('script-lib')
    <script src="{{asset($activeTemplateTrue).'/js/intlTelInput-jquery.min.js'}}"></script>
@endpush

@push('script')
    <script>
        $("#phone").intlTelInput({
            geoIpLookup: function (callback) {
                $.get("https://ipinfo.io", function () {
                }, "jsonp").always(function (resp) {
                    var countryCode = (resp && resp.country) ? resp.country : "";
                    callback(countryCode);
                });
            },
            hiddenInput: "mobile",
            initialCountry: "auto",
            utilsScript: "{{asset('assets/admin/build/js/utils.js')}}"
        });

    </script>


    <script>
        function submitUserForm() {
            var response = grecaptcha.getResponse();
            if (response.length == 0) {
                document.getElementById('g-recaptcha-error').innerHTML = '<span style="color:red;">@lang("Captcha field is required.")</span>';
                return false;
            }
            return true;
        }

        function verifyCaptcha() {
            document.getElementById('g-recaptcha-error').innerHTML = '';
        }
    </script>
@endpush
