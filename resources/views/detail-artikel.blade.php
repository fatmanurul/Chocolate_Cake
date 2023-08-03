        <!-- cara menyambungkan dengan class induk/ main -->
        @extends('layouts.main')
<!-- memberitahu kalo ini adalah sebuah section yang bernama container -->
@section('container')
<div class="col-9">
@foreach($articles as $articles)
  <div class="row mt-4">
  <b><a href="/" class="bi bi-arrow-left" style="color:black; item-weigth:bold;">Home</a></b>
    <h1 style="text-align:center; "><b>{{$articles->art_title}}</b></h1>
    <p>Kategori : <a href="/kategori/{{$articles->ctg_id}}" class="text-black text-decoration-none">{{$articles->ctg_name}}</a></p>
        <center>
            <hr>
        <img src="{{$articles->art_image}}" style="height: 400px; width:400px; mb-4" class="card-img-top" alt="...">
        </center>

     <div>
         {{ $articles->art_content }}
    </div>
</div>
@endforeach
</div>
  
@endsection

@section('komentar')
@include('partials.komentar')
@endsection


  