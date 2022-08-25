<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="utf-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
   <title>404&nbsp;-&nbsp;Job Placement Center Politeknik Negeri Banyuwangi</title>
	<link rel="icon" type="image/x-icon" href="https://www.poliwangi.ac.id/vendors/uploads/2019/11/kop-300x286.png"/>
	<meta name="csrf-token" content="{{ csrf_token() }}">
   <!-- BEGIN GLOBAL MANDATORY STYLES -->
   <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700" rel="stylesheet">
   <link href="{{asset('assets/css/plugins.css')}}" rel="stylesheet" type="text/css" />
   <link href="{{asset('css/app.css')}}" rel="stylesheet">
   <link href="{{asset('assets/css/pages/error/style-400.css')}}" rel="stylesheet" type="text/css" />
   <!-- END GLOBAL MANDATORY STYLES -->
   
</head>
   <body class="error404 text-center">
      
      <div class="container-fluid">
         <div class="row">
            <div class="col-md-4 mr-auto mt-5 text-md-left text-center">
                  <a href="{{url('/')}}" class="ml-md-5">
                     <img alt="Politeknik Negeri Banyuwangi" data-retina="https://jpc.poliwangi.ac.id/template/jpcthemebaru/img/poliwangi/logo/logo.png" data-src="https://jpc.poliwangi.ac.id/template/jpcthemebaru/img/poliwangi/logo/logo.png" class="theme-logo m-0" src="https://jpc.poliwangi.ac.id/template/jpcthemebaru/img/poliwangi/logo/logo.png" >
                  </a>
            </div>
         </div>
      </div>
      <div class="container-fluid error-content">
         <div class="">
            <h1 class="error-number">404</h1>
            <p class="mini-text">Ooops!</p>
            <p class="error-text mb-4 mt-1">Halaman yang Anda minta tidak di temukan!</p>
            <a href="{{url('/')}}" class="btn btn-primary mt-5">Kembali</a>
         </div>
      </div>    
      <!-- BEGIN GLOBAL MANDATORY SCRIPTS -->
      <script src="{{asset('assets/js/libs/jquery-3.1.1.min.js')}}"></script>
      <script src="{{asset('js/app.js')}}"></script>
      <!-- END GLOBAL MANDATORY SCRIPTS -->
   </body>
</html>