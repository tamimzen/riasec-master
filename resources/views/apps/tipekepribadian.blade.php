@extends('layouts.appuser')
@section('page_title')
   {{"6 Tipe Kepribadian"}}
@endsection

@section('nav_header')
   @include('layouts.navbar.navuser')
@endsection

@section('content')
   <div class="layout-px-spacing">

      <section id="landing">
         <div class="landingContent2">
            <div class="landingText" data-aos="fade-right" data-aos-duration="2000">
               <h1>Mengenal {{ $tipes->count() }} <span> Tipe  Kepribadian</span> Manusia</h1>
               <h3>Beberapa Tipe Kepribadian Mungkin terlihat sama<br> Disini</h3>
            </div>
         </div> <!-- landing-content -->
      </section>

      <div class="faq container">
         <div class="faq-layouting layout-spacing">

            <div class="personality-section">
               <div class="infoHeader" data-aos="fade-up" data-aos-duration="1000">
                  <!-- <h2><span style="color:rgb(248, 164, 55)">Myers-Briggs Type Indicator</span></h2> -->
                  <h2><span style="color:rgb(248, 164, 55)">R I A S E C</span></h2>
                  <h5>{{ $tipes->count() }} Tipe Kepribadian</h5>
               </div>
               <div class="row">
                  <!-- {{-- Total 16, dibagi 4 warna. Awal dari 1. 1/4 => 0,25. Dengan fungsi ceil, 0,25 diconvert jadi 1. --}} -->
                  @foreach ($tipes as $key => $tipe)
                     <div class="col-lg-4 col-md-6 tipekep">
                        <div class="card" data-aos="fade-up" data-aos-duration="1000">
                           {{-- Change Image Later --}}
                           <img src="{{ asset($tipe->image) }}" class="card-img-top cardImg" onerror="this.src='{{asset('assets/images/300x300.jpg')}}'">
                           <div class="cardbg{{ ceil((1 + $key) / 3) }}">
                              <h2 class="cardTitle">{{ $tipe->namatipe }}</h2>
                           </div>
                           <div class="card-body">
                              <small class="text-right">Illustrations by <cite title="Source Title"><a href="https://blush.design/collections/40G09koP55fYh86yZDnX/stuck-at-home/character-standing/2WYYj_i51y7t1dWK?c=skin_0%7Eecafa3" style="font-size: 10px" target="_blank">Mariana Gonzalez Vega</a></cite></small>
                              <p class="card-text">
                                 {{ $tipe->deskripsi}}
                              </p>
                              <a href="{{ route('artikel', ['tipe' => $tipe->namatipe]) }}" class="btn btn-outline-dark btn-sm">
                                 Lebih lanjut <i class="fas fa-angle-double-right"></i>
                              </a>
                           </div>
                        </div>
                        {{-- Illustrations by Mariana Gonzalez Vega --}}
                        {{-- https://blush.design/collections/40G09koP55fYh86yZDnX/stuck-at-home/character-standing/2WYYj_i51y7t1dWK?c=skin_0%7Eecafa3 --}}
                     </div>
                  @endforeach
               </div>
            </div>

         </div> <!-- /-layouting -->

      </div> <!-- / Container --> 

   </div> <!-- layout-px-spacing -->
@endsection
@section('footer')
   @include('layouts.footer.foouser')
@endsection