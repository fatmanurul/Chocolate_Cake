        <!-- cara menyambungkan dengan class induk/ main -->
        
        @extends('visitor.layouts.main')
<!-- memberitahu kalo ini adalah sebuah section yang bernama container -->
@section('navigation')
<div class="col-12">
          <div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="../img/lans3.jpg"  alt="...">
                    <div class="carousel-caption d-none d-md-flex flex-column justify-content-center align-items-center position-absolute" style="top: 50%; transform: translateY(-50%); width: 100%;">
                      <h1>Second slide label</h1>
                      <p>Some representative placeholder content for the second slide.</p>
                    </div>
                  </div>
              <div class="carousel-item">
                  <img src="../img/kue.jpg" style="width: 2000px; height: 550px" alt="...">
                  <div class="carousel-caption d-none d-md-flex flex-column justify-content-center align-items-center position-absolute" style="top: 50%; transform: translateY(-50%); width: 100%; text-align: center; max-width: 100%;">
                    <h1>Second slide label</h1>
                    <p>Some representative placeholder content for the second slide.</p>
                  </div>
              </div>
              <div class="carousel-item">
                  <img src="../img/lans.jpg" style="width: 2000px; height: 550px" alt="...">
                  <div class="carousel-caption d-none d-md-flex flex-column justify-content-center align-items-center position-absolute" style="top: 50%; transform: translateY(-50%); width: 100%; text-align: center; max-width: 100%;">
                    <h1>Second slide label</h1>
                    <p>Some representative placeholder content for the second slide.</p>
                  </div>
            </div>
          </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Next</span>
            </button>
            <hr>
            <!-- <center> -->
          <!-- <h1 style="font-family:serif; text-align:center; color:RGB(113, 48, 36); margin-top:17px; text-shadow: 1px 1px 1px grey;">Berbagi resep seputar olahan Kue!</h1>
          </center> -->
        </div>
@endsection
@section('container')

<div class="col-8">
@foreach($articles as $articles)
@if($articles->ctg_status == 1 and $articles->art_status == 1)
  <div class="row mt-4">
    <div class="col-12">
        <div class="card" style="height: 900px; width: 700px">
          <div class="position-absolute px-3 py-2" style="background-color: rgba(0, 0, 0,0.7)">
                 <a href="#" class="text-white text-decoration-none">{{$articles->ctg_name}}</a></div>
                 <img src="{{asset($articles->art_image)}}" style="height: 700px; width: 700px" class="card-img-top" alt="...">
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
@section('kategori')
<h5><b><p style = "font-family:Perpetua; color:RGB(160, 97, 36);">
              Cari Kategori :
              </p></b></h5>
              <hr>
              <select onChange="document.location.href=this.options[this.selectedIndex].value;" class="form-select">
              <option value="/">Semua</option>
              @foreach ($category as $category)
              @if($category->ctg_status == 1)
              <option value="/categories/{{$category->ctg_id}}">{{ $category->ctg_name}}</option>
              @endif
              @endforeach
              </select>
@endsection



  