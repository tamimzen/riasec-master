   <!--  BEGIN NAVBAR  -->
   <div class="header-container fixed-top">
      <header class="header navbar navbar-expand-sm">
         <div class="container">
               <ul class="navbar-item theme-brand flex-row  text-center">
                  <li class="nav-item theme-logo">
                     {{-- <a href="#"class="navbar-brand"> --}}
                        <!-- <img alt="Politeknik Negeri Banyuwangi" data-retina="{{asset('assets/images/logo/flag_lowongan.png')}}" data-src="{{asset('assets/images/logo/flag_lowongan.png')}}" class="navimg" src="{{asset('assets/images/logo/flag_lowongan.png')}}" > -->
                     {{-- </a> --}}
                     <a href="{{route('roleAdmin')}}">
                        <img alt="Politeknik Negeri Banyuwangi" data-retina="{{asset('assets/images/logo/logo.png')}}" data-src="{{asset('assets/images/logo/logo.png')}}" class="navimg m-0" src="{{asset('assets/images/logo/logo.png')}}" >
                     </a>
                  </li>
               </ul>

               <ul class="navbar-item flex-row ml-md-auto">
                  <li class="nav-item dropdown user-profile-dropdown">
                     <a href="javascript:void(0);" class="nav-link dropdown-toggle user" id="userProfileDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                        <img src="{{ asset(auth()->user()->image) }}" style="width: 35px; height: 35px; object-fit: cover; object-position: top; border-radius: 6px; border: 1px solid #d3d3d3;" onerror="this.src='{{asset('assets/images/90x90.jpg')}}'" data-default-file="{{ asset('assets/images/90x90.jpg') }}">
                     </a>
                     <div class="dropdown-menu position-absolute" aria-labelledby="userProfileDropdown">
                        <div class="">
                           <div class="dropdown-item">
                              <a class="" href="{{ route('profile.show') }}"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg> My Profile</a>
                           </div>
                           <div class="dropdown-item">
                              <a class="dropdown-item" href="#" onclick="event.preventDefault();
                              document.getElementById('logout-form').submit();"><svg xmlns="http://www.w3.org/2000/svg" width="24"
                                    height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                    class="feather feather-log-out">
                                    <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path>
                                    <polyline points="16 17 21 12 16 7"></polyline>
                                    <line x1="21" y1="12" x2="9" y2="12"></line>
                              </svg> Sign Out</a>
                              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                 @csrf
                              </form>
                           </div>
                        </div>
                     </div>
                  </li>
               </ul>
         </div>
      </header>
   </div>
   <!--  END NAVBAR  -->

   <!--  BEGIN NAVBAR  -->
   <div class="sub-header-container">
      <header class="header navbar navbar-expand-sm">
         <a href="javascript:void(0);" class="sidebarCollapse" data-placement="bottom"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-menu"><line x1="3" y1="12" x2="21" y2="12"></line><line x1="3" y1="6" x2="21" y2="6"></line><line x1="3" y1="18" x2="21" y2="18"></line></svg></a>

         <ul class="navbar-nav flex-row">
               <li>
                  <div class="page-header">

                     <nav class="breadcrumb-one" aria-label="breadcrumb">
                           <ol class="breadcrumb">
                              <li class="breadcrumb-item"><a href="javascript:void(0);">Test Kepribadian RIASEC</a></li>
                              <li class="breadcrumb-item active" aria-current="page"><span>{{$pageName}}</span></li>
                           </ol>
                     </nav>

                  </div>
               </li>
         </ul>
      </header>
   </div>
   <!--  END NAVBAR  -->