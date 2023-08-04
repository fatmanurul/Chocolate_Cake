@extends('admin.layouts.main')
@section('title')
Halaman Dashboard
@endsection
@section('container')
 <!-- Boostrap Icons -->
 <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Artikel saya</h1>
      </div>
  <div class="col-lg-8">
      @if(session()->has('success'))
          <div class="alert alert-success" role="alert">
            {{ session('success') }}
        </div>
      @endif
  </div>  
      <div class="table-responsive  col-lg-8">
      <a href="/articles/create" class="btn btn-primary mb-3">Tambah artikel baru</a>
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th scope="col">Id</th>
              <th scope="col">Judul</th>
              <th scope="col">Kategori</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($artikel as $artikel)
            <tr>
              <td>{{$artikel->art_id}}</td> 
              <td>{{$artikel->art_title}}</td>
              <td>{{$artikel->ctg_name}}</td>
              <td><div class="row"> 
                    <div class="col-2">
                          <a href="/articles/{{ $artikel->art_id }}" class="badge bg-info"><span data-feather="eye"></span></a>
                    </div>    
                    <div class="col-2">
                          <a href="/articles/{{ $artikel->art_slug }}/edit" class="badge bg-warning"><span data-feather="edit"></span></a> 
                    </div>
                  <div class="col-2">
                    <div class="form-check form-switch ">
                          <input class="form-check-input " type="checkbox" role="switch" id="flexSwitchCheckChecked" checked>
                    </div>
                  </div>
               </div></td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>

@endsection