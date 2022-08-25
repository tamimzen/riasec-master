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
   <link rel="stylesheet" type="text/css" href="{{asset('assets/css/authentication/form-2.css')}}" />
   <link rel="stylesheet" type="text/css" href="{{asset('assets/css/forms/theme-checkbox-radio.css')}}">
   <link rel="stylesheet" type="text/css" href="{{asset('assets/css/forms/switches.css')}}">
   <link rel="stylesheet" type="text/css" href="{{asset('plugins/select2/select2.min.css')}}"/>
   <link rel="stylesheet" type="text/css" href="{{asset('assets/css/elements/alert.css')}}">
   <!-- END GLOBAL MANDATORY STYLES -->
   {{-- SweatAlert --}}
   <link rel="stylesheet" type="text/css" href="{{asset('plugins/animate/animate.css')}}"/>
   <link rel="stylesheet" type="text/css" href="{{asset('assets/css/pages/error/style-maintanence.css')}}"/>
</head>
<body class="form">

   <div class="form-container outer">
      <div class="form-form">
         <div class="form-form-wrap">
            <div class="form-container">
               @yield('content')
            </div> {{-- form-container --}}
         </div> {{-- form-form-wrap --}}
      </div> {{-- form-form --}}
   </div> {{-- form-container outer --}}

   <!-- BEGIN GLOBAL MANDATORY STYLES -->
   <script src="{{asset('assets/js/libs/jquery-3.1.1.min.js')}}"></script>
   {{-- <script src="{{asset('bootstrap/js/popper.min.js')}}"></script> --}}
   <script src="{{asset('bootstrap/js/bootstrap.min.js')}}"></script>
   <script src="{{asset('assets/js/authentication/form-2.js')}}"></script>
   <!-- END GLOBAL MANDATORY STYLES -->
   @yield('trigger')
</body>
</html>