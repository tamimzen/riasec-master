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

               <form method="POST" action="{{ route('partnertipe.store') }}" class="section contact">
                  @csrf

                  <div class="info">
                     <h5 class="">{{$pageName}}</h5>
                     <div class="row">
                        <div class="col-md-11 mx-auto">
                           <div class="row">
                              <div class="col-md-12 mb-4">
                                    <div class="form-group">
                                       <label for="namatipe">Nama Tipe Kepribadian</label>
                                       <select class="form-control" name="tipekep_id">
                                          <option selected disabled>Masukan Nama TipeKepribadian</option>
                                          @foreach ($tipekep as $tipe)
                                             <option value="{{$tipe->id}}">
                                                {{ $tipe->namatipe }}
                                             </option>
                                          @endforeach
                                       </select>
                                    </div>
                              </div>
                              <div class="col-md-12 mb-4">
                                    <div class="form-group">
                                       <label for="partner_tipe">Partner Tipe</label>
                                       <select class="form-control" name="partner_tipe[]" multiple>
                                          @foreach ($tipekep as $tipe)
                                             <option value="{{$tipe->id}}">
                                                {{ $tipe->namatipe }}
                                             </option>
                                          @endforeach
                                       </select>
                                    </div>
                              </div>
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
   // tipe kepribadian
   $('select[name="tipekep_id"]').select2({})
   // partner tipe
   $('select[name="partner_tipe[]"]').select2({})
</script>
@endsection