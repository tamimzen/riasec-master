@extends('auth.auth')
@section('page_title')
   {{"Recovery"}}
@endsection
@section('content')
   
   <div class="form-content">
      @include('layouts.alert.alert')
      <div class="maintanence-hero-img">
         <a href="{{url('/')}}">
            <img alt="Politeknik Negeri Banyuwangi" data-retina="{{asset('assets/images/logo/icon_poliwangi.png')}}" data-src="{{asset('assets/images/logo/icon_poliwangi.png')}}" class="m-0" src="{{asset('assets/images/logo/icon_poliwangi.png')}}" >
         </a>
      </div>
      <h1 class="">Password Recovery</h1>
      <p class="signup-link recovery">Masukkan email Anda dan instruksi akan dikirimkan kepada Anda!</p>
      <form action="{{ route('reset.password.post') }}" method="POST" class="text-left">
         @csrf
         <input type="hidden" name="token" value="{{ $token }}">
         <div class="form">

            <div id="email-field" class="field-wrapper input">
               <div class="d-flex justify-content-between">
                     <label for="email">EMAIL</label>
               </div>
               <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-at-sign"><circle cx="12" cy="12" r="4"></circle><path d="M16 8v5a3 3 0 0 0 6 0v-1a10 10 0 1 0-3.92 7.94"></path></svg>
               <input type="email" class="form-control  @error('email') is-invalid @enderror" name="email" value="{{old('email')}}" placeholder="Email" required autofocus>
                  @error('email') <div class="invalid-feedback">{{$message}}</div>@enderror
            </div>

            <div id="password-field" class="field-wrapper input">
               <div class="d-flex justify-content-between">
                     <label for="password">PASSWORD</label>
               </div>
               <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-lock"><rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect><path d="M7 11V7a5 5 0 0 1 10 0v4"></path></svg>
               <input id="password" name="password" type="password" class="form-control" placeholder="kata sandi" required autofocus>
               <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" id="toggle-password" class="feather feather-eye"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle></svg>
               @if ($errors->has('password'))
                  <span class="text-danger">{{ $errors->first('password') }}</span>
               @endif
            </div>

            <div id="confirm" class="field-wrapper input mb-2">
               <div class="d-flex justify-content-between">
                     <label for="password">CONFIRM PASSWORD</label>
               </div>
               <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-lock"><rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect><path d="M7 11V7a5 5 0 0 1 10 0v4"></path></svg>
               <input id="password-confirm" name="password_confirmation" type="password" class="form-control" placeholder="confirm password">
               <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" onclick="myToggle()" id="toggle-confirm" class="feather feather-eye"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle></svg>
               @if ($errors->has('password_confirmation'))
                  <span class="text-danger">{{ $errors->first('password_confirmation') }}</span>
               @endif
            </div>

            <div class="d-sm-flex justify-content-between">

               <div class="field-wrapper">
                     <button type="submit" class="btn btn-primary" value="">Reset</button>
               </div>
            </div>

         </div>
      </form>
   </div>   
@endsection
@section('trigger')
   <script>
      // toggle change password (old_password)
      function myToggle() {
         var x = document.getElementById("password-confirm");
         if (x.type === "password") {
            x.type = "text";
         } else {
            x.type = "password";
         }
      }
   </script>
@endsection