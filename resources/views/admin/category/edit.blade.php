@extends('admin.layouts.main')
@section('title')
Halaman Ubah Kategori
@endsection
@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Ubah Kategori</h1>
      </div>

<form method="post" action="/admin/categories/{{$category->ctg_id}}" class="mb-5">
  @method('put')
    @csrf
  <div class="mb-3">
    <label for="category" class="form-label">Nama Kategori</label>
    <input type="text" class="form-control @error ('ctg_name') is-invalid @enderror" id="ctg_name" name="ctg_name" autofocus value="{{old('ctg_name', $category->ctg_name)}}">
    <!-- pesan error -->
    @error('ctg_name')
    <div class="invalid-feedback">
     {{ $message }}
    </div>
    @enderror
  </div>
  <a href="/admin/categories" class="btn btn-secondary">Batal</a>
  <button type="submit" class="btn btn-primary">Simpan</button>  
</form>

@endsection 