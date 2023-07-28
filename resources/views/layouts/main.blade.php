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

footer {
  text-align: center;
  padding: 1rem 0;
  margin-top: 3rem;
}

footer .credit {
  font-size: 0.8rem;
}

footer .credit a {
  color: RGB(160, 97, 36);
  font-weight: 700;
}
</style>
  </head>
  <body>
<!-- kasih tau ada navbar -->
@include('partials.navbar')
    <!-- Agar tulisan berada di dalam container -->
    <div class="container mt-4">
        <!-- memberitahu halaman child -->
        <div class="container">
          <div class="row">
        @yield('container') 
            <div class="col-3">
              <h2><p style="font-family:Lucida Bright; text-align:center; color:RGB(228, 216, 178); margin-top:55px; text-shadow: 1px 1px 1px grey;">Kreasikan kreatifitasmu dengan <span style="color:RGB(105, 58, 30);">memulai membuat cake!</span></h2></p>
              <hr>
              <h5><b><p style = "font-family:Perpetua; color:RGB(160, 97, 36);">
              Cari Kategori :
              </p></b></h5>
              <hr>
              <select onChange="document.location.href=this.options[this.selectedIndex].value;" class="form-select">
              <option value="0" selected>Pilih Kategori</option>
              <option value="/kategori/brownies">Brownies</option>
              <option value="/kategori/cupcake">Cupcake</option>
              <option value="/kategori/cookies">Cookies</option>
              <option value="/">All</option>
              </select>
              <hr>
              <h5><b><p style = "font-family:Poppins; color:RGB(43, 43, 41); text-align: center;">
              Sejarah Cake/Bolu :
              </p></b></h5>
              <hr>
              <img src="../img/ck1.jpg" style="height: 300px; width: 270px; mb-4" alt="" >
              <small>Bolu atau kue bolu (dari bahasa Portugis: bolo; bahasa Inggris: cake) adalah kue berbahan dasar tepung (umumnya tepung terigu), gula, dan telur. Kue bolu dan cake umumnya dimatangkan dengan cara dipanggang di dalam oven, walaupun ada juga bolu yang dikukus, misalnya: bolu kukus atau brownies kukus. Cake yang dihias dengan lapisan dari krim mentega, fondant, atau marzipan disebut kue tart (kue tarcis).

              Cake berhias (kue tart) atau tanpa hiasan digunakan sebagai makanan penutup atau hidangan istimewa resepsi pernikahan atau pesta ulang tahun. Dalam resepsi pernikahan ala Barat dan pesta ulang tahun, upacara pemotongan kue tart merupakan salah satu acara. Di Indonesia, nasi tumpeng sering menggantikan peran cake sebagai makanan istimewa dalam berbagai upacara peringatan. Acara pemotongan kue juga sering digantikan acara pemotongan tumpeng.</small>
              <small><a href="https://id.wikipedia.org/wiki/Bolu">Selengkapnya di wikipedia cake</a></small>
              </div>
            </div>

            @yield('komentar')
          </div >
        </div >

        
        
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>

    <footer class="bg-body-secondary">
      <div class="credit">
        <p>Created by <a href="">Fatma Nurul Hidayah</a>. | &copy; 2023.</p>
      </div>
    </footer>
  </body>
</html>