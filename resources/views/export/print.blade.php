<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>PDF - {{ Auth::user()->slug }}</title>
   <style type="text/css" media="all">
      
      @import url("https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600;700&family=Nunito:wght@400;600;700&display=swap");

      @page {
         size: A4 landscape;
         margin: 0;
         padding: 0;
      }
      body {
         height: 100%;
         margin: 0;
         padding: 0;
         font-family: 'arial', sans-serif;
      }
      h1{
         font-weight: 700;
         text-transform: uppercase;
         font-size: 30px;
      }
      a {
         color: #fff;
         text-decoration: none;
      }
      table {
         font-size: x-small;
      }
      tfoot tr td {
         font-weight: bold;
         font-size: x-small;
      }
      .invoice .title h2{
         font-size: 30px;
         font-weight: 700;
         text-transform: uppercase;
         color: rgba(55, 55, 55, 1);
      }

      .invoice .title h3{
         color: rgba(55, 55, 55, 1);
         font-weight: 600;
         margin-bottom: 0;
      }
      .invoice .kepribadian h3{
         font-size: 22px;
         font-weight: 700;
         font-style: italic;
         margin-bottom: 0;
      }
      .invoice .kepribadian h2{
         font-size: 34px;
         font-weight: 600;
         color: rgba(55, 55, 55, 1);
         text-transform: uppercase;
         letter-spacing: 5px;
      }
      .invoice .kepribadian .keterangan p{
         font-size: 20px;
         font-style: italic;
         font-weight: 400;
         text-transform: capitalize;
         letter-spacing: 1px;
         line-height: 2px;
         color: rgba(33, 33, 33, 1);
         margin: 0;
         padding: 5px;
      }
      .invoice .kepribadian .keterangan h4{
         text-transform: capitalize;
         letter-spacing: 1px;
         font-size: 20px;
         color: rgba(55, 55, 55, 1);
         margin-bottom: 0;
      }

      .invoice .statistik h3{
         font-size: 20px;
         font-weight: 600;
         text-transform: capitalize;
         letter-spacing: 2px;
         padding: 5px;
         margin-bottom: 0;
      }

      .invoice .statistik .presentase h4{
         font-size: 14px;
         font-weight: 700;
         margin-bottom: 0;
         color: rgba(55, 55, 55, 1);
      }

      .invoice .statistik .presentase .kiri{
         padding-right: 50px;
      }
      .invoice .statistik .presentase .kanan{
         padding-left: 50px;
      }
      .information {
         background-color: #60A7A6;
         color: #FFF;
      }
      .information .logo {
         margin: 5px;
      }
      .information table {
         padding: 5px;
      }
      .information p{
         font-size: 14px;
      }
      .footer {
         margin-top: 15px;
         /* padding: 5px; */
         color: rgba(33, 33, 33, 1);
      }
   </style>
</head>
<body>
   <div class="information">
      <table width="100%">
         <tr>
            <td align="left" {{--class="flex-row"--}} style="width: 30%;">
               {{-- <img src="{{ public_path('assets/images/logo/flag_lowongan.png') }}" alt="Logo" height="50px" width="auto" class="logo"/>
               <img src="{{ public_path('assets/images/logo/logo.png') }}" alt="Logo" height="50px" width="auto" class="logo"/> --}}
               <h3>Hasil Tes # {{ $hasil->id }}</h3>
               <p>Pada : &nbsp;{{ $hasil->created_at->format('d F, Y') }} </p>
            </td>
            <td align="center">
               <h1>Tes Kepribadian &middot; MBTI</h1>
            </td>
            <td align="right" style="width: 30%;">
               <h3>Job Placement Center -<br> Politeknik Negeri Banyuwangi</h3>
               <p>https://jpc.poliwangi.ac.id/</p>
            </td>
         </tr>
      </table>
   </div>

   <div class="invoice">
      <div class="title" align="center">
         <h2>{{ Auth::user()->name }}</h2>
         <h3>{{ Auth::user()->programstudi->program_studi }}</h3>
      </div>
      <div class="kepribadian" align="center">
         <h3>Mengetahui Tipe Kepribadian</h3>
         <h2>{{ $hasil->tipe->namatipe }}</h2>
         <div class="keterangan">
            <p>&#40; {{ $hasil->tipe->keterangan_tipe }} &#41;</p>
            <h4>{{ $hasil->tipe->julukan_tipe }}</h4>
         </div>
      </div>
      <div class="statistik" align="center">
         <h3>Beberapa Kecenderungan Sifat Pada Tipe Kepribadian</h3>
         @foreach($dimensis as $dimensi)

         @php
         $a = $hasil->presentases->firstWhere('dimensi_id', $dimensi->dimensiA);
         $b = $hasil->presentases->firstWhere('dimensi_id', $dimensi->dimensiB);
         @endphp
         <div class="presentase" width="100%">
            <h4>{{ $dimensi->dimA->keterangan }} &nbsp;&nbsp;<span class="kiri" style="width: 50%;">{{ $a->totalpresent }}&#37;</span>&nbsp;&nbsp;&nbsp;<span class="kanan" style="width: 50%;">{{ $b->totalpresent }}&#37;</span>&nbsp;&nbsp; {{ $dimensi->dimB->keterangan }}</h4>
         </div>
         @endforeach
      </div>
   </div>

   <div class="footer">
      <table width="100%">
         <tr>
            <td align="left" style="width: 50%;">
               <p class="">Property © 2021 Job Placement Center - Politeknik Negeri Banyuwangi.</p>
            </td>
            <td align="right" style="width: 50%;">
               {{-- Telah Dilaksanakan pada : &nbsp;{{ $hasil->created_at->format('d F, Y') }} --}}
            </td>
         </tr>
      </table>
   </div>
   
</body>
</html>