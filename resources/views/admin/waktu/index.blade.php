@extends('layouts.appadmin')

@section('page_title')
   {{"Ubah Waktu Timer"}}
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

               <form action="{{route('waktu.update', $waktu->id )}}" method="post" role="form" id="work-experience" class="section work-experience" enctype="multipart/form-data">
                  @method('PUT')
                  @csrf
                  <div class="info">
                     <h5 class="">{{$pageName}}</h5>
                     <div class="row">

                           <div class="col-md-11 mx-auto">
                              <div class="work-section">
                                 <div class="row">


                                       <div class="col-xl-10 col-md-8 mt-md-0">
                                          <div class="form-group">
                                             <label for="waktu">Timer</label>
                                             <input type="number" class="form-control mb-4" id="waktu" @error('waktu') is-invalid @enderror" name="waktu" value="{{old('waktu',$waktu->waktu )}}">
                                             @error('waktu') <div class="invalid-feedback">{{$message}}</div>@enderror
                                          </div>
                                       
                                       </div>

                                     
                                       
                                 </div> {{-- row --}}
                              </div> {{-- work-section --}}
                           </div> {{-- col-md --}}

                     </div> {{-- row --}}
                  </div> {{-- info --}}
                  <div class="account-settings-footer">
                     <div class="as-footer-container">
                        <a href="{{ route('waktu.index') }}" class="btn btn-dark" >Kembali</a>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                     </div>
                  </div>  {{-- account-settings-footer --}}
               </form> {{-- form --}}
            </div> {{-- col --}}

         </div> {{-- row --}}
      </div> {{-- scrollspy-example--}}
   </div> {{-- account-content --}}

</div> {{-- account-settings-container --}}

@endsection

@section('trigger')
   {{-- <script>
   $('#savetipe').click(() => {
      $.post("{{ route('waktu.store') }}", {
         waktu          : $('input[name="waktu"]').val(),
         keterangan_tipe   : $('input[name="keterangan_tipe"]').val(),
         julukan_tipe      : $('input[name="julukan_tipe"]').val(),
         deskripsi_tipe    : $('input[name="deskripsi_tipe"]').val(),
         ciri_tipe         : $('input[name="ciri_tipe"]').val(),
         kelebihan_tipe    : $('input[name="kelebihan_tipe"]').val(),
         kekurangan_tipe   : $('input[name="kekurangan_tipe"]').val(),
         saran_profesi     : $('input[name="saran_profesi"]').val(),
         partner_alami     : $('input[name="partner_alami"]').val(),
         arti_sukses       : $('input[name="arti_sukses"]').val(),
         saran_pengembangan: $('input[name="saran_pengembangan"]').val(),
         kebahagiaan_tipe  : $('input[name="kebahagiaan_tipe"]').val(),
         image_tipe        : $('input[name="image_tipe"]').val(),
      },
         function (data, textStatus, jqXHR) {
               console.log("success")
         },
         "json"
      );
   })
   </script> --}}
@endsection