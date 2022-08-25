<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
   <meta charset="utf-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
   <title>@yield('page_title')&nbsp;-&nbsp;Job Placement Center Politeknik Negeri Banyuwangi</title>
   <!-- Favicon -->
   <link rel="icon" type="image/x-icon" href="{{asset('assets/images/logo/icon_poliwangi.png')}}"/>
   <meta name="csrf-token" content="{{ csrf_token() }}">

   <!-- BEGIN GLOBAL MANDATORY STYLES -->
   <link rel="stylesheet" type="text/css" href="{{asset('bootstrap/css/bootstrap.min.css')}}" />
   <link rel="stylesheet" type="text/css" href="{{asset('assets/css/plugins.css')}}" />
   <link rel="stylesheet" type="text/css" href="{{asset('css/app.css')}}" />
   <link rel="stylesheet" type="text/css" href="{{asset('plugins/font-icons/fontawesome/css/all.min.css')}}" />
   <link rel="stylesheet" type="text/css" href="{{asset('plugins/select2/select2.min.css')}}" />
   <link rel="stylesheet" type="text/css" href="{{asset('assets/css/dashboard/dash_1.css')}}" />
   {{-- Crud User --}}
   <link rel="stylesheet" type="text/css" href="{{asset('assets/css/forms/theme-checkbox-radio.css')}}">
   <link rel="stylesheet" type="text/css" href="{{asset('plugins/jquery-ui/jquery-ui.min.css')}}" />
   <link rel="stylesheet" type="text/css" href="{{asset('assets/css/apps/contacts.css')}}" />
   {{-- User Profile --}}
   <link rel="stylesheet" type="text/css" href="{{asset('assets/css/users/user-profile.css')}}" />
   {{-- From Create --}}
   <link rel="stylesheet" type="text/css" href="{{asset('plugins/dropify/dropify.min.css')}}"/>
   <link rel="stylesheet" type="text/css" href="{{asset('assets/css/users/account-setting.css')}}"/>
   {{-- Datatable --}}
   <link rel="stylesheet" type="text/css" href="{{asset('plugins/table/datatable/datatables.css')}}" />
   <link rel="stylesheet" type="text/css" href="{{asset('plugins/table/datatable/dt-global_style.css')}}" />
   <link rel="stylesheet" type="text/css" href="{{asset('plugins/table/datatable/custom_dt_custom.css')}}">
   <link rel="stylesheet" type="text/css" href="{{asset('plugins/table/datatable/custom_dt_html5.css')}}">
   <link rel="stylesheet" type="text/css" href="{{asset('assets/css/elements/alert.css')}}">
   {{-- Modal --}}
   <link rel="stylesheet" type="text/css" href="{{asset('assets/css/components/custom-modal.css')}}"  />
   {{-- SweatAlert --}}
   <link rel="stylesheet" type="text/css" href="{{asset('assets/css/scrollspyNav.css')}}"/>
   <link rel="stylesheet" type="text/css" href="{{asset('plugins/animate/animate.css')}}"/>
   <link rel="stylesheet" type="text/css" href="{{asset('plugins/sweetalerts/sweetalert2.min.css')}}" />
   <link rel="stylesheet" type="text/css" href="{{asset('plugins/sweetalerts/sweetalert.css')}}" />
   <link rel="stylesheet" type="text/css" href="{{asset('assets/css/components/custom-sweetalert.css')}}" />
   <!-- END GLOBAL MANDATORY STYLES -->


</head>
<body>
   
   @yield('nav_header')

   <!--  BEGIN MAIN CONTAINER  -->
   <div class="main-container" id="container">

      <div class="overlay"></div>
      <div class="search-overlay"></div>

      <!--  BEGIN SIDEBAR  -->
      <div class="sidebar-wrapper sidebar-theme">
         <nav id="sidebar">
               <div class="shadow-bottom"></div>
               <ul class="list-unstyled menu-categories" id="accordionExample">

                  <li class="menu {{ (request()->segment(1) == 'admin') ? 'active' : ''  }}">
                     <a href="{{ route('roleAdmin') }}" aria-expanded="{{ (request()->segment(1) == 'admin') ? 'true' : 'false' }}" class="dropdown-toggle">
                        <div class="">
                           <i data-feather="trello"></i>
                           <span>Rekap Angkatan</span>
                        </div>
                     </a>
                  </li>                      

                  <li class="menu {{ (request()->segment(1) == 'soal') ? 'active' : '' }}">
                     <a href="{{ route('soal.index') }}" aria-expanded="{{ (request()->segment(1) == 'soal') ? 'true' : 'false' }}" class="dropdown-toggle">
                        <div class="">
                           <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                              fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                              stroke-linejoin="round" class="feather feather-clipboard">
                              <path d="M16 4h2a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h2">
                              </path>
                              <rect x="8" y="2" width="8" height="4" rx="1" ry="1"></rect>
                           </svg>
                           <span>Daftar Soal</span>
                        </div>
                     </a>
                  </li>

                  <!-- <li class="menu {{ (request()->segment(1) == 'waktu') ? 'active' : '' }}">
                     <a href="{{route('waktu.index')}}" aria-expanded="{{ (request()->segment(1) == 'waktu') ? 'true' : 'false' }}" class="dropdown-toggle">
                        <div class="">
                           <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-users"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>
                           <span>Timer</span>
                        </div>
                     </a>
                  </li> -->

                  <li class="menu {{ (request()->segment(1) == 'tipekep') ? 'active' : '' }}">
                     <a href="{{ route('tipekep.index') }}" aria-expanded="{{ (request()->segment(1) == 'tipekep') ? 'true' : 'false' }}" class="dropdown-toggle">
                        <div class="">
                           <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                              fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                              stroke-linejoin="round" class="feather feather-layers">
                              <polygon points="12 2 2 7 12 12 22 7 12 2"></polygon>
                              <polyline points="2 17 12 22 22 17"></polyline>
                              <polyline points="2 12 12 17 22 12"></polyline>
                           </svg>
                           <span>Tipe Kepribadian</span>
                        </div>
                     </a>
                  </li>

                  <li class="menu {{ (request()->segment(1) == 'programstudi') ? 'active' : '' }}">
                     <a href="{{ route('programstudi.index') }}" aria-expanded="{{ (request()->segment(1) == 'programstudi') ? 'true' : 'false' }}" class="dropdown-toggle">
                        <div class="">
                           <i data-feather="user-check"></i>
                           <span>Program Studi</span>
                        </div>
                     </a>
                  </li>

                  <li class="menu {{ (request()->segment(1) == 'account') ? 'active' : '' }}">
                     <a href="{{route('account.index')}}" aria-expanded="{{ (request()->segment(1) == 'account') ? 'true' : 'false' }}" class="dropdown-toggle">
                        <div class="">
                           <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-users"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>
                           <span>Daftar Pengguna</span>
                        </div>
                     </a>
                  </li>
                  
                  <li class="menu">
                     <a href="{{asset('assets/PanduanAdmin.pdf')}}" target="_blank" rel="noopener" aria-expanded="false" class="dropdown-toggle">
                        <div class="">
                           <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-book"><path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"></path><path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z"></path></svg>
                           <span>Dokumentasi</span>
                        </div>
                     </a>
                  </li>
               
               </ul>
               <div class="shadow-bottom"></div>
         </nav>
      </div>
      <!--  END SIDEBAR  -->

      <!--  BEGIN CONTENT AREA  -->
      <div id="content" class="main-content">
         <div class="layout-px-spacing">
         
            @yield('content')
         
         </div> {{-- layout-px-spacing --}}
            @yield('footer')
      </div>
      
      <!--  END CONTENT AREA  -->
   </div>
   <!-- END MAIN CONTAINER -->

   
   <!-- BEGIN GLOBAL MANDATORY STYLES -->
   <script src="{{asset('assets/js/libs/jquery-3.1.1.min.js')}}"></script>
   <script src="{{asset('plugins/jquery-ui/jquery-ui.min.js')}}"></script>
   <script src="{{asset('bootstrap/js/popper.min.js')}}"></script>
   <script src="{{asset('bootstrap/js/bootstrap.min.js')}}"></script>
   <!-- {{-- <script src="{{asset('plugins/perfect-scrollbar/perfect-scrollbar.min.js')}}"></script> --}} -->
   <script src="{{asset('assets/js/app.js')}}"></script>
   <script>
      $(document).ready(function() {
         App.init();
      });
   </script>
   <script src="{{asset('assets/js/custom.js')}}"></script>
   <script src="{{asset('js/app.js')}}"></script>
   <script src="{{asset('plugins/dropify/dropify.min.js')}}"></script>
   {{-- User Crud --}}
   <script src="{{asset('assets/js/apps/contact.js')}}"></script>
   {{-- Form Create --}}
   <script src="{{asset('plugins/blockui/jquery.blockUI.min.js')}}"></script>
   <script src="{{asset('assets/js/users/account-settings.js')}}"></script>
   <!-- END GLOBAL MANDATORY STYLES -->

   <!-- BEGIN PAGE LEVEL SCRIPTS -->
   {{-- feather icon --}}
   <script src="{{asset('plugins/font-icons/feather/feather.min.js')}}"></script>
   <script type="text/javascript">
      feather.replace();
   </script>

   {{-- SweatAlert --}}
   <script src="{{asset('assets/js/scrollspyNav.js')}}"></script>
   <script src="{{asset('plugins/sweetalerts/sweetalert2.min.js')}}"></script>
   <script src="{{asset('plugins/sweetalerts/custom-sweetalert.js')}}"></script>
   <script src="{{asset('plugins/sweetalerts/promise-polyfill.js')}}"></script>
   {{-- datatable --}}
   <script src="{{asset('plugins/table/datatable/datatables.js')}}"></script>
   <script>
      c1 = $('#style-2').DataTable({

            "oLanguage": {
               // untuk menampilkan button halmaman keberapa
               "oPaginate": { "sPrevious": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>', "sNext": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>' },
               // untuk menampilkan info jumlah data yang masuk pada tabel
               "sInfo": "Showing page _PAGE_ of _PAGES_",
               // ikon search
               "sSearch": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>',
               // placeholder search
               "sSearchPlaceholder": "Search...",
               // menampilkan meu jumlah data setiap page (kolom pojok kiri atas)
               "sLengthMenu": "Results :  _MENU_",
            },
            "lengthMenu": [8, 10, 20],
            "pageLength": 8,
      });

      multiCheck(c1);
   </script>
   <!-- END PAGE LEVEL SCRIPTS -->

   @yield('trigger')

</body>
</html>