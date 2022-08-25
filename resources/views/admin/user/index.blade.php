@extends('layouts.appadmin')

@section('page_title')
   {{"Daftar Pengguna"}}
@endsection

@section('nav_header')
   @include('layouts.navbar.navadmin')
@endsection

@section('content')

<div class="row layout-top-spacing layout-spacing">
   <div class="col-12">

      <div class="widget-content widget-content-area">
         <div class="widget-header">
            
            @include('layouts.alert.alert')

            <form class="form-inline mt-4 mb-1">

               <h4 class="col-4 mr-5">{{$pageName}}</h4>

                  <div class="col-auto">
                     <div class="d-flex justify-content-sm-start justify-content-center" style="text-align: left">
                        <!-- {{-- Button Pop-Up --}} -->
                        @if (Auth::user()->roles()->first()->name === 'superadmin')
                           <button type="button" class="btn btn-primary mb-2 mr-2" data-toggle="modal" data-target="#exampleModalCenter">
                              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user-plus"><path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="8.5" cy="7" r="4"></circle><line x1="20" y1="8" x2="20" y2="14"></line><line x1="23" y1="11" x2="17" y2="11"></line></svg>
                           </button>
                        @endif
                     </div>
                     <!-- {{-- Pop-UP button --}} -->
                     <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                           <div class="modal-content">
                              <div class="modal-header">
                                 <h5 class="modal-title" id="exampleModalCenterTitle">Tambah Pengguna Baru</h5>
                                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                       <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                                 </button>
                              </div>
                              <div class="modal-body align-items-center">
                                 <!-- {{-- tambah admin --}} -->
                                 <a href="{{ route('account.createAdmin') }}" class="btn btn-secondary btn-lg">Tambah Admin&nbsp;<i class="fas fa-user-shield"></i></a> &nbsp;
                                 <!-- {{-- tambah pengguna --}} -->
                                 <a href="{{ route('account.createUser') }}" class="btn btn-info btn-lg"><i class="fas fa-user-graduate"></i>&nbsp;Tambah User</a>
                              </div>
                           </div>
                        </div>
                     </div>

                  </div>
            </form>
         </div> 

         <div class="col-md-12">
            <button type="button" class="btn btn-primary mb-2 mr-2" data-toggle="modal" data-target="#importSiswaModal">
               <i class="fa fa-user-plus"></i> Import Data User
            </button>
            <button type="button" class="btn btn-primary mb-2 mr-2" data-toggle="modal" data-target="#exportSiswaModal">
               <i class="fa fa-user-plus"></i> Export Data User
            </button>
            <!-- {{-- Pop-UP button --}} -->
            <div class="modal fade" id="importSiswaModal" tabindex="-1" role="dialog" aria-labelledby="importSiswaModalTitle" aria-hidden="true">
               <div class="modal-dialog modal-dialog-centered" role="document">
                  <div class="modal-content">
                     <div class="modal-header">
                        <h5 class="modal-title" id="importSiswaModalTitle">Import Data Pengguna Baru</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                        </button>
                     </div>
                     <div class="modal-body align-items-center">
                     <form action="{{ route('account.import_excel_user') }}" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}

                        <label>Pilih file excel</label>
                        <div class="form-group">
                           <input type="file" name="file" required="required">
                        </div>

                     </div>
                     <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Import</button>
                     </div>
                     </form>
                  </div>
               </div>
            </div>

            <div class="modal fade" id="exportSiswaModal" tabindex="-1" role="dialog" aria-labelledby="exportSiswaModalTitle" aria-hidden="true">
               <div class="modal-dialog modal-dialog-centered" role="document">
                  <div class="modal-content">
                     <div class="modal-header">
                        <h5 class="modal-title" id="exportSiswaModalTitle">Export Data Pengguna Baru</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                        </button>
                     </div>
                     <div class="modal-body align-items-center">
                     <form action="{{ route('account.export_excel_user') }}" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}

                        <div class="form-group">
                           <label for="tahun">Tahun Masuk</label>
                           <select class="form-control tahun" id="tahun" name="tahun">
                              @foreach($angkatan as $a)
                              <option value="{{ $a->tahun->id }}">Angkatan Tahun 20{{ $a->tahun->tahun }}</option>
                              @endforeach
                           </select>
                        </div>
                        <div class="form-group">
                        <label for="prodi">Program Studi</label>
                           <select class="form-control prodi" id="prodi" name="prodi">
                              @foreach($prodi as $p)
                              <option value="{{ $p->id }}">{{ $p->program_studi }}</option>
                              @endforeach
                           </select>
                        </div>

                     </div>
                     <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Export</button>
                     </div>
                     </form>
                  </div>
               </div>
            </div>


         </div>

          {{-- widget-header  --}}
          <div class="table-responsive mb-4 style-2">
            <table id="style-2" class="table style-2 table-hover non-hover">
            {{-- <table id="style-cus" class="table style-2 table-hover non-hover"> --}}
               <thead>
                  <tr>
                     <th>No.</th>
                     <th class="text-center">Foto</th>
                     <th>Nama</th>
                     <th>NIM</th>
                     <th>Program Studi</th>
                     <th>Angkatan</th>
                     <th>Email</th>
                     <th>Telepon</th>
                      <th>Hasil Tes</th> 
                     <th class="text-center" style="">Action</th>
                  </tr>
               </thead>
               <tbody>
                  @foreach ($dataUser as $item)
                  @if ($item->roles == 'user')
                  <tr>
                     <td scope="row">{{$loop->iteration-1}}</td>
                     <td class="text-center">
                        <span><img src="{{ $item->image ?? asset($item->image) }}" class="profile-img"onerror="this.src='{{asset('assets/images/90x90.jpg')}}'"></span>
                     </td>
                     <td>{{$item->name}} <br>
                         <span class="text-info" style="font-size: 10px">{{$item->roles}}</span> 
                     </td>
                     <td>{{$item->nim}}</td>
                     <td>{{$item->programstudi->program_studi ?? "-"}}</td>
                     <td class="text-center">{{$item->tahun->tahun ?? null}}</td>
                     <td>{{Str::limit($item->email, 15, '..')}}</td>
                     <td>{{$item->phone ?? null}}</td>
                      <td class="text-secondary"> {{ $item->tipe ? $item->tipe->tipe->namatipe : '-' }}</td> 
                     <td class="text-center">
                        <div class="dropdown custom-dropdown">
                           <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink12" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-horizontal"><circle cx="12" cy="12" r="1"></circle><circle cx="19" cy="12" r="1"></circle><circle cx="5" cy="12" r="1"></circle></svg>
                           </a>
                           <div class="dropdown-menu" aria-labelledby="dropdownMenuLink12">
                              <!-- {{-- <a class="dropdown-item" href="javascript:void(0);">View</a> --}} -->
                              @if (Auth::user()->roles()->first()->name === 'superadmin')
                                 <a class="dropdown-item btn btn-sm text-warning" href="{{ route('account.edit', $item->id) }}">Edit</a>
                                 {{-- <a class="dropdown-item btn btn-sm text-danger" href="#" data-toggle="modal" data-target="#delete" data-id="{{ $item->id }}">Delete</a> --}}
                                 <a class="dropdown-item btn btn-sm text-danger" href="{{ route('account.destroy', $item->id) }}">Delete</a>
                              @endif
                           </div>
                        </div>
                     </td>
                  </tr>
                  @endif
                  @endforeach
               </tbody>
              
            </table>
         </div> {{-- table-responsive --}}
      </div> {{-- widget-content-area --}}
      
      {{-- modal pop-up --}}
      <div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
         <div class="modal-dialog modal-dialog-centered" role="document">
            <form action="{{ route('account.destroy', $item->id) }}" method="post">
               @csrf
               @method('DELETE')
               <div class="modal-content">
                  <div class="modal-header">
                     <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                           <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                     </button>
                  </div>
                  <div class="modal-body">
                     <p class="modal-text">Apa kamu yakin, akan menghapus data ini?</p>
                  </div>
                  <div class="modal-footer">
                     <button type="button" class="btn" data-dismiss="modal"><i class="flaticon-cancel-12"></i>No, Cancel!</button>
                     <button type="submit" class="btn btn-danger">Yes, Delete!</button>
                  </div>
               </div>
            </form>
         </div>
      </div>

   </div> {{-- col-12 --}}
</div> {{-- row layout-spacing --}}

@endsection

@section('footer')
<div class="footer-wrapper">
   <div class="footer-section f-section-1">
      <p class="">Hak Cipta © 2021 <a target="_blank" href="https://jpc.poliwangi.ac.id">Job Placement Center </a>- Politeknik Negeri Banyuwangi.</p>
   </div>
</div>  {{-- footer-wrapper --}}
@endsection

@section('trigger')
   <script src="{{asset('plugins/select2/select2.min.js')}}"></script>
   <script>
      $('select[name="programstudi_id"]').select2()
   </script>
{{-- datatable --}}
   <!-- NOTE TO Use Copy CSV Excel PDF Print Options You Must Include These Files  -->
   <script src="{{asset('plugins/table/datatable/button-ext/dataTables.buttons.min.js')}}"></script>
   <script src="{{asset('plugins/table/datatable/button-ext/jszip.min.js')}}"></script>    
   <script src="{{asset('plugins/table/datatable/button-ext/buttons.html5.min.js')}}"></script>
   <script src="{{asset('plugins/table/datatable/button-ext/buttons.print.min.js')}}"></script>
   <script>
      // Setup - tambahkan input teks ke setiap sel header
      $('#style-cus tfoot th').each(function () {
         var title = $(this).text();
         $(this).html('<input type="text"  class="form-control" placeholder=" ' + title + '" />');
      });

      c1 = $('#style-cus').DataTable({
         // import data
            dom: '<"row"<"col-md-12"<"row"<"col-md-6"B><"col-md-6"f> > ><"col-md-12"rt> <"col-md-12"<"row"<"col-md-5"i><"col-md-7"p>>> >',
            buttons: {
               buttons: [
                  { extend: 'csv', className: 'btn' },
                  { extend: 'excel', className: 'btn' },
               ]
            },
            // "responsive" :true,
            "oLanguage": {
               // untuk menampilkan button halmaman keberapa
               "oPaginate": { "sPrevious": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>', "sNext": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>' },
               // untuk menampilkan info jumlah data yang masuk pada tabel
               "sInfo": "Showing page _PAGE_ of _PAGES_",
               // ikon search
               "sSearch": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>',
               // placeholder search
               "sSearchPlaceholder": "Search...",
               // menampilkan meu jumlah data setiap page (kolom pojok kiri atas)
               "sLengthMenu": "Results :  _MENU_",
            },
            "stripeClasses": [],
            "lengthMenu": [15, 30, 60, 120],
            "pageLength": 15,
            "initComplete": function () {

/*
=========================================
|           Apply Search Kolom         |
=========================================
*/ 
               this.api().columns([1]).every(function () {
                  var that = this;

                  $('#style-cus tfoot tr').appendTo('#style-cus thead');   // To displays the search boxs at the top instead to the bottom of the table
                  $('input', this.footer()).on('keyup change clear', function () {
                     if (that.search() !== this.value) {
                        that
                              .search(this.value)
                              .draw();
                     }
                  });
               });

               this.api().columns([2]).every(function () {
                  var that = this;

                  $('#style-cus tfoot tr').appendTo('#style-cus thead');   // To displays the search boxs at the top instead to the bottom of the table
                  $('input', this.footer()).on('keyup change clear', function () {
                     if (that.search() !== this.value) {
                        that
                              .search(this.value)
                              .draw();
                     }
                  });
               });

               this.api().columns([5]).every(function () {
                  var that = this;

                  $('#style-cus tfoot tr').appendTo('#style-cus thead');   // To displays the search boxs at the top instead to the bottom of the table
                  $('input', this.footer()).on('keyup change clear', function () {
                     if (that.search() !== this.value) {
                        that
                              .search(this.value)
                              .draw();
                     }
                  });
               });

               this.api().columns([6]).every(function () {
                  var that = this;

                  $('#style-cus tfoot tr').appendTo('#style-cus thead');   // To displays the search boxs at the top instead to the bottom of the table
                  $('input', this.footer()).on('keyup change clear', function () {
                     if (that.search() !== this.value) {
                        that
                              .search(this.value)
                              .draw();
                     }
                  });
               });
/*
=========================================
|           Apply Select Kolom         |
=========================================
*/ 
               // -------------- here we add dropdown selectors filters to specified columns  --------------
               this.api().columns([3]).every(function () {
                  var column = this;
                  var select = $('<select class="form-control"><option  value=""></option></select>')
                     .appendTo($(column.footer()).empty())
                     .on('change', function () {
                        var val = $.fn.dataTable.util.escapeRegex(
                              $(this).val()
                        );

                        column
                              .search(val ? '^' + val + '$' : '', true, false)
                              .draw();
                     });

                  column.data().unique().sort().each(function (d, j) {
                     select.append('<option value="' + d + '">' + d + '</option>');
                  });
               });

               // -------------- here we add dropdown selectors filters to specified columns  --------------
               this.api().columns([4]).every(function () {
                  var column = this;
                  var select = $('<select class="form-control"><option  value=""></option></select>')
                     .appendTo($(column.footer()).empty())
                     .on('change', function () {
                        var val = $.fn.dataTable.util.escapeRegex(
                              $(this).val()
                        );

                        column
                              .search(val ? '^' + val + '$' : '', true, false)
                              .draw();
                     });

                  column.data().unique().sort().each(function (d, j) {
                     select.append('<option value="' + d + '">' + d + '</option>');
                  });
               });

               // -------------- here we add dropdown selectors filters to specified columns  --------------
               this.api().columns([7]).every(function () {
                  var column = this;
                  var select = $('<select class="form-control"><option  value=""></option></select>')
                     .appendTo($(column.footer()).empty())
                     .on('change', function () {
                        var val = $.fn.dataTable.util.escapeRegex(
                              $(this).val()
                        );

                        column
                              .search(val ? '^' + val + '$' : '', true, false)
                              .draw();
                     });

                  column.data().unique().sort().each(function (d, j) {
                     select.append('<option value="' + d + '">' + d + '</option>');
                  });
               });
            },
         });

         function ClearFilters() {

            $('.form-control').val('');  // Clear ext and select inputs with classname form-control
            $('#chk').prop('checked', false).change();  // Clear checkbox and trigger change event

            var table = $('#style-cus').DataTable();
            table
            .search( '' )
            .columns().search( '' )
            .draw();

         }

      multiCheck(c1);
   </script>

@endsection