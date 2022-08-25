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
      <h1 class="">Reset Password</h1>
      <p class="signup-link recovery">Masukkan email Anda dan instruksi akan dikirimkan kepada Anda!</p>
      <form action="{{ route('forget.password.post') }}" method="POST" class="text-left" >
         @csrf
         <div class="form">
            <div id="email-field" class="field-wrapper input">
               <div class="d-flex justify-content-between">
                     <label for="email">EMAIL</label>
               </div>
               <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-at-sign"><circle cx="12" cy="12" r="4"></circle><path d="M16 8v5a3 3 0 0 0 6 0v-1a10 10 0 1 0-3.92 7.94"></path></svg>
               <input type="email" class="form-control  @error('email') is-invalid @enderror" name="email" value="{{old('email')}}" placeholder="Email">
                  @error('email') <div class="invalid-feedback">{{$message}}</div>@enderror
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