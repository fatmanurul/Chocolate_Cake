        <!-- cara menyambungkan dengan class induk/ main -->
@extends('visitor.layouts.main')
<!-- memberitahu kalo ini adalah sebuah section yang bernama container -->
@section('container')

<div class="col-9">
@foreach($articles as $articles)
@if($articles->ctg_status == 1 and $articles->art_status == 1)
  <div class="row mt-4">
    <div class="col-12">
        <div class="card" style="height: 950px; width: 800px">
          <div class="position-absolute px-3 py-2" style="background-color: rgba(0, 0, 0,0.7)">
         
                 <a href="#" class="text-white text-decoration-none">{{$articles->ctg_name}}</a></div>
                 <img src="{{asset($articles->art_image)}}" style="height: 780px; width: 800px" class="card-img-top" alt="...">
                 <div class="card-body">
                         <div class="card-title"><h4>{{ $articles->art_title }}</h4></div>
                         {{ $articles->art_excerpt }}
                 </div>

                 <div class="card-footer">
                         <a href="/articles/{{$articles->art_slug}}" class="btn btn-primary">Baca Selengkapnya</a>
                 </div>
         </div>
     </div>
   </div>
@endif
@endforeach
</div>
@endsection

  