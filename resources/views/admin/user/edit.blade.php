@extends('layouts.appuser')

@section('page_title','Manage Account')

@section('nav_header')
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
                        <img src="{{ asset(auth()->user()->image) }}" style="width: 35px; height: 35px; object-fit: cover; object-position: top; border-radius: 6px; border: 1px solid #d3d3d3;" onerror="this.src='{{asset('assets/images/90x90.jpg')}}'" data-default-file="{{asset('assets/images/90x90.jpg')}}">
                     </a>
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
                              <li class="breadcrumb-item"><a href="javascript:void(0);">RIASEC</a></li>
                              <li class="breadcrumb-item active" aria-current="page"><span>Manage Account</span></li>
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
   <div class="account-settings-container layout-top-spacing">

      <div class="account-content">
         <div class="scrollspy-example" data-spy="scroll" data-target="#account-settings-scroll" data-offset="-100">
            
            <div class="row">
               <div class="col-xl-12 col-lg-12 col-md-12 layout-spacing">
                  
                  @include('layouts.alert.alert')

                  <form method="POST" action="{{ route('account.update', $acount->id) }}" role="form" enctype="multipart/form-data" id="general-info" class="section general-info" >
                     @csrf
                     @method('PATCH')
                     <div class="info">
                        <h6 class="">General Information</h6>
                        <div class="row">
                              <div class="col-lg-11 mx-auto">
                                 <div class="row">
                                    <div class="col-xl-2 col-lg-12 col-md-4">

                                       <div class="upload mt-4 pr-md-4">
                                          <input id="profile_image" type="file" class="dropify" @error('profile_image') is-invalid @enderror name="profile_image" src="{{ asset($acount->image) }}" onerror="this.src='{{asset('assets/images/90x90.jpg')}}'" data-default-file="{{asset('assets/images/90x90.jpg')}}" value="{{ asset($acount->image) }}"/>
                                          @error('profile_image') <div class="invalid-feedback">{{$message}}</div>@enderror
                                          <p class="mt-2"><i class="flaticon-cloud-upload mr-1"></i>Upload Foto, Max : 2MB</p>
                                       </div> 
                                       
                                    </div>
                                    <div class="col-xl-10 col-lg-12 col-md-8 mt-md-0 mt-4">
                                          <div class="form mb-5">

                                             <div class="form-row mb-2">
                                                <div class="form-group col-md-9">
                                                   <label for="email">Email</label>
                                                   <input type="text" class="form-control"
                                                   @if (Auth::user()->roles()->first()->name === 'admin')
                                                      @error('email') is-invalid @enderror" name="email" value="{{ $acount->email }}" autofocus="1" readonly="1" />
                                                   @else
                                                      @error('email') is-invalid @enderror" name="email" value="{{ $acount->email }}" />
                                                   @endif
                                                      @error('email') <div class="invalid-feedback">{{$message}}</div>@enderror
                                                </div>
                           
                                                <div class="form-group col-md-3">
                                                   <label for="password">Password</label><br>
                                                   <a href="{{route('password.edit')}}" class="btn btn-info"><i data-feather="unlock"></i>&nbsp;Ganti Password</a>
                                                </div>
                                             </div>

                                             <div class="form-group">
                                                <label for="name">Nama</label>
                                                <input type="text" class="form-control mb-4"
                                                @error('name') is-invalid @enderror" name="name" value="{{ $acount->name }}" />
                                                @error('name') <div class="invalid-feedback">{{$message}}</div>@enderror
                                             </div>

                                             <div class="form-group">
                                                <label for="username">Username</label>
                                                <input type="text" class="form-control mb-4"
                                                @error('username') is-invalid @enderror" name="username" value="{{ $acount->username }}" />
                                                @error('username') <div class="invalid-feedback">{{$message}}</div>@enderror
                                             </div>

                                             <div class="form-group">
                                                <label for="nim">NIM</label>
                                                <input type="text" class="form-control mb-4"
                                                @error('nim') is-invalid @enderror" name="nim" value="{{ $acount->nim }}" />
                                                @error('nim') <div class="invalid-feedback">{{$message}}</div>@enderror
                                             </div>

                                             <div class="form-group">
                                                <label for="phone">Nomor Telephone</label>
                                                <input type="text" class="form-control mb-4"
                                                @error('phone') is-invalid @enderror" name="phone" value="{{ $acount->phone }}" />
                                                @error('phone') <div class="invalid-feedback">{{$message}}</div>@enderror
                                             </div>

                                             <div class="form-group">
                                                <label for="programstudi">Program Studi</label>
                                                <select class="form-control prodi" name="programstudi_id">
                                                   <option value="{{ $acount->programstudi_id ?? null }}" selected> {{ $acount->programstudi->program_studi ?? null }}</option>
                                                   @foreach ($programstudi as $prodi)
                                                      <option value="{{$prodi->id}}">
                                                         {{ $prodi->program_studi }}
                                                      </option>
                                                   @endforeach
                                                </select>
                                             </div>

                                             <div class="form-group">
                                                <label for="tahun">Tahun Masuk</label>
                                                <select class="form-control tahun" name="tahun_id">
                                                   <option value="{{ $acount->tahun_id }}" selected> 20{{ $acount->tahun->tahun ?? null }}</option>
                                                   @foreach ($angkatan as $tahun)
                                                      <option value="{{$tahun->id}}">
                                                         20{{ $tahun->tahun }}
                                                      </option>
                                                   @endforeach
                                                </select>
                                             </div>

                                          </div>
                                    </div>
                                 </div>
                              </div>
                        </div>
                     </div> {{-- info --}}
                     
                     <div class="account-settings-footer">
                        <div class="as-footer-container">
                           <a href="{{ route('account.index') }}" class="btn btn-dark" >Kembali</a>
                           <button id="savesoal" type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                     </div>  {{-- account-settings-footer --}}
                  </form>
               </div> {{-- col-12 --}}
            </div> {{-- row --}}
         </div> {{-- scrollspy-example--}}
      </div> {{-- account-content --}}

   </div> {{-- account-settings-container --}}
</div>
@endsection
@section('trigger')
<script src="{{asset('plugins/select2/select2.min.js')}}"></script>
<script>
   $('select[name="programstudi_id"]').select2({ })
</script>
<script>
   $('select[name="tahun_id"]').select2({ })
</script>
@endsection