        <!-- cara menyambungkan dengan class induk/ main -->
        @extends('layouts.main')
<!-- memberitahu kalo ini adalah sebuah section yang bernama container -->
@section('container')
<div class="col-9">
  <div class="row mt-4">
  <b><a href="/" class="bi bi-arrow-left" style="color:black; item-weigth:bold;">Home</a></b>
<h1 style="text-align:center; "><b>Resep Cupcake cokelat yang enak dan juga simpel</b></h1>
<center>
    <hr>
<img src="../img/cupcake2.jpg" style="height: 400px; width:400px; mb-4" class="card-img-top" alt="...">
</center>

<div>
<H3>Bahan-bahan :</H3>

<ul>
        <li>Coklat masak 150 gram (potong kecil-kecil)</li>
        <li>Tepung terigu 125 gram</li>
        <li>Susu cair 125 ml</li>
        <li>Coklat bubuk 25 gram</li>
        <li>Garam ½ sendok teh</li>
        <li>Telur ayam 3 butir (pisahkan antara kuning dan putihnya)</li>
        <li>Mentega 125 gram</li>
</ul>

<H3>cara membuat :</H3>
        <ol>
            <b><li>Panaskan susu</li></b>
            <small>Langkah pertama dalam pembuatan cupcake coklat yaitu panaskan terlebih dahulu susu cair. Masukkan juga coklat bubuk sedikit demi sedikit lalu aduk sampai tercampur merata.
          Masukkan juga coklat masak ke dalam adonan, aduk terus adonan tersebut. Sambil menunggu mendidih, jangan lupa untuk mengaduk-nya agar tidak menggumpal.
        Silahkan disisihkan terlebih dahulu adonan yang pertama ini.</small>

            <b><li>Campur mentega dan gula</li></b>
            <small>Resep cupcake coklat berikutnya yaitu campur mentega dan juga sebagian gula sampai kedua bahan tersebut larut.Selanjutnya masukkan juga kuning telur lalu kocok sampai mengembang dan tercampur merata.</small>

            <b><li>Masukkan tepung terigu</li></b>
            <small>Langkah berikutnya masukkan tepung terigu ke dalam adonan kedua sedikit demi sedikit sambil terus diaduk.</small>

            <b><li>Kocok putih telur</li></b>
            <small>Siapkan wadah lain lalu masukkan putih telur, kocok sampai mengembang. Jangan lupa untuk menambahkan sisa gula dan juga garam ke dalam adonan tersebut.</small>

            <b><li>Campur semua adonan</li></b>
            <small>Jika sudah selesai melakukan langkah-langkah tersebut, campur-kan semua adonan menjadi 1. Aduk sampai tercampur merata, resep cupcake coklat selanjutnya yaitu memanggang adonan.</small>

            <b><li> Panggang adonan</li></b>
            <small>Tuang adonan ke dalam cetakan muffin, beri alas cup kertas pada cetakan tersebut. Setelah itu tuang kira-kira ¾ atau 7/8 dari cup kertas tersebut. Panggang adonan selama kurang lebih 30 menit menggunakan suhu 180 derajat celsius.Jika sudah matang, Anda dapat mengeluarkan cupcake coklat buatan Anda. Tunggu hingga dingin lalu Anda dapat segera menyajikannya. Untuk mempercantik tampilan-nya, Anda dapat menambahkan topping.Gunakan saja butter cream siap saji yang dapat Anda peroleh di toko kue, atau jika Anda ingin membuatnya sendiri buatlah sesuai selera Anda.</small>
        </ol>
        </div>
</div>
</div>
  
@endsection
@section('komentar')
@include('partials.komentar')
@endsection

  