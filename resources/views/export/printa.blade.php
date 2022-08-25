<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta http-equiv="X-UA-Compatible" content="ie=edge,chrome=1">
   {{-- <title>Document</title> --}}
   <link rel="stylesheet" href="{{ asset('/assets/css/printpdf.css') }}" type="text/css" media="all"/>
</head>
<body>
<section>
   <div class="pdf-card leafs">

      <div class="dashes"></div>
      <div class="pdf-card-subtitle">
         <h3>Tes Kepribadian &middot; MBTI</h3>
      </div>
      <div class="dashes"></div>

      <div class="cafe-items-container">

         <div class="cafe-items-title">
            <h2>{{ Auth::user()->name }}</h2>
            <p>Mengetahui Tipe Kepribadian</p>
         </div>
         
         <dl class="divide-end">
            <dt>{{ $hasil->tipe->namatipe }}</dt>
            <dd class="description">
               <p>&#40; {{ $hasil->tipe->keterangan_tipe }} &#41;</p>
               <h4>{{ $hasil->tipe->julukan_tipe }}</h4>
            </dd>

            <div class="statistic">
               <h3>Beberapa Kecenderungan Sifat Pada Tipe Kepribadian</h3>
               @foreach($dimensis as $dimensi)

               @php
               $a = $hasil->presentases->firstWhere('dimensi_id', $dimensi->dimensiA);
               $b = $hasil->presentases->firstWhere('dimensi_id', $dimensi->dimensiB);
               @endphp

               <div class="info-presentase">
                  <h4>{{ $dimensi->dimA->keterangan }} &nbsp;<span class="kiri">{{ $a->totalpresent }}&#37;</span>  <span class="kanan">{{ $b->totalpresent }}&#37;</span>&nbsp; {{ $dimensi->dimB->keterangan }}</h4>
               </div>

               @endforeach

               <h5>Telah Dilaksanakan pada : &nbsp;{{ $hasil->created_at->format('d F, Y') }} </h5>
            </div>
            
            <div class="place-contact">
               <address>
                  <p class="addtop">Hormat Kami</p>
               </address>
               <address>
                  <p>Job Placement Center &middot; <br> Politeknik Negeri Banyuwangi </p>
               </address>
            </div>

         </dl>

      </div>
   </div>
</section>

</body>
</html>