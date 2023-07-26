@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Artikel Saya</h1>
      </div>
      @if(session()->has('success'))
      <div class="alert alert-success" role="alert">
  {{ session('success') }}
     </div>
      @endif
      <div class="table-responsive col-lg-8">
        <a href="/dashboard/artikels/create" class="btn btn-primary mb-3">Tambah Artikel Baru</a>
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Judul</th>
              <th scope="col">Kategori</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>1</td>
              <td>Brownies yang enak</td>
              <td>Brownies</td>
              <td>
                <a href="/dashboard/artikels/" class="badge bg-info"><span data-feather="eye"></span></a>
                <a href="" class="badge bg-warning"><span data-feather="edit"></span></a>
                <a href="" class="badge bg-danger"><span data-feather="x-circle"></span></a>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
@endsection