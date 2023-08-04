@extends('admin.layouts.main')
@section('title')
Halaman Ubah Artikel
@endsection
@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Ubah Artikel</h1>
      </div>
<div class="col-lg-8">
<form method="post" action="/articles/{{$article->art_slug}}" class="mb-5" enctype="multipart/form-data">
  @method('put')
    @csrf
  <div class="mb-3">
    <label for="art_title" class="form-label">Judul</label>
    <input type="text" class="form-control @error ('art_title') is-invalid @enderror" id="art_title" name="art_title" required autofocus value="{{old('art_title', $article->art_title)}}">
    <!-- pesan error -->
    @error('judul')
    <div class="invalid-feedback">
       Silahkan isi kolom ini!
    </div>
    @enderror
  </div>
  <div class="mb-3">
    <label for="category" class="form-label">Kategori</label>
    <select class="form-select" name="ctg_id">
      <option value="{{$article->ctg_id}}">{{$article->ctg_name}}</option>
    @foreach ($category as $category)
    <option value="{{$category->ctg_id}}">{{ $category->ctg_name}}</option>
    @endforeach
 </select>
  </div>
  <div class="mb-3">
    <label for="art_excerpt" class="form-label">Kutipan</label>
    <input type="text" class="form-control @error ('art_excerpt') is-invalid @enderror" id="art_excerpt" name="art_excerpt" required autofocus  value="{{old('art_excerpt', $article->art_excerpt)}}">
    <!-- pesan error -->
    @error('art_excerpt')
    <div class="invalid-feedback">
       Silahkan isi kolom ini!
    </div>
    @enderror
  </div>

    <div class="mb-3">
    <label for="art_image" class="form-label">Gambar Artikel</label>
    <div class="col-sm-4">
      @if(isset($article->art_image))
      <img src="{{ asset($article->art_image) }}" class="img-thumbnail" id="tampil_picture" style="object-fit: cover; height: 200px; width: 200px"/>
      @else
      <img src="{{ asset('images/default.jpg') }}" class="img-thumbnail" id="tampil_picture" style="object-fit: cover; height: 200px; width: 200px"/>
      @endif
    </div>
    
    <img class="img-preview img-fluid mb-3 col-sm-5">
    <input class="form-control  @error ('art_image') is-invalid @enderror" value="{{old('art_image', $article->art_image)}}" type="file" id="art_image" name="art_image" onchange="previewart_image()">
    @error('art_image')
      <div class="invalid-feedback">
          {{ $message }}
      </div>
    @enderror
  </div>
  

<div class="mb-3">
  <label for="art_content" class="form-floating">Isi artikel</label>
  <textarea class="form-control" id="art_content" name="art_content" required autofocus>{{old('art_content', $article->art_content)}}</textarea>
  </div>
  <a href="/articles" class="btn btn-secondary">Batal</a>
  <button type="submit" class="btn btn-primary">Simpan</button>
</form>
</div>
<script>
  function previewImage(){
 // menangkap variabel image dan mengambil inputan image
 const art_image = document.querySelector('#art_image');
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