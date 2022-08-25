@extends('layouts.appuser')
@section('page_title')
   {{"Tes Kepribadian RIASEC"}}
@endsection

@section('nav_header')
   @include('layouts.navbar.navuser')
@endsection

@section('content')
   <div class="layout-px-spacing">

      <section id="quiz">
         <div class="quiz-layouting">
            <div class="quiz-tab-section">
      
               <div class="row ">
                  
                  <div class="col-md-12 text-center">

                     <div class="title-section">
                        <h3>Tes Kepribadian RIASEC</h3>
                        <h5>Jumlah pernyataan pada tes terdiri dari {{ $tests['pernyataan']->count()}} soal</h5>
                     </div>
                     <!-- {{-- Progres --}} -->
                     <div class="progress">
                        <div class="progress-bar bg-gradient-warning" role="progressbar" style="width: 0%" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">0&percnt;</div>
                     </div>
                     <h4 id="timer" class="text-danger"></h4>
                     <!-- {{-- Soal --}} -->
                     @foreach ($tests['pernyataan'] as $key => $test ) 
                     <div class="data-soal" data-id="{{$key}}" data-soal="{{$test->id}}" style="display: none"> {{-- data index ada pada class data-soal --}}
                        <h1 class="soal">{{ $test->soal }}</h1> {{-- Soal --}}
                        <div class="row"> {{-- Pernyataan --}}
                           <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                              <div class="card">
                                 <label class="selected-label">
                                    <input class="selectJawaban" data-soalID="{{$test->id}}" type="radio" name="soal{{ $test->id }}" value="{{$test->kategori }}">
                                    <div class="selected-content">
                                       <h4 id="jwb1"  class="jawaban">{{ 'Ya' }}</h4>
                                    </div>
                                 </label>
                              </div>
                           </div>
                           <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                              <div class="card">
                                 <label class="selected-label">
                                    <input class="selectJawaban" data-soalID="{{$test->id}}" type="radio" name="soal{{ $test->id }}" value="-">
                                    <div class="selected-content">
                                       <h4 id="jwb2" class="jawaban">{{ 'Tidak' }}</h4>
                                    </div>
                                 </label>
                              </div>
                           </div>
                        </div> <!-- /row -->
                     </div> {{-- div kosong --}}
                     @endforeach


                  </div> 
               </div> <!-- /row --> 
            
            </div> <!-- /quiz-tab-section -->
         </div> <!-- /quiz-layouting -->
      </section> <!-- /quiz -->

   </div> <!-- layout-px-spacing -->
@endsection

@section('trigger')

<script>

   let selectedSoal = 0; // soal pertama
   const max = {{ $tests['pernyataan']->count() }}// Menunjukkan jumlah maksimum soal yang dapat dijawab

   let waktu = {{ $waktu->waktu}};
   // Get today's date and time
   
   var timer = setInterval(function(){
      
      // Find the distance between now and the count down date
      var distance = waktu--;
      // var seconds = Math.floor((distance % (1000 * 60)) / 1000);
      // Display the result in the element with id="demo"
      document.getElementById("timer").innerHTML = distance + " s";
    // If the count down is finished, write some text
      if (distance < 1) {
         // clearInterval(timer);
         waktu = {{ $waktu->waktu}};
         // jawabans[index].value++
         ++selectedSoal // Melanjutkan ke soal berikutnya
         // selectedSoal++ // Melanjutkan ke soal berikutnya
         // document.getElementById("demo").innerHTML = "EXPIRED";
         axios.post("{{route('jawabTest')}}",{
            jawaban : '-',
            nim : {{$tests['nim']}},
            soal_id :  selectedSoal
         });

         

         // menampilkan progres bar pada test
         let width = (selectedSoal/max*100)
         $('.progress-bar').css('width', width+'%').html(Math.round(width)+'%')

         // Keluarkan soal dari layar pengguna
         $('.data-soal').fadeOut()

         /** Apabila panjang progress bar tidak mencapai 100 persen, maka tampilkan soal berikutnya.
         Jika sudah selesai, maka kirimkan ke server */
         if(width < 100){
            setTimeout(() => {
               $(`.data-soal[data-id="${selectedSoal}"]`).fadeIn()
            }, 500)
         } else {

            // Redirect ke halaman hasil
            window.location.href = "{{ route('finishTest', ['id' => $tests['nim']]) }}"
            
            

         }
      }

   }, 1000);


   // setInterval(function(){
   //    axios.post("{{route('jawabTest')}}",{
   //          jawaban : '-',
   //          nim : {{$tests['nim']}},
   //          soal_id :  $(this).attr('data-soalID')
   //       }),// this will run after every 5 seconds
   // }, 5000);
   
   // Tampilkan soal saat ini
   $(`.data-soal[data-id="${selectedSoal}"]`).show()
   
   $('input.selectJawaban').click(function() {
      
      
      axios.post("{{route('jawabTest')}}",{
            jawaban :      $(this).val(),
            nim : {{$tests['nim']}},
            soal_id :  $(this).attr('data-soalID')
         })
         
      waktu = {{ $waktu->waktu}};
      // // Simpan jawaban dalam dimensi
      // jawabans[index].value++
      ++selectedSoal // Melanjutkan ke soal berikutnya
      // selectedSoal++ // Melanjutkan ke soal berikutnya

      // menampilkan progres bar pada test
      let width = (selectedSoal/max*100)
      $('.progress-bar').css('width', width+'%').html(Math.round(width)+'%')

      // Keluarkan soal dari layar pengguna
      $('.data-soal').fadeOut()

      /** Apabila panjang progress bar tidak mencapai 100 persen, maka tampilkan soal berikutnya.
      Jika sudah selesai, maka kirimkan ke server */
      if(width < 100){
         setTimeout(() => {
            $(`.data-soal[data-id="${selectedSoal}"]`).fadeIn()
         }, 500)
      } else {

         // Redirect ke halaman hasil
         window.location.href = "{{ route('finishTest', ['id' => $tests['nim']]) }}"
         
         

      }
      
   })
</script>
@endsection