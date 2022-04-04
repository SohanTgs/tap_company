@extends($activeTemplate.'layouts.frontend')

@section('content')
@php
   $loginPageImage = getContent('login_and_register.content',true);
@endphp
    <div class="login_wrapper fixed_portion float_left">
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
                        <div class="login_form_wrapper">
                            <div class="sv_heading_wraper heading_wrapper_dark dark_heading hwd">

                                <h3> login to {{ $general->sitename }}</h3>

                            </div>
                          <div class="card-body">
                        <form method="POST" action="{{ route('user.login')}}"
                              onsubmit="return submitUserForm();">
                            @csrf

                            <div class="form-group row">
                                <label for="email"
                                       class="col-md-4 col-form-label text-md-right">{{ __('Username') }}</label>
                                <div class="col-md-8">
                                    <input type="text" name="username" value="{{ old('username') }}"
                                           placeholder="@lang('Enter your username')" class="form-control">
                                </div>
                            </div>


                            <div class="form-group row">
                                <label for="password"
                                       class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                                <div class="col-md-8">
                                    <input id="password" type="password" placeholder="@lang('Enter your password')" class="form-control" name="password" required
                                           autocomplete="current-password">
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
                                <div class="col-md-8 offset-md-4">
                 <button type="submit" id="recaptcha" class='form-control btn btn-primary'>
                                        {{ __('Login') }}
                                    </button>
                                </div>

                                <div class="col-md-12">
                                    @if (Route::has('user.register'))
                                        <a class="btn btn-link" href="{{route('user.register')}}">
                                            {{ __('Create an account') }}
                                        </a>
                                    @endif

                                    @if (Route::has('user.password.request'))
                                        <a class="btn btn-link float-right" href="{{route('user.password.request')}}">
                                            {{ __('Forgot Your Password?') }}
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
    </div>

@endsection
