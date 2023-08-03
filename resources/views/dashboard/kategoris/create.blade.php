@extends('dashboard.layouts.main')
@section('title')
Halaman Tambah Kategori
@endsection
@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Tambah Kategori Baru</h1>
      </div>
<div class="col-lg-8">
<form method="post" action="/categories" class="mb-5" enctype="multipart/form-data">
    @csrf
  <div class="mb-3">
    <label for="ctg_name" class="form-label">Nama Kategori</label>
    <input type="text" class="form-control @error ('ctg_name') is-invalid @enderror" id="ctg_name" name="ctg_name" autofocus value="{{old('ctg_name')}}">
    <!-- pesan error -->
    @error('ctg_name')
    <div class="invalid-feedback">
        Silahkan isi kolom ini!
    </div>
    @enderror
  </div>
  <a href="/categories" class="btn btn-secondary">Batal</a>
  <button type="submit" class="btn btn-primary">Simpan</button>
</form>
</div>
@endsection 