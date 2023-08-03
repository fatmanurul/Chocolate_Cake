@extends('dashboard.layouts.main')
@section('title')
Halaman Ubah Artikel
@endsection
@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Ubah Artikel</h1>
      </div>
<div class="col-lg-8">
<form method="post" action="/articles/{{$article->art_slug}}" class="mb-5">
  @method('put')
    @csrf
  <div class="mb-3">
    <label for="judul" class="form-label">Judul</label>
    <input type="text" class="form-control @error ('judul') is-invalid @enderror" id="judul" name="judul" required autofocus value="{{old('judul')}}">
    <!-- pesan error -->
    @error('judul')
    <div class="invalid-feedback">
       Silahkan isi kolom ini!
    </div>
    @enderror
  </div>
  <div class="mb-3">
    <label for="category" class="form-label">Kategori</label>
    <select class="form-select" name="category_id">
  <option value="1">Brownies</option>
  <option value="2">Cookies</option>
  <option value="3">Cupcake</option>
 </select>
  </div>
  <div class="mb-3">
    <label for="kutipan" class="form-label">Kutipan</label>
    <input type="text" class="form-control @error ('kutipan') is-invalid @enderror" id="kutipan" name="kutipan" required autofocus value="{{old('kutipan')}}">
    <!-- pesan error -->
    @error('kutipan')
    <div class="invalid-feedback">
       Silahkan isi kolom ini!
    </div>
    @enderror
  </div>
  <div class="mb-3">
  <label for="image" class="form-label">Gambar Artikel</label>
  <img class="img-preview img-fluid mb-3 col-sm-5">
  <input class="form-control  @error ('image') is-invalid @enderror" type="file" id="image" name="image" onchange="previewImage()">
  @error('image')
    <div class="invalid-feedback">
        {{ $message }}
    </div>
    @enderror
</div>
  <div class="mb-3">
    <label for="body" class="form-label">Isi Artikel</label>
    @error('body')
    <p class="text-danger">{{ $message }}</p>
    @enderror
    <input id="body" type="hidden" name="body" value="{{old('body')}}">
  <trix-editor input="body"></trix-editor>
  </div>
  <a href="/articles" class="btn btn-secondary">Batal</a>
  <button type="submit" class="btn btn-primary">Simpan</button>
</form>
</div>
<script>
  function previewImage(){
 // menangkap variabel image dan mengambil inputan image
 const image = document.querySelector('#image');
  // ambil tag image kosong
  const imgPreview = document.querySelector('.img-preview')

  // membuat image block
  imgPreview.style.display = 'block';

  // perintah untuk mengambil data gambar
  const oFReader = new FileReader();
  oFReader.readAsDataUrl(image.files[0]);

  oFReader.onload = function(oFREvent){
    imgPreview.src = oFREvent.target.result;
  }
  }
</script>
@endsection 