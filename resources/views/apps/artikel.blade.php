@extends('layouts.appuser')

@section('page_title')
   {{ $readmore->namatipe }}
@endsection

@section('nav_header')
   @include('layouts.navbar.navuser')
@endsection

@section('content')
   <div class="container">
      <div class="container">
         <!-- sidenav -->
         <div id="navSection" data-spy="affix" class="nav sidenav">
            <div class="sidenav-content">
               <!-- <a href="#artikelTop" class=" nav-link">Tipe Kepribadian</a> -->
               <a href="#artikelTipe" class="active nav-link">Tentang</a>
               <a href="#artikelCiriTipe" class="nav-link">Ciri Kepribadian</a>
               <a href="#artikelKelebihan" class="nav-link">Kelebihan Tipe</a>
               <a href="#artikelKekurangan" class="nav-link">Kekurangan Tipe</a>
               {{-- <a href="#artikelPartner" class="nav-link">Partner Tipe</a> --}}
               <a href="#artikelPekerjaan" class="nav-link">Saran Profesi</a>
               {{-- <a href="#artikelLain1" class="nav-link">Arti Kesuksesan</a>
               <a href="#artikelSaran" class="nav-link">Saran Pengembangan</a>
               <a href="#artikelLain2" class="nav-link">Hidup Bahagia Pada Tipe</a> --}}
            </div>
         </div> <!-- sidenav -->

         <!-- content -->
         <div class="row">

            <section id="artikelTop" class="col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
               <div class="landingContent ">
                  <div class="landingImage">
                     <img src="{{ asset($readmore->image) }}" onerror="this.src='{{asset('assets/images/300x300.jpg')}}'"><br>
                     {{-- <small class="text-right" style="font-size: 8px">Illustrations by <cite title="Source Title"><a href="https://blush.design/collections/40G09koP55fYh86yZDnX/stuck-at-home/character-standing/2WYYj_i51y7t1dWK?c=skin_0%7Eecafa3" target="_blank">Mariana Gonzalez Vega</a></cite></small> --}}
                     {{-- Illustrations by Mariana Gonzalez Vega --}}
                     {{-- https://blush.design/collections/40G09koP55fYh86yZDnX/stuck-at-home/character-standing/2WYYj_i51y7t1dWK?c=skin_0%7Eecafa3 --}}
                  </div>
                  <div class="landingText">
                     <h1>{{ $readmore->namatipe }}</h1>
                     {{-- <h3>&#40; {{ $readmore->bidang }} &#41;</h3> --}}
                     <!-- <h2>{{ $readmore->julukan_tipe }}</h2> -->
                  </div>
               </div> <!-- landing-content -->
            </section>

            <section id="artikelTipe" class="col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
               <div class="artikel-tipe" data-aos="zoom-in-up" data-aos-duration="1000">
                     <div class="row">
                        <div class="col-md-12">
                           <h3>Tipe Kepribadian&nbsp;<span>{{ $readmore->namatipe }}</span></h3>
                           <div class="row">
                                 <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                                    <h6>{{ $readmore->deskripsi }}</h6>
                                 </div>
                           </div>
                        </div>
                     </div>
               </div>
            </section>

            <section id="artikelCiriTipe" class="col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
               <div class="artikel-tipe" data-aos="zoom-in-up" data-aos-duration="800">
                     <div class="row">
                        <div class="col-md-12 col-12">
                           <h3>Ciri Kepribadian&nbsp;<span>{{ $readmore->namatipe }}</span></h3>
                           <div class="row">
                                 <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                                    <ul class="">
                                       @foreach($ciris as $ciri)
                                       <li class="list-unstyled">
                                          <div class="icon-svg">
                                             <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-check"><polyline points="20 6 9 17 4 12"></polyline></svg>
                                          </div>
                                          {{ $ciri->ciri_kepribadian }}
                                       </li>
                                       @endforeach
                                    </ul>
                                 </div>
                           </div>
                        </div>
                     </div>
               </div>
            </section>

            <section id="artikelKelebihan" class="col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
               <div class="artikel-tipe" data-aos="zoom-in-up" data-aos-duration="800">
                  <div class="row">
                     <div class="col-md-12 col-12">
                        <h3>Kelebihan&nbsp;<span>{{ $readmore->namatipe }}</span>&nbsp;:</h3>
                        <div class="row">
                           <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                              <ul>
                                 @foreach ($kelebihans as $kelebihan)    
                                 <li class="list-unstyled">
                                    <div class="icon-svg">
                                       <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-check"><polyline points="20 6 9 17 4 12"></polyline></svg>
                                    </div>
                                    {{ $kelebihan->kelebihan_tipe }}
                                 </li>
                                 @endforeach
                              </ul>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </section>

            <section id="artikelKekurangan" class="col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
               <div class="artikel-tipe" data-aos="zoom-in-up" data-aos-duration="800">
                     <div class="row">
                        <div class="col-md-12 col-12">
                           <h3>Kekurangan&nbsp;<span>{{ $readmore->namatipe }}</span>&nbsp;:</h3>
                           <div class="row">
                                 <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                                    <ul class="">
                                       @foreach ($kekurangans as $kekurangan)    
                                       <li class="list-unstyled" >
                                          <div class="icon-svg">
                                             <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-check"><polyline points="20 6 9 17 4 12"></polyline></svg>
                                          </div>
                                          {{ $kekurangan->kekurangan_tipe }}
                                       </li>
                                       @endforeach
                                    </ul>
                                 </div>
                           </div>
                        </div>
                     </div>
               </div>
            </section>

            {{-- <section id="artikelPartner" class="col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
               <div class="artikel-tipe partner" data-aos="fade-right" data-aos-duration="1200">
                     <div class="row">
                        <div class="col-md-12">
                           <h3>Partner Alami&nbsp;:</h3>
                           <div class="row">
                              <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                                 <h1>
                                    @foreach($partners as $key => $partner)
                                    <a href="{{ route('artikel', ['tipe' => $partner->partner->slug ]) }}">
                                       {{ $partner->partner->namatipe }}
                                    </a>
                                    @if($key == 0) &amp; @endif
                                    @endforeach
                                 </h1>
                              </div>
                           </div>
                        </div>
                     </div>
               </div>
            </section> --}}

            <section id="artikelPekerjaan" class="col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
               <div class="artikel-tipe" data-aos="zoom-in-up" data-aos-duration="800">
                     <div class="row">
                        <div class="col-md-12 col-12">
                           <h3>Saran Profesi <span>{{ $readmore->namatipe }}</span></h3>
                           <div class="row">
                                 <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                                    <ul class="">
                                       @foreach ($profesis as $profesi)    
                                       <li class="list-unstyled">
                                          <div class="icon-svg">
                                             <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-check"><polyline points="20 6 9 17 4 12"></polyline></svg>
                                          </div>
                                          {{ $profesi->profesi_tipe }}
                                       </li>
                                       @endforeach
                                    </ul>
                                 </div>
                           </div>
                        </div>
                     </div>
               </div>
            </section>

            {{-- <section id="artikelLain1" class="col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
               <div class="artikel-tipe" data-aos="zoom-in-up" data-aos-duration="800">
                  <div class="row">
                     <div class="col-md-12">
                        <h3>Apa arti Sukses bagi <span>{{ $readmore->namatipe }}</span> &#63;</h3>
                        <div class="row">
                           <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                              <p>{{$readmore->arti_sukses}}</p>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </section> --}}

            {{-- <section id="artikelSaran" class="col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
               <div class="artikel-tipe">
                  <div class="row">
                     <div class="col-md-12">
                           <h3>Saran Pengembangan untuk&nbsp;<span>{{ $readmore->namatipe }}</span></h3>
                           <div class="row">
                              <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                                 <p>{{ $readmore->saran_pengembangan }}</p>
                              </div>
                           </div>
                     </div>
                  </div>
               </div>
            </section> --}}

            {{-- <section id="artikelLain2" class="col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
               <div class="artikel-tipe" >
                  <div class="row">
                     <div class="col-md-12">
                        <h3>Hidup Bahagia di Dunia kita sebagai&nbsp;<span>{{ $readmore->namatipe }}</span></h3>
                        <div class="row">
                           <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                              <p>{{ $readmore->kebahagiaan_tipe }}</p>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </section> --}}

         </div> <!-- End Content -->
         
      </div> <!-- container 2 -->
   </div> <!-- container 1 -->
@endsection

@section('footer')
   @include('layouts.footer.foouser')
@endsection