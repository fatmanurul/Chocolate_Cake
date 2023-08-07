<!-- cara menyambungkan dengan class induk/ main -->
@extends('visitor.layouts.main')
<!-- memberitahu kalo ini adalah sebuah section yang bernama container -->
@section('container')
<div class="col-9">
@foreach($articles as $articles)
  <div class="row mt-4">
  <b><a href="/" class="bi bi-arrow-left" style="color:black; item-weigth:bold;">Beranda</a></b>
    <h1 style="text-align:center; "><b>{{$articles->art_title}}</b></h1>
    <p>Kategori : <a href="/kategori/{{$articles->ctg_id}}" class="text-black text-decoration-none">{{$articles->ctg_name}}</a></p>
        <center>
            <hr>
            <img src="{{asset($articles->art_image)}}" style="height: 400px; width:400px; mb-4" class="card-img-top" alt="...">
        </center>

     <div style="margin-top:50px;">
         {{ $articles->art_content }}
    </div>
</div>
@endforeach
</div>
  
@endsection

@section('komentar')
<h3>Komentar {{$jml_komen}}</h3>
<hr style="width: 30rem;">
@foreach($comments as $comments)
<div class="card" style="width: 20rem;  margin-top:10px;">
    <div class="card-header">
       <b>{{$comments->cmn_name}}</b> 
        <small>{{ $comments->cmn_created_at }}</small>
    </div>
    <ul class="list-group list-group-flush">
        <li class="list-group-item">{{$comments->cmn_comment}}</li>
    </ul>
</div>
 @endforeach    
<form method="post" action="/articles/{{ $articles->art_slug }}" class="mb-5">
            @csrf
        <div class="col-9">
            <h5><b><p style = "font-family:Perpetua; color:RGB(160, 97, 36); margin-top:100px;">
            Tulis Tanggapanmu :
            </p></b></h5>
            <small style="line-height:5px"></small>
            <div class="form-floating mb-3">
                <textarea class="form-control @error('cmn_comment') is-invalid @enderror" id="cmn_comment" name="cmn_comment" style="height: 100px" ></textarea>
                <label for="floatingTextarea2">Komentar</label>
                <!-- pesan error -->
                    @error('cmn_comment')
                        <div class="invalid-feedback">
                        {{ $message }}
                        </div>
                     @enderror
            </div>
            <div class="form-floating mb-3">
                <input type="name" class="form-control @error ('cmn_name') is-invalid @enderror" id="cmn_name" name="cmn_name" >
                <label for="floatingInput">Nama</label>
                    <!-- pesan error -->
                    @error('cmn_name')
                            <div class="invalid-feedback">
                            {{ $message }}
                            </div>
                    @enderror
            </div>
            <div class="form-floating mb-3">
                <input type="email" class="form-control  @error ('cmn_email') is-invalid @enderror" id="cmn_email" name="cmn_email" >
                <label for="floatingInput">Email</label>
                 <!-- pesan error -->
                    @error('cmn_email')
                            <div class="invalid-feedback">
                            {{ $message }}
                            </div>
                        @enderror
            </div>
            <div class="form-floating mb-3">
                 <button type="submit" class="btn btn-primary">Kirim</button>
            </div>
        </div>
</form> 
@endsection


  