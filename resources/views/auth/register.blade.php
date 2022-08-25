@extends('auth.auth')
@section('page_title')
   {{"Register"}}
@endsection

@section('content')
   
<div class="form-content">
   @include('layouts.alert.alert')
   <div class="maintanence-hero-img">
      <a href="{{url('/')}}">
         <img alt="Politeknik Negeri Banyuwangi" data-retina="{{asset('assets/images/logo/icon_poliwangi.png')}}" data-src="{{asset('assets/images/logo/icon_poliwangi.png')}}" class="m-0" src="{{asset('assets/images/logo/icon_poliwangi.png')}}" >
      </a>
   </div>
   <h1 class="">Register</h1>
   <p class="signup-link register">Sudah memiliki akun? <a href="{{Route('formlogin')}}">Masuk</a></p>
   <form action="{{ route('auth.create') }}" method="post" class="text-left">
      @csrf
      <div class="form">

         <div id="username-field" class="field-wrapper input">
            <label for="username">NAMA</label>
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
            <input type="text" class="form-control  @error('name') is-invalid @enderror" name="name" value="{{old('name')}}" placeholder="nama">
               @error('name') <div class="invalid-feedback">{{$message}}</div>@enderror 
         </div>

         <div id="username-field" class="field-wrapper input">
            <label for="username">USERNAME</label>
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
            <input type="text" class="form-control  @error('username') is-invalid @enderror" name="username" value="{{old('username')}}" placeholder="username">
               @error('username') <div class="invalid-feedback">{{$message}}</div>@enderror 
         </div>

         <div id="nim-field" class="field-wrapper input">
            <div class="d-flex justify-content-between">
               <label for="nim">NIM</label>
               <a href="https://pddikti.kemdikbud.go.id/" target="_blank" class="forgot-pass-link">Jika lupa NIM silahkan klik Link berikut.</a>
            </div>
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
            <input type="text" class="form-control  @error('nim') is-invalid @enderror" name="nim" value="{{old('nim')}}" placeholder="nomor induk mahasiswa">
               @error('nim') <div class="invalid-feedback">{{$message}}</div>@enderror
         </div>

         <div id="phone-field" class="field-wrapper input">
            <label for="phone">NOMOR TELEPHONE</label>
            {{-- <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-phone"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path></svg> --}}
            <i data-feather="phone"></i>
            <input type="text" class="form-control  @error('phone') is-invalid @enderror" name="phone" value="{{old('phone')}}" placeholder="Nomor Whatsapp" required>
               @error('phone') <div class="invalid-feedback">{{$message}}</div>@enderror
         </div>

         <div id="program studi" class="field-wrapper input select-prodi">
            <label for="nim">PROGRAM STUDI</label>
            <select class="form-control prodi" name="programstudi_id" style="margin-bottom: 0;">
               <option selected disabled>pilih jurusan anda</option>
               @foreach ($programstudi as $studi)
                  <option value="{{$studi->id}}">
                     {{ $studi->program_studi }}
                  </option>
               @endforeach
            </select>
         </div>

         <div id="program studi" class="field-wrapper input select-prodi">
            <label for="nim">TAHUN MASUK</label>
            <select class="form-control prodi" name="tahun_id" style="margin-bottom: 0;">
               <option selected disabled>tahun masuk kuliah</option>
               @foreach ($angkatan as $tahun)
                  <option value="{{$tahun->id}}">
                     20{{ $tahun->tahun }}
                  </option>
               @endforeach
            </select>
         </div>

         <div id="email-field" class="field-wrapper input">
            <label for="email">EMAIL</label>
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-at-sign register"><circle cx="12" cy="12" r="4"></circle><path d="M16 8v5a3 3 0 0 0 6 0v-1a10 10 0 1 0-3.92 7.94"></path></svg>
            <input type="email" class="form-control  @error('email') is-invalid @enderror" name="email" value="{{old('email')}}" placeholder="email">
               @error('email') <div class="invalid-feedback">{{$message}}</div>@enderror
         </div>

         <div id="password-field" class="field-wrapper input">
            <div class="d-flex justify-content-between">
                  <label for="password">PASSWORD</label>
            </div>
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-lock"><rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect><path d="M7 11V7a5 5 0 0 1 10 0v4"></path></svg>
            <input id="password" name="password" type="password" class="form-control" placeholder="password">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" id="toggle-password" class="feather feather-eye"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle></svg>
         </div>

         <div id="confirm" class="field-wrapper input mb-2">
            <div class="d-flex justify-content-between">
                  <label for="password">CONFIRM PASSWORD</label>
            </div>
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-lock"><rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect><path d="M7 11V7a5 5 0 0 1 10 0v4"></path></svg>
            <input id="password-confirm" name="password_confirmation" type="password" class="form-control" placeholder="confirm password">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" onclick="myFunction()" id="toggle-confirm" class="feather feather-eye"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle></svg>
         </div>

         <div class="field-wrapper terms_condition">
            <div class="n-chk">
                  <label class="new-control new-checkbox checkbox-primary">
                  <input type="checkbox" class="new-control-input">
                  <span class="new-control-indicator"></span><span>saya menyetujui <a href="javascript:void(0);">syarat dan ketentuan </a></span>
                  </label>
            </div>
         </div>

         <div class="d-sm-flex justify-content-between">
            <div class="field-wrapper">
                  <button type="submit" class="btn btn-primary" value="">Daftar</button>
            </div>
         </div>

      </div>
   </form>

</div>  
@endsection
@section('trigger')
<script src="{{asset('plugins/select2/select2.min.js')}}"></script>
<script>
   $('select[name="programstudi_id"]').select2()
</script>
<script>
   $('select[name="tahun_id"]').select2()
</script>
@endsection