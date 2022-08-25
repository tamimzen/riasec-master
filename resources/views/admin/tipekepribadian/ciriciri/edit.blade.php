@extends('layouts.appadmin')

@section('page_title')
   {{"Edit Ciri-ciri Tipe Kepribadian"}}
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

               <form method="POST" action="{{ route('ciritipe.update', $ciritipe->id ) }}" class="section contact" role="form">
                  @method('PUT')
                  @csrf

                  <div class="info">
                     <h5 class="">{{$pageName}}</h5>
                     <div class="row">
                        <div class="col-md-11 mx-auto">
                           <div class="row">
                              <div class="col-md-12 mb-4">
                                    <div class="form-group">
                                       <label for="tipekep_id">Nama Tipe Kepribadian</label>
                                       <select class="form-control" name="tipekep_id">

                                          @foreach ($tipekep as $tipe)
                                             <option value="{{$tipe->id}}" {{ $ciritipe->tipekep_id == $tipe->id ? 'selected' : '' }}>
                                                {{ $tipe->namatipe }}
                                             </option>
                                          @endforeach
                                       </select>
                                    </div>
                              </div>
                              <div class="col-md-12 mb-4">
                                    <div class="form-group">
                                       <label for="ciri_kepribadian">Ciri Kepribadian</label>
                                       <input type="teks" class="form-control @error('ciri_kepribadian') is-invalid @enderror" name="ciri_kepribadian" value="{{old('ciri_kepribadian', $ciritipe->ciri_kepribadian)}}" placeholder="rgba(205, 161, 66, 0.3)">
                                       @error('ciri_kepribadian') <div class="invalid-feedback">{{$message}}</div>@enderror
                                    </div>
                              </div>
                           </div> {{-- row --}}
                        </div>
                     </div> {{-- row --}}
                  </div> {{-- info --}}
                  <div class="account-settings-footer">
                     <div class="as-footer-container">
                        <a href="{{ route('ciritipe.index') }}" class="btn btn-dark" >Kembali</a>
                        <button id="multiple-messages" type="submit" class="btn btn-primary">Simpan</button>
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
<script>
   $('select[name="tipekep_id"]').select2({
      placeholder: "Pilih Tipe Kepribadian"
   })
</script>
@endsection