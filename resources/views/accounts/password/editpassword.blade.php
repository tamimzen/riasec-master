@extends('auth.auth')

@section('page_title','Ganti Password | ' . Auth::user()->slug)

@section('content')

<div class="form-content">

   @include('layouts.alert.alert')
   <div class="maintanence-hero-img">
      <a href="{{url('/')}}">
         <img alt="Politeknik Negeri Banyuwangi" data-retina="{{asset('assets/images/logo/icon_poliwangi.png')}}" data-src="{{asset('assets/images/logo/icon_poliwangi.png')}}" class="m-0" src="{{asset('assets/images/logo/icon_poliwangi.png')}}" >
      </a>
   </div>

   <h1 class="">Ganti Password</h1>
   <form action="{{ route('password.update') }}" method="post" class="text-left">
      @csrf
      @method('PATCH')
      <div class="form">

         <div id="email-field" class="field-wrapper input">
            <label for="username">EMAIL</label>
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-at-sign register"><circle cx="12" cy="12" r="4"></circle><path d="M16 8v5a3 3 0 0 0 6 0v-1a10 10 0 1 0-3.92 7.94"></path></svg>
            <input type="email" class="form-control  @error('email') is-invalid @enderror" name="email"  value="{{ Auth::user()->email }}" autofocus="1" readonly="1">
               @error('email') <div class="invalid-feedback">{{$message}}</div>@enderror
         </div>

         <div id="old_password-field" class="field-wrapper input">
            <label for="old_password">OLD PASSWORD</label>
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-lock"><rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect><path d="M7 11V7a5 5 0 0 1 10 0v4"></path></svg>
            <input id="old_password" type="password" class="form-control @error('old_password') is-invalid @enderror" name="old_password" >
               @error('old_password') <div class="invalid-feedback">{{$message}}</div>@enderror
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" onclick="myToggle()" id="toggle-confirm" class="feather feather-eye"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle></svg>
         </div>

         <div id="password-field" class="field-wrapper input">
            <div class="d-flex justify-content-between">
               <label for="password">NEW PASSWORD</label>
               <a href="#" class="forgot-pass-link">Min 8-22 character</a>
            </div>
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-lock"><rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect><path d="M7 11V7a5 5 0 0 1 10 0v4"></path></svg>
            <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" id="password">
               @error('password') <div class="invalid-feedback">{{$message}}</div>@enderror
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" id="toggle-password" class="feather feather-eye"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle></svg>
         </div>

         <div id="confirm-field" class="field-wrapper input">
            <label for="confirm">CONFIRM PASSWORD</label>
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-lock"><rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect><path d="M7 11V7a5 5 0 0 1 10 0v4"></path></svg>
            <input type="password" class="form-control @error('password-confirm') is-invalid @enderror" id="password-confirm" name="password_confirmation">
               @error('password-confirm') <div class="invalid-feedback">{{$message}}</div>@enderror
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" id="confirm-password" class="feather feather-eye"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle></svg>
         </div>

         <div class="d-sm-flex justify-content-between my-3">
            <div class="field-wrapper">
               <button type="submit" class="btn btn-primary btn-sm" value="">Simpan</button>
            </div>
         </div>

         <div class="field-wrapper terms_condition">
            <div class="n-chk">
               <a href="{{route('profile.edit')}}" class="btn btn-dark" id="multiple-reset">Kembali</a>
            </div>
         </div>
      </div>
   </form>
</div>  
@endsection
@section('trigger')
   <script>
      // toggle change password (confirm)
      var togglePassword = document.getElementById("confirm-password");
         if (togglePassword) {
         togglePassword.addEventListener('click', function() {
            var x = document.getElementById("password-confirm");
            if (x.type === "password") {
               x.type = "text";
            } else {
               x.type = "password";
            }
         });
      }
      // toggle change password (old_password)
      function myToggle() {
         var x = document.getElementById("old_password");
         if (x.type === "password") {
            x.type = "text";
         } else {
            x.type = "password";
         }
      }

   </script>
@endsection