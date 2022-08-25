@extends('layouts.appadmin')

@section('page_title')
   {{"Ubah Tipe Kepribadian"}}
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
               <form id="general-info" class="section general-info">
                  <div class="info">
                     <h6 class="">Informasi Tambahan Tipe Kepribadian </h6>
                     <div class="row">
                        <div class="col-md-3">
                           <div class="form-group text-center">
                              <a href="{{route('ciritipe.index')}}" class="btn btn-info"><i data-feather="plus-circle"></i>&nbsp;Ciri-ciri</a>
                           </div>
                        </div>
                        <div class="col-md-2">
                           <div class="form-group text-center">
                              <a href="{{route('kelebihantipe.index')}}" class="btn btn-info"><i data-feather="plus-circle"></i>&nbsp;Kelebihan</a>
                           </div>
                        </div>
                        <div class="col-md-3">
                           <div class="form-group text-center">
                              <a href="{{route('kekurangantipe.index')}}" class="btn btn-info"><i data-feather="plus-circle"></i>&nbsp;Kekurangan</a>
                           </div>
                        </div>
                        <div class="col-md-2">
                           <div class="form-group text-center">
                              <a href="{{route('profesitipe.index')}}" class="btn btn-info"><i data-feather="plus-circle"></i>&nbsp;Profesi</a>
                           </div>
                        </div>
                        <div class="col-md-2">
                           {{-- <div class="form-group text-center">
                              <a href="{{route('partnertipe.index')}}" class="btn btn-info"><i data-feather="plus-circle"></i>&nbsp;Partner</a>
                           </div> --}}
                        </div>
                     </div>
                  </div>
               </form>
            </div>

            <div class="col-xl-12 col-lg-12 col-md-12 layout-spacing">

               @include('layouts.alert.alert')

               <form action="{{route('tipekep.update', $tipekep->id )}}" method="post" role="form" id="work-experience" class="section work-experience" enctype="multipart/form-data">
                  @method('PUT')
                  @csrf
                  <div class="info">
                     <h5 class="">{{$pageName}}</h5>
                     <div class="row">

                           <div class="col-md-11 mx-auto">
                              <div class="work-section">
                                 <div class="row">

                                       <div class="col-xl-2 col-md-4">
                                          <div class="upload mt-4 pr-md-4">
                                             <input id="image_tipe" type="file" class="dropify" @error('image_tipe') is-invalid @enderror name="image_tipe" data-default-file="{{ asset($tipekep->image) }}"/>
                                             @error('image_tipe') <div class="invalid-feedback">{{$message}}</div>@enderror
                                             <p class="mt-2"><i class="flaticon-cloud-upload mr-1"></i>Upload Foto, Max : 2MB</p>
                                          </div> 
                                       </div>

                                       <div class="col-xl-10 col-md-8 mt-md-0">
                                          <div class="form-group">
                                             <label for="namatipe">Tipe Kepribadian</label>
                                             <input type="text" class="form-control mb-4" id="namatipe" @error('namatipe') is-invalid @enderror" name="namatipe" value="{{old('namatipe',$tipekep->namatipe )}}">
                                             @error('namatipe') <div class="invalid-feedback">{{$message}}</div>@enderror
                                          </div>
                                          {{-- <div class="form-group">
                                             <label for="deskripsi">Deskripsi</label>
                                             <input aria-label="large" type="text" class="form-control mb-4" @error('deskripsi') is-invalid @enderror" name="deskripsi" value="{{old('deskripsi',$tipekep->deskripsi)}}" >
                                             @error('deskripsi') <div class="invalid-feedback">{{$message}}</div>@enderror
                                          </div> --}}
                                          <div class="form-group">
                                             <label for="warna">Warna</label>
                                             <input type="color" class="form-control mb-4" @error('warna') is-invalid @enderror" name="warna" value="{{old('warna',$tipekep->warna)}}" placeholder="&#40;Introvert Intuition Thinking Judging&#41;">
                                             @error('warna') <div class="invalid-feedback">{{$message}}</div>@enderror
                                          </div>
                                          {{-- <div class="form-group">
                                             <label for="julukan_tipe">Julukan Tipe</label>
                                             <input type="text" class="form-control mb-4" id="julukan_tipe" @error('julukan_tipe') is-invalid @enderror" name="julukan_tipe" value="{{old('julukan_tipe',$tipekep->julukan_tipe )}}">
                                             @error('julukan_tipe') <div class="invalid-feedback">{{$message}}</div>@enderror
                                          </div> --}}
                                       </div>

                                       <div class="col-md-12 mb-5 mt-3">
                                          <label for="deskripsi_tipe">Deskripsi Tipe</label>
                                          <textarea class="form-control" @error('deskripsi_tipe') is-invalid @enderror" name="deskripsi" placeholder="Description" rows="8">{{old('deskripsi',$tipekep->deskripsi )}}</textarea>
                                          @error('deskripsi_tipe') <div class="invalid-feedback">{{$message}}</div>@enderror
                                       </div>

                                       <!-- <div class="col-md-12 mb-5">
                                          <label for="arti_sukses">Arti Sukses</label>
                                          <textarea class="form-control" @error('arti_sukses') is-invalid @enderror" name="arti_sukses" placeholder="Description" rows="8">{{old('arti_sukses',$tipekep->arti_sukses )}}</textarea>
                                          @error('arti_sukses') <div class="invalid-feedback">{{$message}}</div>@enderror
                                       </div>

                                       <div class="col-md-12 mb-5">
                                          <label for="saran_pengembangan">Saran Pengembangan</label>
                                          <textarea class="form-control" @error('saran_pengembangan') is-invalid @enderror" name="saran_pengembangan" placeholder="Description" rows="8">{{old('saran_pengembangan',$tipekep->saran_pengembangan )}}</textarea>
                                          @error('saran_pengembangan') <div class="invalid-feedback">{{$message}}</div>@enderror
                                       </div>

                                       <div class="col-md-12">
                                          <label for="kebahagiaan_tipe">Kebahagiaan Tipe</label>
                                          <textarea class="form-control" @error('kebahagiaan_tipe') is-invalid @enderror" name="kebahagiaan_tipe" placeholder="Description" rows="8">{{old('kebahagiaan_tipe',$tipekep->kebahagiaan_tipe )}}</textarea>
                                          @error('kebahagiaan_tipe') <div class="invalid-feedback">{{$message}}</div>@enderror
                                       </div> -->
                                       
                                 </div> {{-- row --}}
                              </div> {{-- work-section --}}
                           </div> {{-- col-md --}}

                     </div> {{-- row --}}
                  </div> {{-- info --}}
                  <div class="account-settings-footer">
                     <div class="as-footer-container">
                        <a href="{{ route('tipekep.index') }}" class="btn btn-dark" >Kembali</a>
                        <button id="savesoal" type="submit" class="btn btn-primary">Simpan</button>
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
      $.post("{{ route('tipekep.store') }}", {
         namatipe          : $('input[name="namatipe"]').val(),
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