@extends('layouts.appadmin')

@section('page_title')
   {{"Daftar Tipe Kepribadian"}}
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
               <h4 class="col-10">{{$pageName}}</h4>
                  <div class="col-auto">
                     <a href="{{ route('tipekep.create') }}" id="btn-compose-mail" class="btn btn-primary btn-block"><i data-feather="plus"></i></a>
                  </div>
            </form>
         </div> {{-- widget-header --}}
         <div class="table-responsive mb-4 style-2">
            <table id="style-2" class="table style-2 table-hover non-hover">
               <thead>
                  <tr>
                     <th>No.</th>
                     <th>Nama</th>
                     <th>Avatar</th>
                     <th>Deskripsi</th>
                     <!-- <th>Bidang</th> -->
     
                     <th class="text-center">Action</th>
                  </tr> 
               </thead>
               <tbody>
                  @foreach ($tipekepribadian  as $tipe)
                  <tr>
                     <td scope="row">{{$loop->iteration}}</td>
                     <td>{{$tipe->namatipe}}</td>
                     <td class="text-center">
                        <span><img src="{{asset($tipe->image)}}" class="profile-img"onerror="this.src='{{asset('assets/images/90x90.jpg')}}'"></span>
                     </td>
                     <td>{{Str::limit($tipe->deskripsi, 50, '...')}}</td>
                     <!-- <td>{{Str::limit($tipe->bidang, 50, '...')}}</td> -->
                     <td class="text-center">
                        <div class="dropdown custom-dropdown">
                           <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink12" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-horizontal"><circle cx="12" cy="12" r="1"></circle><circle cx="19" cy="12" r="1"></circle><circle cx="5" cy="12" r="1"></circle></svg>
                           </a>
                           <div class="dropdown-menu" aria-labelledby="dropdownMenuLink12">
                              {{-- <a class="dropdown-item" href="javascript:void(0);">View</a> --}}
                              <a class="dropdown-item btn btn-sm text-warning" href="{{ route('tipekep.edit', $tipe->id) }}">Edit</a>
                              <a class="dropdown-item btn btn-sm text-danger" href="#" data-toggle="modal" data-target="#delete" data-id="{{ $tipe->id }}">Delete</a>
                           </div>
                        </div>
                     </td>
                  </tr>
                  @endforeach
               </tbody>
               
            </table>
         </div> {{-- table-responsive --}}
      </div> {{-- widget-content-area --}}
         {{-- modal pop-up --}}
         <div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
               <form action="{{ route('tipekep.destroy', $tipe->id) }}" method="post">
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