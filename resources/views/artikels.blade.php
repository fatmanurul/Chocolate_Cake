        <!-- cara menyambungkan dengan class induk/ main -->
@extends('layouts.main')
<!-- memberitahu kalo ini adalah sebuah section yang bernama container -->
@section('container')

 <div class="col-9">
  <div class="row mt-4">
        <div class="col-12">
         <div class="card" style="height: 950px; width: 800px">
         <div class="position-absolute px-3 py-2" style="background-color: rgba(0, 0, 0,0.7)"><a href="#" class="text-white text-decoration-none">Brownies</a></div>
                 <img src="../img/browniesCokelat.jpg" style="height: 780px; width: 800px" class="card-img-top" alt="...">

                 <div class="card-body">
                         <div class="card-title"><h4>Tutorial Bootstrap 4 bagian 1</h4></div>
                         Selamat datang di tutorial bootstrap 4 lengkap dari paling dasar sampai mahir, untuk pemula sampai expert.
                 </div>

                 <div class="card-footer">
                         <a href="/detail/brownies" class="btn btn-primary">Baca Selengkapnya</a>
                 </div>
         </div>
        </div>
   </div>

   <div class="row mt-4">
        <div class="col-12">
         <div class="card " style="height: 950px; width: 800px">
         <div class="position-absolute px-3 py-2" style="background-color: rgba(0, 0, 0,0.7)"><a href="#" class="text-white text-decoration-none">Cookies</a></div>
                 <img src="../img/cookies.jpg" style="height: 780px; width: 800px" class="card-img-top" alt="...">

                 <div class="card-body">
                         <div class="card-title"><h4>Tutorial Bootstrap 4 bagian 1</h4></div>
                         Selamat datang di tutorial bootstrap 4 lengkap dari paling dasar sampai mahir, untuk pemula sampai expert.
                 </div>

                 <div class="card-footer">
                         <a href="/detail/cookies" class="btn btn-primary">Baca Selengkapnya</a>
                 </div>
         </div>
         </div>
   </div>

   <div class="row mt-4">
        <div class="col-12">
         <div class="card " style="height: 1090px; width: 800px">
         <div class="position-absolute px-3 py-2" style="background-color: rgba(0, 0, 0,0.7)"><a href="#" class="text-white text-decoration-none">Cupcake</a></div>
                 <img src="../img/cupcake2.jpg" style="height: 900px; width: 800px" class="card-img-top" alt="...">

                 <div class="card-body">
                         <div class="card-title"><h4>Cara membuat cupcake coklat</h4></div>
                         Untuk membuat cupcake coklat, Anda dapat melakukannya dengan langkah-langkah sederhana. Proses pembuatan kue ini tidak berbeda jauh dengan proses pembuatan kue-kue lainnya.
                 </div>

                 <div class="card-footer">
                         <a href="/detail/cupcake" class="btn btn-primary">Baca Selengkapnya</a>
                 </div>
         </div>
   </div>
   </div>
 </div>
  
@endsection

  