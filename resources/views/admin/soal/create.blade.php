@extends('layouts.appadmin')

@section('page_title')
   {{"Tambah Soal"}}
@endsection

@section('nav_header')
   @include('layouts.navbar.navadmin')
@endsection

@section('content')

<div class="account-settings-container layout-top-spacing">

   <div class="account-content">
      <div class="scrollspy-example" data-spy="scroll" data-target="#account-settings-scroll" data-offset="-100">
         
         <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 layout-spacing">
               @include('layouts.alert.alert')
               <form class="section contact" method="POST" action="{{ route('soal.tambah') }}">
                  @csrf

                  <div class="info">
                     <h5 class="">{{$pageName}}</h5>
                     <div class="row">
                        <div class="col-md-11 mx-auto">
                           <div class="row">
                              <div class="col-md-12">
                                    <div class="form-group">
                                       <label for="tipe">Pilih Tipe Kepribadian</label>
                                       <select id="tipe" name="tipe" class="form-control">
                                             @foreach($tipe_kepribadian as $key)
                                             <option value="{{ $key->id }}">
                                                {{ $key->namatipe }}
                                             </option>
                                             @endforeach
                                       </select>
                                    </div>
                              </div>
                              <div class="col-md-12">
                                    <div class="form-group">
                                       <label for="soal">Soal</label>
                                       <input type="text" style="height: 65px" class="form-control @error('soal') is-invalid @enderror" name="soal">
                                       @error('soal') <div class="invalid-feedback">{{$message}}</div>@enderror
                                    </div>
                              </div>

                              
                              
                              
                           </div> {{-- row --}}
                        </div>
                     </div> {{-- row --}}
                  </div> {{-- info --}}
                  <div class="account-settings-footer">
                     <div class="as-footer-container">
                        <a href="{{ route('soal.index') }}" class="btn btn-dark" >Kembali</a>
                        <button id="savesoal" type="submit" class="btn btn-primary success">Simpan</button>
                     </div>
                  </div>  {{-- account-settings-footer --}}

               </form>
            </div>
         </div> {{-- row --}}
      </div> {{-- scrollspy-example--}}
   </div> {{-- account-content --}}
</div> {{-- account-settings-container --}}

@endsection

@section('trigger')
<script src="{{asset('plugins/select2/select2.min.js')}}"></script>
@endsection