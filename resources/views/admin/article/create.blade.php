@extends('admin.layouts.main')
@section('title')
Halaman Tambah Artikel
@endsection
@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Tambah Artikel Baru</h1>
      </div>
      @if(session()->has('error'))
          <div class="alert alert-danger" role="alert">
            {{ session('error') }}
        </div>
      @endif
  
      @if(session()->has('success'))
          <div class="alert alert-success" role="alert">
            {{ session('success') }}
        </div>
      @endif



<form method="post" action="/admin/articles" class="mb-5" enctype="multipart/form-data">
    @csrf
  <div class="mb-3">
    <label for="art_title" class="form-label">Judul Artikel</label>
    <input type="text" class="form-control @error ('art_title') is-invalid @enderror" id="art_title" name="art_title" autofocus value="{{old('art_title')}}">
    <!-- pesan error -->
    @error('art_title')
    <div class="invalid-feedback">
     {{ $message }}
    </div>
    @enderror
  </div>
  <div class="mb-3">
    <label for="category" class="form-label">Kategori</label>
    <select class="form-select" name="ctg_id">
    @foreach ($categories as $category)
      <option value="{{$category->ctg_id}}">{{ $category->ctg_name}}</option>
    @endforeach
 </select>
  </div>
  <div class="mb-3">
    <label for="art_excerpt" class="form-label">Kutipan</label>
    <input type="text" class="form-control @error ('art_excerpt') is-invalid @enderror" id="art_excerpt" name="art_excerpt"  autofocus value="{{old('art_excerpt')}}">
    <!-- pesan error -->
    @error('art_excerpt')
    <div class="invalid-feedback">
     {{ $message }}
    </div>
    @enderror
  </div>
  <div class="mb-3">
  <label for="art_image" class="form-label">Gambar Artikel</label>
  <img class="img-preview img-fluid mb-3 col-sm-5">
  <input class="form-control  @error ('art_image') is-invalid @enderror" type="file" id="art_image" name="art_image" onchange="previewImage()">
  @error('art_image')
    <div class="invalid-feedback">
        {{ $message }}
    </div>
    @enderror
</div>

<div class="mb-3">
        <label for="art_content" class="form-label">Isi Artikel</label>
        @error('art_content')
            <p class="text-danger">{{ $message }}</p>
        @enderror
        <input id="art_content" type="hidden" name="art_content" value="{{ old('art_content')}}">
        <trix-editor input="art_content"></trix-editor>
</div>
  <a href="/admin/articles" class="btn btn-secondary">Batal</a>
  <button type="submit" class="btn btn-primary">Simpan</button>
</form>



<script>
$('.summernote').summernote({
        placeholder: 'Hello stand alone ui',
        tabsize: 2,
        height: 120,
        toolbar: [
          ['style', ['style']],
          ['font', ['bold', 'underline', 'clear']],
          ['color', ['color']],
          ['para', ['ul', 'ol', 'paragraph']],
          ['table', ['table']],
          ['insert', ['link', 'picture', 'video']],
          ['view', ['fullscreen', 'codeview', 'help']]
        ]
      });
  function previewImage(){
 // menangkap variabel image dan mengambil inputan image
 const art_image = document.querySelector('#art_image');
  // ambil tag image kosong
  const imgPreview = document.querySelector('.img-preview')

  // membuat image block
  imgPreview.style.display = 'block';

  // perintah untuk mengambil data gambar
  const oFReader = new FileReader();
  oFReader.readAsDataUrl(art_image.files[0]);

  oFReader.onload = function(oFREvent){
    imgPreview.src = oFREvent.target.result;
  }
  }
</script>
@endsection 