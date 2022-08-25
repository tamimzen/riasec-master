@extends('layouts.appuser')
@section('page_title')
   {{"RIASEC"}}
@endsection

@section('nav_header')
   @include('layouts.navbar.navuser')
@endsection

@section('content')

<div class="layout-px-spacing">

   <section id="landing">
      <div class="landingContent">
         <div class="landingText" data-aos="fade-right" data-aos-duration="2000">
            <h1>Pentingkah Mengetahui<br> <span> Tipe Kepribadian</span> Diri?</h1>
            <h3>Cari Tau Apa Tipe Kepribadianmu <br> Disini</h3>
            <div class="btnmulai">
               <a href="{{route('startTest')}}" class="btn btn-send">Mulai Tes</a>
            </div>
         </div>
         <div class="landingImage" data-aos="fade-down" data-aos-duration="2000">
            <img src="{{asset('assets/images/bg/bg5.png')}}" alt="landing-image">
         </div>
      </div> <!-- landing-content -->
   </section> {{-- Landing --}}

   <div class="faq container">
      <div class="faq-layouting layout-spacing">

         <div class="rules-wrapper" data-aos="zoom-in-up" data-aos-duration="1000">
            <div class="rules-content">

               <div class="rules-text">
                  <h3>Beberapa Aturan Dalam Mengikuti Tes :</h3>
                  <ul class="">
                     <li class="list-unstyled">
                           <div class="icon-svg">
                              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-check"><polyline points="20 6 9 17 4 12"></polyline></svg>
                           </div>
                           Tidak ada jawaban yang benar untuk semua pertanyaan ini.
                     </li>
                     <li class="list-unstyled">
                           <div class="icon-svg">
                              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-check"><polyline points="20 6 9 17 4 12"></polyline></svg>
                           </div>
                           Jawab pertanyaan dengan cepat, jangan terlalu menganalisisnya. Beberapa tampak terselubung
                     </li>
                     <li class="list-unstyled">
                           <div class="icon-svg">
                              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-check"><polyline points="20 6 9 17 4 12"></polyline></svg>
                           </div>
                           Jawab pertanyaan sebagai "apa adanya", bukan "dengan cara yang Anda inginkan"
                     </li>
                     <li class="list-unstyled">
                           <div class="icon-svg">
                              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-check"><polyline points="20 6 9 17 4 12"></polyline></svg>
                           </div>
                           Hasil penilaian Tes akan tampil setelah Anda menyelesaikan semua pertanyaan yang diberikan.
                     </li>
                  </ul>
                     <small class="text-right"><cite title="Source Title"></cite></small>
               </div>
            </div>
         </div> {{-- Rules-Wrapper --}}


         <div class="rules-wrapper" data-aos="zoom-in-up" data-aos-duration="700">
            <div class="rules-content">
               <div class="rules-image">
                  <img src="{{asset('assets/images/mbti/untung.png')}}" alt="rules">
               </div>
               <div class="rules-text">
                  <h3>Keuntungan mengikuti tes kepribadian RIASEC :</h3>
                  <p>Dapat mengetahui tipe diri kamu itu seperti apa. RIASEC atau Holland Codes adalah teori kepribadian yang dikemukakan oleh John L. Holland yang membagi 6 tipe kepribadian yaitu :</p>
                  <ul class="">
                     <li class="list-unstyled">
                         <div class="icon-svg">
                             <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-check"><polyline points="20 6 9 17 4 12"></polyline></svg>
                         </div>
                         Realistic
                     </li>
                     <li class="list-unstyled">
                         <div class="icon-svg">
                             <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-check"><polyline points="20 6 9 17 4 12"></polyline></svg>
                         </div>
                         Investigative
                     </li>
                     <li class="list-unstyled">
                         <div class="icon-svg">
                             <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-check"><polyline points="20 6 9 17 4 12"></polyline></svg>
                         </div>
                         Artistic
                     </li>
                     <li class="list-unstyled">
                         <div class="icon-svg">
                             <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-check"><polyline points="20 6 9 17 4 12"></polyline></svg>
                         </div>
                         Social
                     </li>
                     <li class="list-unstyled">
                         <div class="icon-svg">
                             <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-check"><polyline points="20 6 9 17 4 12"></polyline></svg>
                         </div>
                         Enterprising
                     </li>
                     <li class="list-unstyled">
                         <div class="icon-svg">
                             <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-check"><polyline points="20 6 9 17 4 12"></polyline></svg>
                         </div>
                         Conventional
                     </li>
                 </ul>
                  <p>Dimana dari 6 tipe kepribadian tersebut memiliki sisi positif dan negatif sendiri. Melalui tes kepribadian ini kamu dapat lebih baik dalam memahami orang lain.</p>
               </div>
            </div>
         </div> {{-- Rules-Wrapper --}}

         <div class="rules-wrapper" data-aos="zoom-in-up" data-aos-duration="700">
            <div class="rules-content">
               <div class="rules-text">
                  <h3>Mengenali Kelebihan dan Kelemahan diri sendiri :</h3>
                  <p>
                        Kamu bisa menemukan dimana titik lemah kamu terutama berkaitan dengan pekerjaan, bakat, dan minat. Tes kepribadian RIASEC membantu kamu menempatkan kelebihan dan kelemahan sesuai porsinya. Kelemahan paling dalam hanya bisa diketahui oleh diri sendiri dan terbantu dengan tes. Jadi selama menjalani pekerjaan bisa menghindari hal-hal yang dapat mengganggu hubungan antar rekan kerja dan kelancaran tugas. Dari tes kepribadian kamu dapat memimpin diri sendiri.
                  </p>
               </div>
               <div class="rules-image">
                  <img src="{{asset('assets/images/mbti/evaluasi.png')}}" alt="rules">
               </div>
            </div>
         </div> {{-- Rules-Wrapper --}}

         <div class="rules-wrapper" data-aos="zoom-in-up" data-aos-duration="700">
            <div class="rules-content">
               <div class="rules-image">
                  <img src="{{asset('assets/images/mbti/pekerjaan.png')}}" alt="rules">
               </div>
               <div class="rules-text">
                  <h3>Membantu menentukan pekerjaan yang cocok :</h3>
                  <p>
                        Selain dapat menolong kamu supaya lebih memahami diri sendiri, tes ini juga dapat menolong kamu menentukan pekerjaan, minat, serta karir seperti apa yang paling sesuai denganmu. Sehingga kamu dapat memahami lebih jauh diri sendiri serta menciptakan pekerjaan yang cocok dengan passion kalian.
                  </p>
               </div>
            </div>
         </div> {{-- Rules-Wrapper --}}

         <div class="rules-wrapper" data-aos="zoom-in-up" data-aos-duration="700">
            <div class="rules-content">
               <div class="rules-text">
                  <h3>Mengetahui Bakat dan Potensi paling Dominan :</h3>
                  <p>
                     Tes Kepribadian RIASEC sangat penting karena bisa mengklasifikasikan bakat dan potensi paling baik dari diri kamu. Kamu akan membutuhkannya pada saat melamar pekerjaan yang lebih profesional. Bakat dan potensi seseorang pada dasarnya bisa dibaca dari pola kerjanya setiap hari. Kamu harus tahu bahwa bekerja sesuai bakat bisa membuatmu merasa lebih tenang dan hasilnya bisa lebih maksimal.
                  </p>
               </div>
               <div class="rules-image">
                  <img src="{{asset('assets/images/mbti/bakat.png')}}" alt="rules">
               </div>
            </div>
         </div> {{-- Rules-Wrapper --}}

      </div> <!-- Faq-Layouting -->

   </div> {{--Faq Container  --}} 
   
</div> {{-- layout-px-spacing --}}

@endsection

@section('footer')
   @include('layouts.footer.foouser')
@endsection