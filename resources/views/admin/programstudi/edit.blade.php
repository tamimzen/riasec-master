@extends('layouts.appadmin')

@section('page_title')
   {{"Edit Program Studi"}}
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
               <form method="POST" action="{{ route('programstudi.update', $programstudi->id ) }}" class="section contact">
                  @method('PUT')
                  @csrf

                  {{-- Hidden Colors --}}
                  <!-- <input type="hidden" name="backgroundColor" value="{{ old('backgroundColor', $programstudi->backgroundColor) }}"> -->
                  <!-- <input type="hidden" name="borderColor" value="{{old('borderColor', $programstudi->borderColor)}}"> -->
                  <!-- <input type="hidden" name="pointBorderColor" value="{{old('pointBorderColor', $programstudi->pointBorderColor)}}"> -->

                  <div class="info">
                     <h5 class="">{{$pageName}}</h5>
                     <div class="row">
                        <div class="col-md-11 mx-auto">
                           <div class="row">
                              <div class="col-md-12 mb-4">
                                    <div class="form-group">
                                       <label for="program_studi">Nama Program Studi</label>
                                       <input type="text" class="form-control @error('program_studi') is-invalid @enderror" name="program_studi" value="{{old('program_studi', $programstudi->program_studi )}}">
                                       @error('program_studi') <div class="invalid-feedback">{{$message}}</div>@enderror
                                    </div>
                              </div>
                              <div class="col-md-12 mb-4">
                                    <div class="form-group">
                                       <label for="backgroundColor">BackgroundColor <span>&#40; Warna background untuk Recap Chart &#41;</span></label>
                                       <input type="color" name="backgroundColor" value="{{ old('backgroundColor', $programstudi->backgroundColor) }}" class="form-control @error('backgroundColor') is-invalid @enderror" id="bgInput" for="backgroundColor" placeholder="rgba(205, 161, 66, 0.3)" opacity="0.5">
                                       @error('backgroundColor') <div class="invalid-feedback">{{$message}}</div>@enderror
                                    </div>
                              </div>
                              <div class="col-md-12 mb-4">
                                    <div class="form-group">
                                       <label for="borderColor">BorderColor <span>&#40; Warna garis untuk Recap Chart &#41;</span></label>
                                       <input type="color" name="borderColor" value="{{old('borderColor', $programstudi->borderColor)}}" class="form-control @error('borderColor') is-invalid @enderror" id="borderInput" for="borderColor" placeholder="rgba(102, 62, 5, 1)" opacity="1">
                                       @error('borderColor') <div class="invalid-feedback">{{$message}}</div>@enderror
                                    </div>
                              </div>
                              <div class="col-md-12 mb-5">
                                    <div class="form-group">
                                       <label for="pointBorderColor">PointBorderColor <span>&#40; Warna titik pembatas untuk Recap Chart &#41;</span></label>
                                       <input type="color" name="pointBorderColor" value="{{old('pointBorderColor', $programstudi->pointBorderColor)}}" class="form-control @error('pointBorderColor') is-invalid @enderror" id="pointInput" for="pointBorderColor" value="{{old('pointBorderColor', $programstudi->pointBorderColor)}}" placeholder="rgba(235, 141, 7, 1)" opacity="1">
                                       @error('pointBorderColor') <div class="invalid-feedback">{{$message}}</div>@enderror
                                    </div>
                              </div>
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

   convert = c => {
      let hex = parseInt(c).toString(16);
      return hex.length == 1 ? "0" + hex : hex;      
   }

   rgbToHex = color => {
      let matches = /\(([^)]+)\)/.exec(color),
      splits = matches[1].split(',');

      return `#${convert(splits[0])}${convert(splits[1])}${convert(splits[2])}`

   }
   
   // Setting Pre Input
   let colors = {
      bg: rgbToHex($('input[name="backgroundColor"]').val()),
      border: rgbToHex($('input[name="borderColor"]').val()),
      point: rgbToHex($('input[name="pointBorderColor"]').val())
   }

   console.log(colors)
   
   $('#bgInput').val(colors.bg).trigger('change')
   $('#borderInput').val(colors.border).trigger('change')
   $('#pointInput').val(colors.point).trigger('change')

   $('input[type="color"]').change(function() {
      console.log($(this).val())
      let rgba = hexToRgbA($(this).val(), $(this).attr('opacity'))
      $(`input[name="${$(this).attr('for')}"]`).val(rgba)
      console.log(rgba)
   })
</script>
@endsection