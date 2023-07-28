        <!-- cara menyambungkan dengan class induk/ main -->
        @extends('layouts.main')
<!-- memberitahu kalo ini adalah sebuah section yang bernama container -->
@section('container')
<div class="col-9">
  <div class="row mt-4">
  <b><a href="/" class="bi bi-arrow-left" style="color:black; item-weigth:bold;">Home</a></b>
<h1 style="text-align:center;"><b>Resep kreasi cookies ala rumahan, enak, renyah, dan mudah dibuat</b></h1>
<center>
    <hr>
<img src="../img/cookies.jpg" style="height: 400px; width:400px; mb-4" class="card-img-top" alt="...">
</center>

<div>
<H3>Bahan-bahan :</H3>

<ul>
        <li>tepung terigu protein sedang 85 gram</li>
        <li>susu kental manis rasa cokelat 60 ml</li>
        <li>cake emulsifier 1 sdm</li>
        <li>baking powder 1 sdt</li>
        <li>gula pasir 150 gram</li>
        <li>cokelat bubuk 35 gram</li>
        <li>telur 4 butir</li>
        <li>blue band cake dan cookie 120 gram</li>
</ul>

<H3>cara membuat :</H3>
        <ol>
            <b><li>Kocok bahan-bahan</li></b>
            <small>Kocok telur, gula, vanili, dan ovalet sampai mengembang dan berjejak.</small>

            <b><li>Masukan tepung</li></b>
            <small>Tambahkan tepung dan susu bubuk yang sudah diayak ke dalam kocokan telur sedikit demi sedikit, kemudian aduk rata menggunakan mixer.</small>

            <b><li>Masukkan tepung terigu</li></b>
            <small>Langkah berikutnya masukkan tepung terigu ke dalam adonan kedua sedikit demi sedikit sambil terus diaduk.</small>

            <b><li>Tuangkan bluebland</li></b>
            <small>Setelah itu, tuangkan Blue Band Cake and Cookie yang sudah dilelehkan, aduk rata menggunakan mixer sampai merata.</small>

            <b><li>Masukan ke dalam loyang lalu panggang</li></b>
            <small>Tuang adonan ke dalam loyang, panggang dalam suhu 170 derajat Celcius selama 25 menit atau hingga matang.</small>
        </ol>      
        </div>
</div>
</div>
  
@endsection
@section('komentar')
@include('partials.komentar')
@endsection

  