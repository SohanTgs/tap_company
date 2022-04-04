<!-- meta tags and other links -->
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>{{ $general->sitename($page_title ?? '') }}</title>
    <!-- site favicon -->
    <link rel="shortcut icon" type="image/png" href="{{getImage(imagePath()['logoIcon']['path'] .'/favicon.png')}}">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&display=swap">
    <!-- bootstrap 4  -->
    <link rel="stylesheet" href="{{ asset('assets/admin/css/vendor/bootstrap.min.css') }}">
    <!-- bootstrap toggle css -->
    <link rel="stylesheet" href="{{asset('assets/admin/css/vendor/bootstrap-toggle.min.css')}}">
    <!-- fontawesome 5  -->
    <link rel="stylesheet" href="{{asset('assets/admin/css/all.min.css')}}">
    <!-- line-awesome webfont -->
    <link rel="stylesheet" href="{{asset('assets/admin/css/line-awesome.min.css')}}">

    @stack('style-lib')

    <!-- custom select box css -->
    {{-- <link rel="stylesheet" href="{{asset('assets/admin/css/vendor/nice-select.css')}}">
    <!-- code preview css -->
    <link rel="stylesheet" href="{{asset('assets/admin/css/vendor/prism.css')}}">
    <!-- select 2 css -->
    <link rel="stylesheet" href="{{asset('assets/admin/css/vendor/select2.min.css')}}">
    <!-- data table css -->
    <link rel="stylesheet" href="{{asset('assets/admin/css/vendor/datatables.min.css')}}">
    <!-- jvectormap css -->
    <link rel="stylesheet" href="{{asset('assets/admin/css/vendor/jquery-jvectormap-2.0.5.css')}}">
    <!-- datepicker css -->
    <link rel="stylesheet" href="{{asset('assets/admin/css/vendor/datepicker.min.css')}}">
    <!-- timepicky for time picker css -->
    <link rel="stylesheet" href="{{asset('assets/admin/css/vendor/jquery-timepicky.css')}}">
    <!-- bootstrap-clockpicker css -->
    <link rel="stylesheet" href="{{asset('assets/admin/css/vendor/bootstrap-clockpicker.min.css')}}">
    <!-- bootstrap-pincode css -->
    <link rel="stylesheet" href="{{asset('assets/admin/css/vendor/bootstrap-pincode-input.css')}}">
    <!-- dashdoard main css -->
    <link rel="stylesheet" href="{{asset('assets/admin/css/app.css')}}">



    {{-- New Dashboard for user panel --}}
    <link rel="stylesheet" href="{{asset('assets/admin/dahsboard/css/app.min.css')}}">
    <!-- Template CSS -->
    <link rel="stylesheet" href="{{asset('assets/admin/dahsboard/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('assets/admin/dahsboard/css/components.css')}}">
    <!-- Custom style CSS -->
    <link rel="stylesheet" href="{{asset('assets/admin/dahsboard/css/custom.css')}}">

    {{-- <link rel="stylesheet" href="{{asset('assets/admin/clock/mdtimepicker.css')}}">

    <link rel="stylesheet" href="{{asset('assets/admin/clock/mdtimepicker-theme.css')}}">

    <link rel="stylesheet" href="{{asset('assets/admin/clock/mdtimepicker.min.css')}}"> --}}



@stack('style')
</head>
<body class="{{ $theme_color->theme_color }}">
  <div class="loader"></div>
  <div id="app">
@yield('content')



<!-- jQuery library -->
{{-- <script src="{{asset('assets/admin/js/vendor/jquery-3.5.1.min.js')}}"></script>
<!-- bootstrap js -->
<script src="{{asset('assets/admin/js/vendor/bootstrap.bundle.min.js')}}"></script>
<!-- bootstrap-toggle js -->
<script src="{{asset('assets/admin/js/vendor/bootstrap-toggle.min.js')}}"></script> --}}

<!-- slimscroll js for custom scrollbar -->
{{-- <script src="{{asset('assets/admin/js/vendor/jquery.slimscroll.min.js')}}"></script>
<!-- custom select box js -->
<script src="{{asset('assets/admin/js/vendor/jquery.nice-select.min.js')}}"></script> --}}


@include('admin.partials.notify')

@stack('script-lib')
{{--
<script src="{{ asset('assets/admin/js/nicEdit.js') }}"></script>

<!-- code preview js -->
 <script src="{{asset('assets/admin/js/vendor/prism.js')}}"></script>
<!-- seldct 2 js -->
<script src="{{asset('assets/admin/js/vendor/select2.min.js')}}"></script>
<!-- data-table js -->
<script src="{{asset('assets/admin/js/vendor/datatables.min.js')}}"></script> --}}
<!-- main js -->



{{-- New User Dashboar panel --}}

  <script src="{{asset('assets/admin/dahsboard/js/app.min.js')}}"></script>
  <!-- JS Libraies -->
  <script src="{{asset('assets/admin/dahsboard/bundles/apexcharts/apexcharts.min.js')}}"></script>
  <!-- Page Specific JS File -->
  <script src="{{asset('assets/admin/dahsboard/js/page/index.js')}}"></script>
  <!-- Template JS File -->
   <script src="{{asset('assets/admin/dahsboard/js/scripts.js')}}"></script>
  <!-- Custom JS File -->
  <script src="{{asset('assets/admin/dahsboard/js/custom.js')}}"></script>


@stack('script')

{{-- LOAD NIC EDIT --}}
@if(request()->is('user/dashboard'))
<div class="settingSidebar">
          <a href="javascript:void(0)" class="settingPanelToggle"> <i class="fa fa-spin fa-cog"></i>
          </a>
          <div class="settingSidebar-body ps-container ps-theme-default">
            <div class=" fade show active">
              <div class="setting-panel-header">Setting Panel
              </div>
              <div class="p-15 border-bottom">
                <h6 class="font-medium m-b-10">Select Layout</h6>
                <div class="selectgroup layout-color w-50">
                  <label class="selectgroup-item">
                    <input type="radio" name="value" value="1" class="selectgroup-input-radio select-layout" checked>
                    <span class="selectgroup-button">Light</span>
                  </label>
                  <label class="selectgroup-item">
                    <input type="radio" name="value" value="2" class="selectgroup-input-radio select-layout">
                    <span class="selectgroup-button">Dark</span>
                  </label>
                </div>
              </div>
              <div class="p-15 border-bottom">
                <h6 class="font-medium m-b-10">Sidebar Color</h6>
                <div class="selectgroup selectgroup-pills sidebar-color">
                  <label class="selectgroup-item">
                    <input type="radio" name="icon-input" value="1" class="selectgroup-input select-sidebar">
                    <span class="selectgroup-button selectgroup-button-icon" data-toggle="tooltip"
                      data-original-title="Light Sidebar"><i class="fas fa-sun"></i></span>
                  </label>
                  <label class="selectgroup-item">
                    <input type="radio" name="icon-input" value="2" class="selectgroup-input select-sidebar" checked>
                    <span class="selectgroup-button selectgroup-button-icon" data-toggle="tooltip"
                      data-original-title="Dark Sidebar"><i class="fas fa-moon"></i></span>
                  </label>
                </div>
              </div>
              <div class="p-15 border-bottom">
                <h6 class="font-medium m-b-10">Color Theme</h6>
                <div class="theme-setting-options">
                  <ul class="choose-theme list-unstyled mb-0">
                    <li title="white" class="active">
                      <div class="white"></div>
                    </li>
                    <li title="cyan">
                      <div class="cyan"></div>
                    </li>
                    <li title="black">
                      <div class="black"></div>
                    </li>
                    <li title="purple">
                      <div class="purple"></div>
                    </li>
                    <li title="orange">
                      <div class="orange"></div>
                    </li>
                    <li title="green">
                      <div class="green"></div>
                    </li>
                    <li title="red">
                      <div class="red"></div>
                    </li>
                  </ul>
                </div>
              </div>

              <div class="mt-4 mb-4 p-3 align-center rt-sidebar-last-ele">
                <a href="#" id='theme_reset' class="btn btn-icon icon-left btn-primary btn-restore-theme">
                  <i class="fas fa-undo"></i> Restore Default
                </a>
              </div>
            </div>
          </div>
        </div>

      <script>
        $(document).ready(function(){
            $('body').change(function(){
                var data = $(this).attr("class");
                $.ajax({
                url:'change-user-panel-color',
                method:'post',
                data:{
                    'theme_color':data,
                    "_token": '{{ csrf_token() }}'
                },
                success:function(response){
                    // console.log(response);
                },
                    error:function(error){
                        console.log(error)
                    }
                });

            });

             $('.choose-theme li').click(function(){
                var data = $('body').attr("class");
                $.ajax({
                url:'change-user-panel-color',
                method:'post',
                data:{
                    'theme_color':data,
                    "_token": '{{ csrf_token() }}'
                },
                success:function(response){
                    // console.log(response);
                },
                    error:function(error){
                        console.log(error)
                    }
                });
            });

            $('#theme_reset').click(function(){
                $.ajax({
                url:'change-user-panel-color-reset',
                method:'get',
                data:null,
                success:function(response){
                    console.log(response);
                },
                    error:function(error){
                        console.log(error)
                    }
                });
            });


        });
      </script>
@endif
       <footer class="main-footer">
        <div class="footer-left">
          <a href="{{ url('/') }}">{{ $general->sitename }}</a></a>
        </div>
        <div class="footer-right">
        </div>
      </footer>

  </div>
</body>
</html>
