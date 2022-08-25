<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta http-equiv="X-UA-Compatible" content="ie=edge,chrome=1">
   <title>@yield('page_title')&nbsp;-&nbsp;Job Placement Center Politeknik Negeri Banyuwangi</title>
   <!-- Favicon -->
	<link rel="icon" type="image/x-icon" href="{{asset('assets/images/logo/icon_poliwangi.png')}}"/>
	<meta name="csrf-token" content="{{ csrf_token() }}">
   <!-- loading -->
   {{-- <link href="{{asset('assets/css/loader.css')}}" rel="stylesheet" type="text/css" />
   <script src="{{asset('assets/js/loader.js')}}"></script> --}}
   <!-- BEGIN GLOBAL MANDATORY STYLES -->
   <link rel="stylesheet" type="text/css" href="{{asset('bootstrap/css/bootstrap.min.css')}}" />
   <link rel="stylesheet" type="text/css" href="{{asset('assets/css/plugins.css')}}" />
   <link rel="stylesheet" type="text/css" href="{{asset('assets/css/user.css')}}" />
   <link rel="stylesheet" type="text/css" href="{{asset('css/app.css')}}" />
   <link rel="stylesheet" type="text/css" href="{{asset('plugins/font-icons/fontawesome/css/all.min.css')}}" />
   <link rel="stylesheet" type="text/css" href="{{asset('assets/css/scrollspyNav.css')}}" />
   <link rel="stylesheet" type="text/css" href="{{asset('assets/css/widgets/modules-widgets.css')}}" />
   <link rel="stylesheet" type="text/css" href="{{asset('plugins/select2/select2.min.css')}}" />
   {{-- User Profile --}}
   <link rel="stylesheet" type="text/css" href="{{asset('assets/css/users/user-profile.css')}}" />
   {{-- From Create --}}
   <link rel="stylesheet" type="text/css" href="{{asset('plugins/dropify/dropify.min.css')}}"/>
   <link rel="stylesheet" type="text/css" href="{{asset('assets/css/users/account-setting.css')}}"/>
   <link rel="stylesheet" type="text/css" href="{{asset('assets/css/elements/alert.css')}}">
   {{-- SweatAlert --}}
   {{-- <link rel="stylesheet" type="text/css" href="{{asset('plugins/animate/animate.css')}}"/> --}}
   {{-- <link rel="stylesheet" type="text/css" href="{{asset('plugins/sweetalerts/sweetalert2.min.css')}}" />
   <link rel="stylesheet" type="text/css" href="{{asset('plugins/sweetalerts/sweetalert.css')}}" />
   <link rel="stylesheet" type="text/css" href="{{asset('assets/css/components/custom-sweetalert.css')}}" /> --}}
   <!-- END GLOBAL MANDATORY STYLES -->
</head>
<body class="alt-menu" data-spy="scroll" data-offset="50">

   <!-- BEGIN LOADER -->
      {{-- <div id="load_screen"> <div class="loader"> <div class="loader-content">
         <div class="spinner-grow align-self-center"></div>
      </div></div></div> --}}
   <!-- END LOADER -->

      

      @yield('nav_header') {{-- NAVBAR HEADER --}}

      <!--  BEGIN MAIN CONTAINER  -->
      <div class="main-container" id="container">
   
         <div class="overlay"></div>
         <div class="search-overlay"></div>
         
         <!--  BEGIN CONTENT PART  -->
         <div id="content" class="main-content">

            @yield('content') {{-- CONTENT --}}

            @yield('footer')

         </div> {{-- MAIN-CONTENT --}}

      </div>{{-- END MAIN CONTAINER --}}



   <!-- BEGIN GLOBAL MANDATORY STYLES -->
   <script src="{{asset('assets/js/libs/jquery-3.1.1.min.js')}}"></script>
   <script src="{{asset('bootstrap/js/popper.min.js')}}"></script>
   <script src="{{asset('bootstrap/js/bootstrap.min.js')}}"></script>
   {{-- <script src="{{asset('plugins/perfect-scrollbar/perfect-scrollbar.min.js')}}"></script> --}}
   <script src="{{asset('assets/js/app.js')}}"></script>
   <script>
      $(document).ready(function() {
         App.init();
      });
   </script>
   <script src="{{asset('js/app.js')}}"></script>
   <script src="{{asset('assets/js/custom.js')}}"></script>
   <script src="{{asset('assets/js/scrollspyNav.js')}}"></script>
   {{-- Profile --}}
   <script src="{{asset('plugins/dropify/dropify.min.js')}}"></script>
   <script src="{{asset('plugins/blockui/jquery.blockUI.min.js')}}"></script>
   <script src="{{asset('assets/js/users/account-settings.js')}}"></script>
   {{-- feather icon --}}
   <script src="{{asset('plugins/font-icons/feather/feather.min.js')}}"></script>
   <script type="text/javascript">
      feather.replace();
   </script>
   {{-- SweatAlert --}}
   {{-- <script src="{{asset('plugins/sweetalerts/sweetalert2.min.js')}}"></script>
   <script src="{{asset('plugins/sweetalerts/custom-sweetalert.js')}}"></script>
   <script src="{{asset('plugins/sweetalerts/promise-polyfill.js')}}"></script> --}}
   <!-- END GLOBAL MANDATORY STYLES -->
   <!-- BEGIN PAGE LEVEL SCRIPTS -->
   @yield('trigger')
   <!-- END PAGE LEVEL SCRIPTS -->
</body>
</html>