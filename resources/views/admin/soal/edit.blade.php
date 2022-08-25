@extends('layouts.appadmin')

@section('page_title')
   {{"Edit Soal"}}
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
               <form action="{{route('soal.update', $daftarsoal)}}" method="POST" class="section contact">
                  @method('PUT')
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
                                          @foreach($tipe_kep as $key)
                                          <option value="{{ $key->id }}" {{ $key->id == $daftarsoal->kategori ? 'selected' : ''}}>
                                             {{ $key->namatipe }}
                                          </option>
                                          @endforeach
                                       </select>
                                    </div>
                              </div>
                              <div class="col-md-12">
                                    <div class="form-group">
                                       <label for="soal">Soal</label>
                                       <input type="text" style="height: 65px" class="form-control @error('soal') is-invalid @enderror" name="soal" value="{{old('soal',$daftarsoal->soal)}}">
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
                        <button id="savesoal" type="submit" class="btn btn-primary ">Simpan</button>
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


    // membaca data dimensi dari pernyataan yang dipilih 
      $('select[name="dimensi"]').change(function() {
   
         let selected = $(this).find(':selected')
   
         $('#dimensiA').html(selected.data('dimena'))
         $('#dimensiB').html(selected.data('dimenb'))
      }).select2().trigger('change') //memulai select dari inputan

   // digunakan untuk mengirim data pada controller
      $('#editsoal').click(() => {
         $.post("{{ route('soal.update', ['id' => $id]) }}", {
            dimensi: $('select[name="dimensi"]').val(),
            a     : $('input[name="a"]').val(),
            b     : $('input[name="b"]').val(),
            soal  : $('input[name="soal"]').val()
         },
            function (data, textStatus, jqXHR) {
                  console.log("success")
            },
            "json"
         );
      })
</script>
@endsection