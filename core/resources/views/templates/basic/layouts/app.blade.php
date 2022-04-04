@extends($activeTemplate.'layouts.master')

@section('content')
    <!-- page-wrapper start -->
    <div class="page-wrapper default-version">
        @include($activeTemplate.'partials.sidenav')
        @include($activeTemplate.'partials.topnav')

        <div class="body-wrapper">
            <div class="bodywrapper__inner">

                @include($activeTemplate.'partials.breadcrumb')

                @yield('panel')


            </div><!-- bodywrapper__inner end -->
        </div><!-- body-wrapper end -->
    </div>


@endsection
