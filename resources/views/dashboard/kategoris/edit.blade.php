@extends('dashboard.layouts.main')
@section('title')
Halaman Ubah Kategori
@endsection
@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Ubah Kategori</h1>
      </div>
<div class="col-lg-8">
<form method="post" action="/dashboard/kategoris" class="mb-5" enctype="multipart/form-data">
    @csrf
  <div class="mb-3">
    <label for="kategori" class="form-label">Nama Kategori</label>
    <input type="text" class="form-control @error ('kategori') is-invalid @enderror" id="kategori" name="kategori" required autofocus value="{{old('kategori')}}">
    <!-- pesan error -->
    @error('kategori')
    <div class="invalid-feedback">
        inputan harus diisi
    </div>
    @enderror
  </div>
  
  <button type="submit" class="btn btn-primary">Simpan</button>
  
</form>
</div>
@endsection 