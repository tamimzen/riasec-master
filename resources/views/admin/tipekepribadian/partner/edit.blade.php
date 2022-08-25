@extends('layouts.appadmin')

@section('page_title')
   {{"Partner Alami Tipe Kepribadian"}}
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

               {{-- route('partnertipe.update', [ 'partnertipe' => $partnertipe->tipekep_id]) --}}
               {{-- @dd($partnertipe) --}}
               <form method="POST" action="{{ route('partnertipe.update', ['partnertipe' => $partnertipe->id]) }}" class="section contact">
                  @method('PUT')
                  @csrf

                  <div class="info">
                     <h5 class="">{{ $pageName }}</h5>
                     <div class="row">
                        <div class="col-md-11 mx-auto">
                           <div class="row">

                              {{-- Tipe Kepribadian - FIXED --}}
                              <div class="col-md-12 mb-4">
                                 <div class="form-group">
                                    <label for="namatipe">Nama Tipe Kepribadian</label>
                                    <input type="text" class="form-control" value="{{ $partnertipe->namatipe }}" disabled>
                                 </div>
                              </div>

                              {{-- Edit Partner --}}
                              <div class="col-md-12 mb-4">
                                 <div class="form-group">
                                    <label for="partner_tipe">Partner Tipe</label>
                                    <select class="form-control" name="partner_tipe[]" required multiple>
                                       {{-- <option value="{{ $partnertipe->partner_tipe }}" selected>{{ $tipe_select->namatipe }}</option> --}}
                                       @foreach ($tipekep as $tipe)
                                          <option value="{{$tipe->id}}" {{-- $tipe_selected->contains($tipe->id) ? 'selected' : '' --}}>
                                             {{ $tipe->namatipe }}
                                          </option>
                                       @endforeach
                                    </select>
                                    @error('tipekep_id', 'tipekep_id.*')
                                    <div class="alert.alert-danger">
                                       {{ $message }}
                                    </div>
                                    @enderror
                                 </div>
                              </div>
                              {{-- End Edit Partner --}}

                           </div> {{-- row --}}
                        </div>
                     </div> {{-- row --}}
                  </div> {{-- info --}}
                  <div class="account-settings-footer">
                     <div class="as-footer-container">
                        <a href="{{ route('partnertipe.index') }}" class="btn btn-dark" >Kembali</a>
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
   $(document).ready(function(){
      $('select[name="partner_tipe[]"]').select2().val({{ $tipe_selected }}).trigger('change')
   })
</script>
@endsection