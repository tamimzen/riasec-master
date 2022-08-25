@extends('layouts.appadmin')

@section('page_title')
   {{"Tambah Program Studi"}}
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
               <form method="POST" action="{{ route('programstudi.store') }}" class="section contact">
                  {{-- Hidden Colors --}}
                  <input type="hidden" name="backgroundColor" value="rgba(0,0,0,0.5)">
                  <input type="hidden" name="borderColor" value="rgba(0,0,0,1)">
                  <input type="hidden" name="pointBorderColor" value="rgba(0,0,0,1)">
                  @csrf

                  <div class="info">
                     <h5 class="">{{$pageName}}</h5>
                     <div class="row">
                        <div class="col-md-11 mx-auto">
                           <div class="row">
                              <div class="col-md-12 mb-4">
                                    <div class="form-group">
                                       <label for="program_studi">Nama Program Studi</label>
                                       <input type="text" class="form-control @error('program_studi') is-invalid @enderror" name="program_studi" value="{{old('program_studi')}}">
                                       @error('program_studi') <div class="invalid-feedback">{{$message}}</div>@enderror
                                    </div>
                              </div>
                              {{-- <div class="col-md-12 mb-4">
                                    <div class="form-group">
                                       <label for="backgroundColor">BackgroundColor <span>&#40; Warna background untuk Rekap Chart &#41;</span></label>
                                       <input type="color" class="form-control @error('backgroundColor') is-invalid @enderror" for="backgroundColor" value="{{old('backgroundColor')}}" opacity="0.5" placeholder="rgba(205, 161, 66, 0.3)">
                                       @error('backgroundColor') <div class="invalid-feedback">{{$message}}</div>@enderror
                                    </div>
                              </div> --}}
                              {{-- <div class="col-md-12 mb-4">
                                    <div class="form-group">
                                       <label for="borderColor">BorderColor <span>&#40; Warna garis untuk Rekap Chart &#41;</span></label>
                                       <input type="color" class="form-control @error('borderColor') is-invalid @enderror" for="borderColor" value="{{old('borderColor')}}" opacity="1" placeholder="rgba(102, 62, 5, 1)">
                                       @error('borderColor') <div class="invalid-feedback">{{$message}}</div>@enderror
                                    </div>
                              </div> --}}
                              {{-- <div class="col-md-12 mb-5">
                                    <div class="form-group">
                                       <label for="pointBorderColor">PointBorderColor <span>&#40; Warna titik pembatas untuk Rekap Chart &#41;</span></label>
                                       <input type="color" class="form-control @error('pointBorderColor') is-invalid @enderror" for="pointBorderColor" value="{{old('pointBorderColor')}}" opacity="1" placeholder="rgba(235, 141, 7, 1)">
                                       @error('pointBorderColor') <div class="invalid-feedback">{{$message}}</div>@enderror
                                    </div>
                              </div> --}}
                           </div> {{-- row --}}
                        </div>
                     </div> {{-- row --}}
                  </div> {{-- info --}}
                  <div class="account-settings-footer">
                     <div class="as-footer-container">
                        <a href="{{ route('programstudi.index') }}" class="btn btn-dark" >Kembali</a>
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
   <script>
      hexToRgbA = (hex, opacity) => {
         let result = /^#?([a-f\d]{2})([a-f\d]{2})([a-f\d]{2})$/i.exec(hex);
         return result ? `rgba(${parseInt(result[1], 16)}, ${parseInt(result[2], 16)}, ${parseInt(result[3], 16)}, ${opacity ?? 1})` : null;
      }

      $('input[type="color"]').change(function() {
         console.log($(this).val())
         let rgba = hexToRgbA($(this).val(), $(this).attr('opacity'))
         $(`input[name="${$(this).attr('for')}"]`).val(rgba)
         console.log(rgba)
      })
   </script>
@endsection