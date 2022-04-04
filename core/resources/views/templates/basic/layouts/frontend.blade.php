<!doctype html>
<html lang="en" itemscope itemtype="http://schema.org/WebPage">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    @include('partials.seo')
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
          integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset($activeTemplateTrue.'/css/bootstrap-fileinput.css')}}">

    <link rel="stylesheet" type="text/css" href="{{asset($activeTemplateTrue.'bkash/css/animate.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{asset($activeTemplateTrue.'bkash/css/bootstrap.min.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{asset($activeTemplateTrue.'bkash/css/fonts.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{asset($activeTemplateTrue.'bkash/css/flaticon.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{asset($activeTemplateTrue.'bkash/css/font-awesome.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{asset($activeTemplateTrue.'bkash/css/owl.carousel.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset($activeTemplateTrue.'bkash/css/owl.theme.default.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset($activeTemplateTrue.'bkash/css/nice-select.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{asset($activeTemplateTrue.'bkash/css/datatables.css')}}" />
	<link rel="stylesheet" type="text/css" href="{{asset($activeTemplateTrue.'bkash/css/dropify.min.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{asset($activeTemplateTrue.'bkash/css/reset.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{asset($activeTemplateTrue.'bkash/css/magnific-popup.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset($activeTemplateTrue.'bkash/css/style.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{asset($activeTemplateTrue.'bkash/css/responsive.css')}}" />
    <link rel="stylesheet" href="{{asset($activeTemplateTrue.'css/color.php?color='.$general->base_color.'&secondColor='.$general->secondary_color)}}">


    @stack('style-lib')

    @stack('style')
</head>
<body>

    <div id="preloader">
        <div id="status">
            <img src="{{asset($activeTemplateTrue.'bkash/images/loader.gif')}}" id="preloader_image" alt="loader">
        </div>
    </div>

    <div class="cursor cursor3"></div>

    <a href="javascript:" id="return-to-top" class="index3_scroll"> <i class="fas fa-angle-double-up"></i></a>


@php echo fbcomment() @endphp

{{-- <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">
            {{ $general->sitename}}
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav mr-auto">

            </ul>
            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">


                <li class="nav-item">
                    <a href="{{route('home')}}"  class="nav-link">{{trans('key_1')}}</a>
                </li>
                @foreach($pages as $k => $data)
                    <li class="nav-item"><a href="{{route('pages',[$data->slug])}}"  class="nav-link">{{trans($data->name)}}</a></li>
                @endforeach



                @guest
                    @if (Route::has('contact'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('contact') }}">{{ __('contact') }}</a>
                        </li>
                    @endif

                    @if (Route::has('user.login'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('user.login') }}">{{ __('login') }}</a>
                        </li>
                    @endif

                    @if (Route::has('user.register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('user.register') }}">{{ __('register') }}</a>
                        </li>
                    @endif
                @endguest

                @auth

                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->fullname }} <span class="caret"></span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('user.logout') }}">
                                {{ __('Logout') }}
                            </a>
                        </div>
                    </li>
                @endauth



                    <select class="langSel form-control" >
                        <option value="">Select One</option>
                        @foreach($language as $item)
                            <option value="{{$item->code}}" @if(session('lang') == $item->code) selected  @endif>{{ __($item->name) }}</option>
                        @endforeach
                    </select>

            </ul>
        </div>
    </div>
</nav> --}}

<nav class="cd-dropdown index3_cd_dropdown d-block d-sm-block d-md-block d-lg-none d-xl-none">
    <h2><a href="{{ url('/') }}"> {{ $general->sitename }} </a></h2>
    <a href="#0" class="cd-close">Close</a>
    <ul class="cd-dropdown-content">
        <li>
            <form class="cd-search">
                <input type="search" placeholder="Search...">
            </form>
        </li>
         {{-- <li class="has-children">
            <a href="#">index</a>
            <ul class="cd-secondary-dropdown icon_menu is-hidden">
                <li class="go-back"><a href="#0">Menu</a></li>
                <li><a href="index.html">index I</a></li>
                <li><a href="index2.html">index II</a></li>
                <li><a href="index3.html">index III</a></li>
            </ul>
        </li> --}}
        {{-- <li><a href="about_us.html"> about us </a></li> --}}

        {{-- <li><a href="contact_us.html"> contact us </a></li> --}}
        <li><a href="{{ url('/') }}"> Home </a></li>
        <li><a href="{{ route('about') }}"> About </a></li>
        <li><a href="{{ route('all.blogs') }}"> Blogs </a></li>
        @foreach($pages as $k => $data)
            <li class="nav-item"><a href="{{route('pages',[$data->slug])}}"  class="nav-link">{{trans($data->name)}}</a></li>
        @endforeach
        <li><a href="{{ route('contact') }}"> Contact </a></li>
        <li><a href="{{ route('user.login') }}"> login </a></li>
        <li><a href="{{ route('user.register') }}"> register </a></li>
    </ul>
    <!-- .cd-dropdown-content -->
</nav>


<div class="cp_navi_main_wrapper index2_header_wrapper index3_header_wrapper float_left">
    <div class="container-fluid">
        <div class="cp_logo_wrapper">
            <a href="{{ url('/') }}">
                <img src="{{getImage(imagePath()['logoIcon']['path'] .'/logo.png')}}" style="height:60px;width:120px;" alt="logo">
            </a>
        </div>

        <!-- mobile menu area start -->
        <header class="mobail_menu d-block d-sm-block d-md-block d-lg-none d-xl-none">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="cd-dropdown-wrapper">
                            <a class="house_toggle" href="#0">
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px" viewBox="0 0 31.177 31.177" style="enable-background:new 0 0 31.177 31.177;" xml:space="preserve" width="25px" height="25px">
                                    <g>
                                        <g>
                                            <path class="menubar" d="M30.23,1.775H0.946c-0.489,0-0.887-0.398-0.887-0.888S0.457,0,0.946,0H30.23    c0.49,0,0.888,0.398,0.888,0.888S30.72,1.775,30.23,1.775z" fill="#004165" />
                                        </g>
                                        <g>
                                            <path class="menubar" d="M30.23,9.126H12.069c-0.49,0-0.888-0.398-0.888-0.888c0-0.49,0.398-0.888,0.888-0.888H30.23    c0.49,0,0.888,0.397,0.888,0.888C31.118,8.729,30.72,9.126,30.23,9.126z" fill="#004165" />
                                        </g>
                                        <g>
                                            <path class="menubar" d="M30.23,16.477H0.946c-0.489,0-0.887-0.398-0.887-0.888c0-0.49,0.398-0.888,0.887-0.888H30.23    c0.49,0,0.888,0.397,0.888,0.888C31.118,16.079,30.72,16.477,30.23,16.477z" fill="#004165" />
                                        </g>
                                        <g>
                                            <path class="menubar" d="M30.23,23.826H12.069c-0.49,0-0.888-0.396-0.888-0.887c0-0.49,0.398-0.888,0.888-0.888H30.23    c0.49,0,0.888,0.397,0.888,0.888C31.118,23.43,30.72,23.826,30.23,23.826z" fill="#004165" />
                                        </g>
                                        <g>
                                            <path class="menubar" d="M30.23,31.177H0.946c-0.489,0-0.887-0.396-0.887-0.887c0-0.49,0.398-0.888,0.887-0.888H30.23    c0.49,0,0.888,0.398,0.888,0.888C31.118,30.78,30.72,31.177,30.23,31.177z" fill="#004165" />
                                        </g>
                                    </g>
                                </svg>
                            </a>
                            <!-- .cd-dropdown -->

                        </div>
                    </div>
                </div>
            </div>
            <!-- .cd-dropdown-wrapper -->
        </header>
@php
    $mobile = getContent('nav_mobile.content',true);
@endphp
        <div class="top_header_right_wrapper top_phonecalls">
            <p><i class="flaticon-phone-contact"></i>{{ __($mobile->data_values->mobile) }}</p>
            <div class="header_btn index3_header_btn">
                <ul>
                    @if(Auth::user())
                        <li>
                            <a href="{{ route('user.home') }}"> Dashboad </a>
                        </li>
                    @else
                        <li>
                            <a href="{{ route('user.register') }}"> register </a>
                        </li>
                        <li>
                            <a href="{{ route('user.login') }}"> login </a>
                        </li>
                    @endif
                </ul>
            </div>
        </div>


        <div class="cp_navigation_wrapper">
            <div class="mainmenu d-xl-block d-lg-block d-md-none d-sm-none d-none">
                <ul class="main_nav_ul">
                    {{-- <li class="has-mega gc_main_navigation"><a href="#" class="gc_main_navigation active_class">index <i class="fas fa-caret-down"></i></a>
                        <ul class="navi_2_dropdown">
                            <li class="parent">
                                <a href="index.html"><i class="fas fa-caret-right"></i>index I</a>
                            </li>
                            <li class="parent">
                                <a href="index2.html"><i class="fas fa-caret-right"></i>index II</a>
                            </li>
                            <li class="parent">
                                <a href="index3.html"><i class="fas fa-caret-right"></i>index III</a>
                            </li>
                        </ul>
                    </li> --}}
                    {{-- <li><a href="about_us.html" class="gc_main_navigation">about us</a></li>
                    <li><a href="investment.html" class="gc_main_navigation">investment plan</a></li> --}}

                    {{-- <li class="has-mega gc_main_navigation"><a href="#" class="gc_main_navigation">dashboard <i class="fas fa-caret-down"></i></a>
                        <ul class="navi_2_dropdown">

                            <li class="parent">
                                <a href="#"><i class="fas fa-caret-right"></i>my account<span><i class="fas fa-caret-right"></i>
                                </span></a>
                                <ul class="dropdown-menu-right">
                                    <li>
                                        <a href="my_account.html"> <i class="fas fa-caret-right"></i>my account </a>
                                    </li>
                                    <li>
                                        <a href="view_profile.html"> <i class="fas fa-caret-right"></i> my profile</a>
                                    </li>
                                    <li>
                                        <a href="email_notification.html"><i class="fas fa-caret-right"></i>email notification </a>
                                    </li>
                                    <li>
                                        <a href="change_password.html"><i class="fas fa-caret-right"></i>change password</a>
                                    </li>
                                    <li>
                                        <a href="change_pin.html"><i class="fas fa-caret-right"></i>change pin</a>
                                    </li>

                                </ul>
                            </li>
                            <li class="parent">
                                <a href="#"> <i class="fas fa-caret-right"></i>finance<span> <i class="fas fa-caret-right"></i>
                                </span></a>
                                <ul class="dropdown-menu-right">
                                    <li>
                                        <a href="make_deposit.html"> <i class="fas fa-caret-right"></i>make deposit</a>
                                    </li>
                                    <li>
                                        <a href="deposit_list.html"> <i class="fas fa-caret-right"></i> deposit lists</a>
                                    </li>
                                    <li>
                                        <a href="payment_request.html"><i class="fas fa-caret-right"></i>payment request</a>
                                    </li>
                                    <li>
                                        <a href="exchange_money.html"><i class="fas fa-caret-right"></i>exchange money</a>
                                    </li>
                                    <li>
                                        <a href="transfer_fund.html"><i class="fas fa-caret-right"></i>fund transfer</a>
                                    </li>

                                </ul>
                            </li>
                            <li class="parent">
                                <a href="#"> <i class="fas fa-caret-right"></i>reports<span> <i class="fas fa-caret-right"></i>
                                </span></a>
                                <ul class="dropdown-menu-right">
                                    <li>
                                        <a href="all_transactions.html"> <i class="fas fa-caret-right"></i>all transactions</a>
                                    </li>
                                    <li>
                                        <a href="deposit_history.html"> <i class="fas fa-caret-right"></i> deposit history</a>
                                    </li>
                                    <li>
                                        <a href="pending_history.html"><i class="fas fa-caret-right"></i>pending history</a>
                                    </li>
                                    <li>
                                        <a href="exchange_history.html"><i class="fas fa-caret-right"></i>exchange history</a>
                                    </li>
                                    <li>
                                        <a href="earnings_history.html"><i class="fas fa-caret-right"></i>earning history</a>
                                    </li>

                                </ul>
                            </li>
                            <li class="parent">
                                <a href="#"> <i class="fas fa-caret-right"></i>referrals<span> <i class="fas fa-caret-right"></i>
                                </span></a>
                                <ul class="dropdown-menu-right">
                                    <li>
                                        <a href="referrals.html"> <i class="fas fa-caret-right"></i>my referrals</a>
                                    </li>
                                    <li>
                                        <a href="banners.html"> <i class="fas fa-caret-right"></i> promotionals banners</a>
                                    </li>
                                    <li>
                                        <a href="referral_earnings.html"><i class="fas fa-caret-right"></i>referral earnings</a>
                                    </li>

                                </ul>
                            </li>
                            <li class="parent">
                                <a href="tickets.html"><i class="fas fa-caret-right"></i>view tickets</a></li>
                        </ul>
                    </li> --}}
                    <li><a href="{{ url('/') }}" class="gc_main_navigation">Home</a></li>
                    <li><a href="{{ route('about') }}" class="gc_main_navigation">About</a></li>
                    <li><a href="{{ route('all.blogs') }}" class="gc_main_navigation">Blogs</a></li>
                    <li><a href="{{ route('contact') }}" class="gc_main_navigation">contact</a></li>
                     @foreach($pages as $k => $data)
                    <li class="nav-item"><a href="{{route('pages',[$data->slug])}}"  class="nav-link">{{trans($data->name)}}</a></li>
                     @endforeach
                </ul>
            </div>
            <!-- mainmenu end -->
        </div>

    </div>
</div>

@if(!request()->is('/'))
    <div class="page_title_section" style="margin-top: 88px;">
        <div class="page_header">
            <div class="container">
                <div class="row">
                    <div class="col-lg-9 col-md-9 col-12 col-sm-8">
                        <h1>{{ $page_title }}</h1>
                    </div>
                    <div class="col-lg-3 col-md-3 col-12 col-sm-4">
                        <div class="sub_title_section">
                            <ul class="sub_title">
                                <li> <a href="#"> Home </a>&nbsp; / &nbsp; </li>
                                <li>{{ $page_title }}</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endif


@yield('content')

@php
    $footer = getContent('footer.content',true);
    $footers = getContent('footer.element');
@endphp

<div class="footer_main_wrapper index2_footer_wrapper index3_footer_wrapper float_left">

    <div class="container">

        <div class="row">

            <div class="col-lg-4 col-md-6 col-12 col-sm-12">
                <div class="wrapper_second_about">
                    <div class="wrapper_first_image">
                        <a href="{{ url('/') }}">
                            <img src="{{getImage(imagePath()['logoIcon']['path'] .'/logo.png')}}" style="height: 60px;width:120px;" class="img-responsive" alt="logo" />
                        </a>
                    </div>
                    <p>{{ __($footer->data_values->title) }}</p>
                    <div class="counter-section">
                        <div class="ft_about_icon float_left">
                            <i class="flaticon-user"></i>
                            <div class="ft_abt_text_wrapper">
                                <p class="timer"> {{ totalMember() }}</p>
                                <h4>total member</h4>
                            </div>

                        </div>
                        <div class="ft_about_icon float_left">
                            <i class="flaticon-money-bag"></i>
                            <div class="ft_abt_text_wrapper">
                                <p class="timer">{{ totalDeposit() }}</p>
                                <h4>total deposited</h4>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

            <div class="col-lg-2 col-md-3 col-12 col-sm-4">
                <div class="wrapper_second_useful">
                    <h4>{{ __($footer->data_values->title_one) }}</h4>

            <ul>
                <li><a href="{{ url('/') }}"><i class="fa fa-angle-right"></i>Home</a></li>
                <li><a href="{{ route('about') }}"><i class="fa fa-angle-right"></i>About</a></li>
                <li><a href="{{ route('all.blogs') }}"><i class="fa fa-angle-right"></i>Blogs</a></li>
                <li><a href="{{ route('contact') }}"><i class="fa fa-angle-right"></i>Contact</a></li>
                <li><a href="{{ route('user.login') }}"><i class="fa fa-angle-right"></i>Login</a></li>
                <li><a href="{{ route('user.register') }}"><i class="fa fa-angle-right"></i>Register</a></li>
            </ul>

                </div>
            </div>
            <div class="col-lg-2 col-md-3 col-12 col-sm-4">
                <div class="wrapper_second_useful wrapper_second_links">

                    <ul>

                    </ul>

                </div>
            </div>

            <div class="col-lg-4 col-md-6 col-12 col-sm-12">
                <div class="wrapper_second_useful wrapper_second_useful_2">
                    <h4>{{ __($footer->data_values->title_two) }}</h4>

                    <ul>
                        <li>
                            <h1>{{ __($footer->data_values->contact_number) }}</h1></li>
                        <li><a href="#"><i class="flaticon-mail"></i>{{ __($footer->data_values->email_address) }}</a>
                        </li>
                        <li><a href="#"><i class="flaticon-language"></i>{{ __($footer->data_values->website) }}</a>
                        </li>

                        <li><i class="flaticon-placeholder"></i>
                            {{ __($footer->data_values->contact_details) }}
                        </li>
                    </ul>
                </div>
            </div>

            <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
                <div class="copyright_wrapper float_left">
                    <div class="copyright">
                        <span style="color:black;">&copy; {{ __($footer->data_values->copyright) }}</span>
                    </div>
                    <div class="social_link_foter">

                        <ul>
                           @foreach($footers as $value)
                            <li>
                                <a href="{{ $value->data_values->social_link }}">
                                    @php echo $value->data_values->social_icon @endphp
                                </a>
                            </li>
                        @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

@include('admin.partials.notify')

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"
        integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI"
        crossorigin="anonymous"></script>



        <script src=" {{asset($activeTemplateTrue.'bkash/js/jquery-3.3.1.min.js')}}"></script>
        <script src="{{asset($activeTemplateTrue.'bkash/js/bootstrap.min.js')}}"></script>
        <script src="{{asset($activeTemplateTrue.'bkash/js/modernizr.js')}}"></script>
        <script src="{{asset($activeTemplateTrue.'bkash/js/jquery.menu-aim.js')}}"></script>
        <script src="{{asset($activeTemplateTrue.'bkash/js/plugin.js')}}"></script>
        <script src="{{asset($activeTemplateTrue.'bkash/js/jquery.countTo.js')}}"></script>
        <script src="{{asset($activeTemplateTrue.'bkash/js/dropify.min.js')}}"></script>
        <script src="{{asset($activeTemplateTrue.'bkash/js/datatables.js')}}"></script>
        <script src="{{asset($activeTemplateTrue.'bkash/js/jquery.nice-select.min.js')}}"></script>
        <script src="{{asset($activeTemplateTrue.'bkash/js/jquery.inview.min.js')}}"></script>
        <script src="{{asset($activeTemplateTrue.'bkash/js/jquery.magnific-popup.js')}}"></script>
        <script src="{{asset($activeTemplateTrue.'bkash/js/owl.carousel.js')}}"></script>
        <script src="{{asset($activeTemplateTrue.'bkash/js/calculator.js')}}"></script>
        <script src="{{asset($activeTemplateTrue.'bkash/js/custom.js')}}"></script>



@stack('script-lib')

@stack('script')

@include('partials.plugins')


<script>
    (function ($) {
        "use strict";
        $(document).on("change", ".langSel", function() {
            window.location.href = "{{url('/')}}/change/"+$(this).val() ;
        });
    })(jQuery);
</script>

</body>
</html>
