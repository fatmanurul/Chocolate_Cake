@extends('admin.layouts.main')
@section('title')
Halaman Daftar Kategori
@endsection
@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Kategori</h1>
</div>
  <div class="col-lg-8">
      @if(session()->has('success'))
          <div class="alert alert-success" role="alert">
            {{ session('success') }}
        </div>
      @endif
  </div>     
      <div class="table-responsive col-lg-8">
        <a href="/categories/create" class="btn btn-primary mb-3">Tambah Kategori Baru</a>
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th scope="col">Id</th>
              <th scope="col">Nama Kategori</th>
              <th scope="col">Aksi</th>
            </tr>
          </thead>
          <tbody>
            <tr>
            @foreach ($category as $category)
              <td>{{$category->ctg_id}}</td>
              <td>{{$category->ctg_name}}</td>
              <td>
              <div class="row"> 
            <div class="col-2">
                <a href="/categories/{{$category->ctg_id}}/edit" class="badge bg-warning"><span data-feather="edit"></span></a>
            </div>    
                <!-- <a href="" class="badge bg-danger"><span data-feather="x-circle"></span></a> -->
                <div class="form-check form-switch col-2">
                 <input class="form-check-input " type="checkbox" role="switch" id="flexSwitchCheckChecked" checked>
                </div>
        </div>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
@endsection