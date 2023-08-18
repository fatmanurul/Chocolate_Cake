<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- My style -->
    <link rel="stylesheet" href="/css/style.css">
    <!-- judul halaman ngambil dari -->
    <title>Chocolate Cake </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
     <!-- Boostrap Icons -->
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
<style>
body {
      background-color: RGB(252, 242, 215); /* Ganti dengan warna yang Anda inginkan */
    }

.custom-button {
    background-color: rgb(202, 141, 109);

     /* Menghilangkan efek outline/border pada state aktif */
     outline: none;
    border: none;
}

.custom-button:hover {
    background-color: rgb(180, 120, 90); /* Warna yang berbeda saat dihover */
}

.custom-image {
    max-width: 100%;
    height: auto;
}
.card {
      width: 100%;
      /* background-image: url('../img/uil.jpg'); Set background image here */
      background-size: cover; /* Adjust the background size to cover the card */
      background-position: center center; /* Center the background image */
    }

    

</style>
  </head>
  <body>
<!-- kasih tau ada navbar -->
@include('visitor.layouts.navbar')
    <!-- Agar tulisan berada di dalam container -->
    <div class="container mt-4">
    <div class="card">
      <div class="card-body">
        <!-- memberitahu halaman child -->
      <div class="container">
      @yield('navigation')
      @yield('search')
          <div class="row">
        @yield('container') 
            <div class="col-4">
              <h2><p style="color:RGB(197, 104, 62);font-family:Lucida Bright; text-align:center; margin-top:17px; text-shadow: 1px 1px 1px grey;">Kreasikan kreatifitasmu dengan <span style="color:RGB(136, 74, 49);">memulai membuat cake!</span></h2></p>
              <hr>
              @yield('kategori')
              <hr>
              <h5><b><p style = "font-family:Poppins; color:RGB(43, 43, 41); text-align: center;">
              Sejarah Cake :  
              </p></b></h5>
              <hr>
              <img src="../img/ck1.jpg" style="height: 400px; width: 400px; mb-4;" alt="" >
<div style="text-align: justify;" class="mt-4">
    <p>
    Bolu atau kue bolu (dari bahasa Portugis: bolo; bahasa Inggris: cake) adalah kue berbahan dasar tepung (umumnya tepung terigu), gula, dan telur. Kue bolu dan cake umumnya dimatangkan dengan cara dipanggang di dalam oven, walaupun ada juga bolu yang dikukus, misalnya: bolu kukus atau brownies kukus. Cake yang dihias dengan lapisan dari krim mentega, fondant, atau marzipan disebut kue tart (kue tarcis).
    Cake berhias (kue tart) atau tanpa hiasan digunakan sebagai makanan penutup atau hidangan istimewa resepsi pernikahan atau pesta ulang tahun. Dalam resepsi pernikahan ala Barat dan pesta ulang tahun, upacara pemotongan kue tart merupakan salah satu acara. Di Indonesia, nasi tumpeng sering menggantikan peran cake sebagai makanan istimewa dalam berbagai upacara peringatan. Acara pemotongan kue juga sering digantikan acara pemotongan tumpeng.
  </p>
</div>
              <small><a href="https://id.wikipedia.org/wiki/Bolu">Selengkapnya di wikipedia cake</a></small>
              </div>
            </div>
            @yield('komentar')
          </div >
        </div >
     </div >
        
        
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    </div>
      </div>
      @yield('footer')
  </body>
</html>