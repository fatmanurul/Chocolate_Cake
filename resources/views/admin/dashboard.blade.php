@extends('admin.layouts.main')
@section('title')
Halaman Dashboard
@endsection
@section('container')


 <!-- Boostrap Icons -->
 <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
 
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Selamat Datang Admin</h1>
      </div>
<div class="container">
    <div class="row g-5">
          <div class="col-4">
              <div style=" background-color:RGB(237, 164, 76);padding: 10px; text-align:center;">
                <h1 style="color:white;">{{$jml_kategori}}</h1>
                <p style = "Times; color:white;">Kategori</p>
              </div>
           </div>
        <div class="col-4">
              <div style=" background-color:RGB(93, 148, 227);padding: 10px; text-align:center;">
                <h1 style="color:white;">{{$jml_artikel}}</h1>
                <p style = "Times; color:white;">Artikel</p>
               </div>
        </div>
        <div class="col-4">
              <div style=" background-color:RGB(154, 201, 105);padding: 10px; text-align:center;">
                <h1 style="color:white;">{{$jml_komen}}</h1>
                <p style = "Times; color:white;">Komentar</p>
              </div>
        </div>
    </div>
</div>

@endsection