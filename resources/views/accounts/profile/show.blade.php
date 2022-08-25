@extends('layouts.appuser')

@section('page_title')
   {{"Profile"}}
@endsection

@section('nav_header')
   <!--  BEGIN NAVBAR  -->
   <div class="header-container fixed-top">
      <header class="header navbar navbar-expand-sm">
         <div class="container">
               <ul class="navbar-item theme-brand flex-row  text-center">
                  <li class="nav-item theme-logo">
                     {{-- <a href="#"class="navbar-brand"> --}}
                        {{-- <img alt="Politeknik Negeri Banyuwangi" data-retina="{{asset('assets/images/logo/flag_lowongan.png')}}" data-src="{{asset('assets/images/logo/flag_lowongan.png')}}" class="navimg" src="{{asset('assets/images/logo/flag_lowongan.png')}}" > --}}
                     {{-- </a> --}}
                     <a href="{{ route('role'.(Auth::user()->roles()->first()->name == 'user' ? 'User' : 'Admin')) }}">
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
   <div class="sub-header-container">
      <header class="header navbar navbar-expand-sm">
         <a href="javascript:void(0);" class="sidebarCollapse" data-placement="bottom"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg></a>

         <ul class="navbar-nav flex-row">
               <li>
                  <div class="page-header">

                     <nav class="breadcrumb-one" aria-label="breadcrumb">
                           <ol class="breadcrumb">
                              <li class="breadcrumb-item"><a href="javascript:void(0);">Profile</a></li>
                              <li class="breadcrumb-item active" aria-current="page"><span>{{ Auth::user()->name }}</span></li>
                           </ol>
                     </nav>

                  </div>
               </li>
         </ul>
      </header>
   </div>
@endsection

@section('content')
   <div class="layout-px-spacing">

      <div class="row layout-spacing">

         <!-- Content -->
         <div class="col-xl-4 col-lg-6 col-md-5 col-sm-12 layout-top-spacing">

            <div class="user-profile layout-spacing">
               <div class="widget-content widget-content-area">
                  <div class="d-flex justify-content-between">
                        <a href="{{ route('role'.(Auth::user()->roles()->first()->name == 'user' ? 'User' : 'Admin')) }}" class="mt-2 edit-profile">
                           <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" 
                           viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" 
                           stroke-linecap="round" stroke-linejoin="round" 
                           class="feather feather-arrow-left">
                           <line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>
                        </a>

                        <h3 class="">Profile</h3>
                        
                        <a href="{{ route('profile.edit') }}" class="mt-2 edit-profile"> 
                           <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                              stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-settings">
                              <circle cx="12" cy="12" r="3"></circle>
                              <path d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1 0 2.83 2 2 0 0 1-2.83 0l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-2 2 2 2 0 0 1-2-2v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83 0 2 2 0 0 1 0-2.83l.06-.06a1.65 1.65 0 0 0 .33-1.82 1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1-2-2 2 2 0 0 1 2-2h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 0-2.83 2 2 0 0 1 2.83 0l.06.06a1.65 1.65 0 0 0 1.82.33H9a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 2-2 2 2 0 0 1 2 2v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 0 2 2 0 0 1 0 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82V9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 2 2 2 2 0 0 1-2 2h-.09a1.65 1.65 0 0 0-1.51 1z">
                              </path>
                           </svg>
                        </a>
                  </div>
                  <div class="text-center user-info">
                     <img src="{{ asset( auth()->user()->image ) }}" onerror="this.src='{{asset('assets/images/90x90.jpg')}}'" data-default-file="{{asset('assets/images/90x90.jpg')}}" style="width: 75px; height: 75px; object-fit: cover; object-position: top; border-radius: 6px; border: 1px solid #d3d3d3;">
                     <p class="">{{ Auth::user()->name }}</p>
                  </div>
                  <div class="user-info-list">

                        <div class="">
                           <ul class="contacts-block list-unstyled">
                              
                              <li class="contacts-block__item">
                                 <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                    class="feather feather-map-pin">
                                    <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path>
                                    <circle cx="12" cy="10" r="3"></circle>
                                 </svg>&nbsp;{{ Auth::user()->programstudi->program_studi }}
                              </li>

                              <li class="contacts-block__item">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                       viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                       stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                       class="feather feather-calendar">
                                       <rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect>
                                       <line x1="16" y1="2" x2="16" y2="6"></line>
                                       <line x1="8" y1="2" x2="8" y2="6"></line>
                                       <line x1="3" y1="10" x2="21" y2="10"></line>
                                    </svg>&nbsp;{{ Auth::user()->nim }}
                              </li>

                              <li class="contacts-block__item">
                                    <a href="mailto:example@mail.com"><svg
                                          xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                          viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                          stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                          class="feather feather-mail">
                                          <path
                                                d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z">
                                          </path>
                                          <polyline points="22,6 12,13 2,6"></polyline>
                                       </svg>&nbsp;{{ Auth::user()->email }}</a>
                              </li>

                              <li class="contacts-block__item">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                       viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                       stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                       class="feather feather-phone">
                                       <path
                                          d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z">
                                       </path>
                                    </svg>&nbsp;{{ Auth::user()->phone }}
                              </li>

                           </ul>
                        </div>
                  </div>
               </div>
            </div> {{-- Profile --}}

            <div class="education layout-spacing ">
               <div class="widget-content widget-content-area">
                  {{-- All --}}
                  @if (Auth::user()->roles()->first()->name === 'user')
                     <h3 class="">Rekap Hasil Tes</h3>
                     <div class="timeline-alter">
                        @foreach ($latest as $recap)
                           <div class="item-timeline">
                              <div class="t-meta-date">
                                 <p class="">{{ $recap->updated_at->format('d F, Y',) }}</p>
                              </div>
                              <div class="t-dot">
                              </div>
                              <div class="t-text">
                                 <p>{{ $recap->namatipe }}</p>
                              </div>
                           </div>
                        @endforeach
                     </div>
                  @else
                     <h3>Tidak ada Rekap</h3>
                     <div class="timeline-alter">
                        <div class="t-meta-date">
                           <p class="">Tidak Rekap Tes</p>
                        </div>
                     </div>
                  @endif

               </div>
            </div> {{-- Rekap Hasil Tes --}} 

         </div>

         @if (Auth::user()->roles()->first()->name === 'user')

            <div class="col-xl-8 col-lg-6 col-md-7 col-sm-12 layout-top-spacing">

               {{-- isset($latest) && !empty($latest) --}}
               @if($latest)

                  <div class="skills layout-spacing ">
                     <div class="widget-content widget-content-area">

                        <h3 class="">Hasil Tes Kepribadian</h3>

                        <div class="present-content">
                           @foreach ($tipe as $t)


                              <div class="summary-list">
                                 <div class="w-icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-credit-card"><rect x="1" y="4" width="22" height="16" rx="2" ry="2"></rect><line x1="1" y1="10" x2="23" y2="10"></line></svg>
                                 </div>
                                 <div class="w-summary-details mr-2">
                                    <div class="w-summary-info">
                                          <h6>({{ $t->namatipe }}) </h6>
                                    </div>
                                    <div class="w-summary-stats">
                                       <div class="progress">
                                          <div class="progress-bar bg-gradient-info progress-bar-striped" role="progressbar" style="width: {{ $t->presentase }}%" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100"></div>
                                       </div>
                                    </div>
                                    <div class="w-summary-info">
                                          <!-- <h6>{{ $t->presentase }} &percnt;</h6>  -->
                                          <h6>{{ $t->presentase }} pilihan dipilih</h6> 
                                    </div>
                                 </div>
                                 <div class="w-icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-credit-card"><rect x="1" y="4" width="22" height="16" rx="2" ry="2"></rect><line x1="1" y1="10" x2="23" y2="10"></line></svg>
                                 </div>
                              </div>
                           @endforeach
                        </div> <!-- /present-content -->
                        {{-- nama tipe --}}
                        <div class="col-12 col-xl-12 col-lg-12 mb-xl-6" style="text-align: center; margin-top: 30px;">
                           <div class="card component-card_1">
                              <div class="card-body">
                                 <h2 class="card-title" style="text-transform: uppercase; font-weight: 700; color:rgba(255, 171, 0, 1);">{{ $hasil->namatipe ?? null }}</h2>
                                 <h6 class="card-text" style="text-transform: capitalize; font-style: italic;">&#40; {{ $hasil->deskripsi ?? null }} &#41;</h6>
                              </div>
                           </div>
                        </div>
                        
                     </div> {{-- widget-content --}}
                  </div> {{-- skills layout-spacing --}}

               @else

                  <div class="skills layout-spacing ">
                     <div class="widget-content widget-content-area">
                        <h3 class="">Anda Belum Mengikuti Tes</h3>
                     </div>
                  </div>

               @endif

            </div>{{-- col-8 --}}

         @else {{-- kondisi jika role pengguna superadmin/ admin --}}
            
            <div class="col-xl-8 col-lg-6 col-md-7 col-sm-12 layout-top-spacing">
               <div class="skills layout-spacing ">
                  <div class="widget-content widget-content-area">
                     <h3 class="">Tidak Ada Hasil Tes Kepribadian</h3>
                     <div class=""></div>
                  </div>
               </div>
            </div>

         @endif

      </div> {{-- row layout-spacing --}}

   </div>
@endsection