@extends('admin.layouts.main')
@section('title')
Halaman Dashboard
@endsection
@section('container')
 <!-- Boostrap Icons -->
 <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Daftar Artikel</h1>
      </div>
      @if(session()->has('success'))
          <div class="alert alert-success" role="alert">
            {{ session('success') }}
        </div>
      @endif
      <div class="table-responsive">
      <a href="/admin/articles/create" class="btn btn-primary mb-3">Tambah Artikel Baru</a>
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th scope="col">No</th>
              <th scope="col">Judul Artikel</th>
              <th scope="col">Nama Kategori</th>
              <th scope="col">Status</th>
              <th scope="col">Aksi</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($articles as $articles)
            <tr>
              <td>{{$loop->iteration}}</td> 
              <td>{{$articles->art_title}}</td>
              <td>{{$articles->ctg_name}}</td>
              <td>@if($articles->art_status ==1)
                Aktif
                @else
                Tidak aktif
                @endif
              </td>
              <td><div class="row"> 
                    <div class="col-2">
                          <a href="/admin/articles/{{ $articles->art_id }}" class="badge bg-info"><span data-feather="eye"></span></a>
                    </div>    
                    <div class="col-2">
                          <a href="/admin/articles/{{ $articles->art_id }}/edit" class="badge bg-warning"><span data-feather="edit"></span></a> 
                    </div>
                    <div class="col-2">
                        <div class="form-check form-switch col-2">
                        @if($articles->art_status == 1)
                        <input onclick="location.href='/admin/articles/{{$articles->art_id}}/switch'" class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked" checked>
                        @else
                        <input onclick="location.href='/admin/articles/{{$articles->art_id}}/switch'" class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault">
                        @endif
                      </div>
                     </div>
               </div></td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>

@endsection