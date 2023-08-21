        <!-- cara menyambungkan dengan class induk/ main -->
        
        @extends('visitor.layouts.main')
<!-- memberitahu kalo ini adalah sebuah section yang bernama container -->
<style>
  
footer {
  text-align: center;
  padding: 1rem 0;
  margin-top: 3rem;
}

footer .credit {
  font-size: 3 rem;
  font-family:Garamond;

}

footer .credit a {
  color: RGB(197, 37, 37);
  font-weight: 700;
}

.footer {
    background-color: RGB(220, 169, 115);
  }
</style>
@section('navigation')
<div class="col-12">
          <div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="../img/3.jpg"  alt="...">
                    <div class="carousel-caption d-none d-md-flex flex-column justify-content-center align-items-center position-absolute" style="top: 50%; transform: translateY(-50%); width: 100%; text-align: center; max-width: 100%;">
                   <h1 style="font-family:Tex Gyre Adventor; font-size: 40px; text-align:center; color:RGB (202, 141, 109); margin-top:17px; text-shadow: 1px 1px 1px red;">Semua resep cake yang pastinya </h1>
                    <h1  style="font-family:Tex Gyre Adventor; font-size: 40px; text-align:center; color:RGB (202, 141, 109); margin-top:17px; text-shadow: 1px 1px 1px red;">mudah untuk diikuti!</h1>
                    </div>
                </div>
                <div class="carousel-item">
                      <img src="../img/pu.jpg"  alt="...">
                      <div class="carousel-caption d-none d-md-flex flex-column justify-content-center align-items-center position-absolute"
                          style="top: 50%; left: 50%; transform: translate(-50%, -50%); width: 100%; text-align: center; max-width: 100%;">
                          <h1 style="font-family:Tex Gyre Adventor; font-size: 40px; text-align:center; color:RGB (202, 141, 109); margin-top:17px; text-shadow: 1px 1px 1px red;">Ikuti berbagai resep yang kamu inginkan!</h1>
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
        </div>
@endsection

@section('search')
<div class="row justify-content-center mt-4">
  <div class="col-md-6">
        <form action="/">
          <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="Cari Artikel" name="search"
             value="{{request('search') }}">
            <button class="btn btn-primary custom-button" type="submit">Cari</button>
          </div>
        </form>
  </div>
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
                         <div class="card-title" style="font-family:Lucida Bright;">
                         <h4>{{ $articles->art_title }}</h4></div>  
                         <div class="card-title">
                         <small>{{ \Carbon\Carbon::parse($articles->art_created_at)->diffForHumans() }}</small>{{-- dari pustaka Carbon untuk mem-parsing (menguraikan) tanggal yang disimpan dalam properti art_created_at dari objek $articles. Ini mengubah tanggal yang mungkin dalam format tertentu menjadi objek Carbon yang dapat dengan mudah dimanipulasi. --}}
                         {{-- diffForHumans(): Setelah tanggal diuraikan menjadi objek Carbon, kita menggunakan metode diffForHumans() untuk menghitung perbedaan antara tanggal itu dan waktu sekarang. Hasilnya adalah string yang menunjukkan waktu relatif, misalnya "2 jam yang lalu", "3 hari yang lalu", "1 minggu yang akan datang", dan sejenisnya. --}}
                         </div> 
                         <h6 style="font-family:Verdana;">{{ $articles->art_excerpt }}</h6>
                 </div>

                 <div class="card-footer">
                 <div class="card-footer">
                    <a href="/articles/{{$articles->art_slug}}" class="btn btn-primary custom-button" style="font-family:Optima">Baca Selengkapnya</a>
                  </div>
                 </div>
         </div>
     </div>
   </div>
@endif
@endforeach
</div>
@endsection
@section('categories')
<h5><b><p style = "font-family:Perpetua; color:RGB(160, 97, 36);">
              Cari Kategori :
              </p></b></h5>
              <hr>
              <select onChange="document.location.href=this.options[this.selectedIndex].value;" class="form-select">
              <option value="/">Semua</option>
              @foreach ($category as $category)
              @if($category->ctg_status == 1){{-- menampilkan kategori yang hanya berstatus aktif --}}
              <option value="/categories/{{$category->ctg_id}}">{{ $category->ctg_name}}</option>
              @endif
              @endforeach
              </select>
@endsection

@section('footer')
<footer class="footer" style="background-color: RGB(220, 169, 115);">
      <div class="credit">
        <p>Created by <a href="">Fatma Nurul Hidayah</a>. | &copy; 2023.</p>
      </div>
    </footer>
@endsection



  