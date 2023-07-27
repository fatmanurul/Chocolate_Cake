@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Ubah Artikel</h1>
      </div>
<div class="col-lg-8">
<form method="post" action="/dashboard/artikels" class="mb-5" enctype="multipart/form-data">
    @csrf
  <div class="mb-3">
    <label for="title" class="form-label">Title</label>
    <input type="text" class="form-control @error ('title') is-invalid @enderror" id="title" name="title" required autofocus value="{{old('title')}}">
    <!-- pesan error -->
    @error('title')
    <div class="invalid-feedback">
        {{ $message }}
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
    <label for="body" class="form-label">Isi artikel</label>
    @error('body')
    <p class="text-danger">{{ $message }}</p>
    @enderror
    <input id="body" type="hidden" name="body" value="{{old('body')}}">
  <trix-editor input="body"></trix-editor>
  </div>
  <button type="submit" class="btn btn-primary">Tambah Artikel</button>
  
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