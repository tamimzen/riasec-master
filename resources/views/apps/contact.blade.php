@extends('layouts.appuser')
@section('page_title')
   {{"Tentang Kami"}}
@endsection

@section('nav_header')
   @include('layouts.navbar.navuser')
@endsection

@section('content')
   <div class="layout-px-spacing">

      <section id="landing">
         <div class="landingContent">

            <div class="landingText" data-aos="fade-right" data-aos-duration="2000">
               <h3 style="text-indent: 40px; text-transform: none; text-align: justify; line-height: 1.6;"><b>JPC Poliwangi</b> adalah suatu Unit Kerja di Politeknik Negeri Banyuwangi dengan tugas utama sebagai jembatan antara Lulusan Poliwangi dengan Perusahaan / pasar kerja yang sudah bekerja sama. Kegiatan utama dari unit JPC adalah melaksanakan rekrutmen perusahaan yang telah bekerjasama dengan Poliwangi, Tracer Study dan Pelaksanaan seminar untuk calon lulusan.</h3>
            </div>

            <div class="landingImage" data-aos="fade-down" data-aos-duration="2000">
               <img src="{{asset('assets/images/logo/jpc.png')}}" alt="landing-image">
            </div>

         </div> <!-- landing-content -->
      </section> {{-- Landing --}}
   
      <div class="faq container">
         <div class="faq-layouting layout-spacing">

            <div class="rules-wrapper" data-aos="zoom-in-up" data-aos-duration="1000">
               <div class="rules-content">

                  <div class="rules-text">
                     <h3>Visi:</h3>
                     <p>
                        Sebagai unit kerja yang menyediakan pusat informasi lowongan kerja dan menyediakan pelatihan untuk calon lulusan agar mampu bersaing dalam dunia kerja kerja di era industri 4.0.
                     </p> <br>

                     <h3>Misi :</h3>
                     <ul class="">
                        <li class="list-unstyled">
                              <div class="icon-svg">
                                 <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-check"><polyline points="20 6 9 17 4 12"></polyline></svg>
                              </div>
                              Mempersiapkan Mahasiswa dan Alumni Poliwangi untuk memiliki kemampuan dengan standart kompetensi di dunia usaha dan industri.
                        </li>
                        <li class="list-unstyled">
                              <div class="icon-svg">
                                 <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-check"><polyline points="20 6 9 17 4 12"></polyline></svg>
                              </div>
                              Menciptakan jaringan kerja ke seluruh perusahaan.
                        </li>
                        <li class="list-unstyled">
                              <div class="icon-svg">
                                 <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-check"><polyline points="20 6 9 17 4 12"></polyline></svg>
                              </div>
                              Memberikan informasi yang berkaitan dengan dunia kerja dan industri secara berkesinambungan kepada para Mahasiswa dan Alumni.
                        </li>
                     </ul>

                     <h3>Tujuan :</h3>
                     <ul class="">
                        <li class="list-unstyled">
                              <div class="icon-svg">
                                 <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-check"><polyline points="20 6 9 17 4 12"></polyline></svg>
                              </div>
                              Pusat informasi bagi Mahasiswa dan Alumni tentang dunia kerja dan industri.
                        </li>
                        <li class="list-unstyled">
                              <div class="icon-svg">
                                 <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-check"><polyline points="20 6 9 17 4 12"></polyline></svg>
                              </div>
                              Membantu mempersiapkan Mahasiswa dan Alumni memasuki dunia kerja dan industri.
                        </li>
                        <li class="list-unstyled">
                              <div class="icon-svg">
                                 <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-check"><polyline points="20 6 9 17 4 12"></polyline></svg>
                              </div>
                              Menjadi jembatan penghubung antara Politeknik Negeri Banyuwangi dengan dunia industri.
                        </li>
                     </ul>

                  </div>
               </div>
            </div> {{-- Rules-Wrapper --}}

            <section id="contact">
               <div class="contact container">
                  <h3 class="contact-heading">kontak kami</h3>
                  <div class="row contact-info">
                     <div class="icon-container col-md-4 col-sm-12">
                           <div class="contact-address">
                              <i class="icon" data-feather="map-pin"></i>
                              <h3>Address</h3>
                              <p>JL. Raya Jember - Banyuwangi KM 13</p>
                           </div>
                     </div>
      
                     <div class="icon-container col-md-4 col-sm-12">
                           <div class="contact-phone">
                              <i class="icon" data-feather="phone-call"></i>
                              <h3>Phone Number</h3>
                              <p><a href="tel:+ 62 (0333) 636780">+ 62 (0333) 636780</a></p>
                           </div>
                     </div>
      
                     <div class="icon-container col-md-4 col-sm-12">
                           <div class="contact-email">
                              <i class="icon" data-feather="mail"></i>
                              <h3>Email</h3>
                              <p><a href="mailto:jpc@poliwangi.ac.id">jpc@poliwangi.ac.id</a></p>
                           </div>
                     </div>
                  </div> <!-- /contact-info -->
                  <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3948.0857138783326!2d114.30481971387758!3d-8.294268785716543!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd156d7d86bef9b%3A0x4cb09a70b9109740!2sPoliteknik%20Negeri%20Banyuwangi!5e0!3m2!1sid!2sid!4v1580310238203!5m2!1sid!2sid" style="border:0" allowfullscreen="" width="100%" height="300" frameborder="0"></iframe>
               </div>
            </section> <!-- CONTACT -->

         </div> <!-- Faq-Layouting -->
      </div> {{--Faq Container  --}} 

   </div> <!-- /layout-px-spasing -->
@endsection

@section('footer')
   @include('layouts.footer.foouser')
@endsection