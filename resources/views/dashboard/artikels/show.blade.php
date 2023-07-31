 <!-- Boostrap Icons -->
 <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
 <!-- cara menyambungkan dengan class induk/ main -->
    @extends('dashboard.layouts.main')
    @section('title')
    Halaman Detail Artikel
    @endsection
<!-- memberitahu kalo ini adalah sebuah section yang bernama container -->
@section('container')
<div class="">
<div class="card mt-4">
	<div class="card-header">
		<h3>Detail Artikel</h3>
	</div>
 
	<div class="card-body">
        <table cellpadding="12">
            
            <tr>
                <th><small>Judul artikel</small></th>
                <td><small>:</small></td>
                <td><small>Resep brownies coklat</small></td>
            </tr>
            <tr>
                <th><small>Kategori</small></th>
                <td><small>:</small></td>
                <td><small>Brownies</small></td>
            </tr>
            <tr>
                <th><small>Kutipan</small></th>
                <td><small>:</small></td>
                <td><small>Intip yu resep brownies yang satu ini!.</small></td>
            </tr>
            <tr>
                <th><small>Gambar artikel</small></th>
                <td><small>:</small></td>
                <td><img src="/../img/browniesCokelat.jpg" style="height: 200px; width:200px;" alt="brownies"></td>
            </tr>
            <tr>
                <th><small>Isi artikel</small></th>
                <td><small>:</small></td>
                <td><small><p>Bahan-bahan :</p>

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
                    <p>cara membuat :</p>
                    <ol>
                        <li>Kocok bahan-bahan</li>
                        <p>Kocok telur, gula, vanili, dan ovalet sampai mengembang dan berjejak.</p>

                        <li>Masukan tepung</li>
                        <p>Tambahkan tepung dan susu bubuk yang sudah diayak ke dalam kocokan telur sedikit demi sedikit, kemudian aduk rata menggunakan mixer.</p>

                        <li>Masukkan tepung terigu</li>
                        <p>Langkah berikutnya masukkan tepung terigu ke dalam adonan kedua sedikit demi sedikit sambil terus diaduk.</p>

                        <li>Tuangkan bluebland</li>
                        <p>Setelah itu, tuangkan Blue Band Cake and Cookie yang sudah dilelehkan, aduk rata menggunakan mixer sampai merata.</p>

                        <li>Masukan ke dalam loyang lalu panggang</li>
                        <p>Tuang adonan ke dalam loyang, panggang dalam suhu 170 derajat Celcius selama 25 menit atau hingga matang.</p>
                    </ol>     
                    </small></td>
            </tr>
        </table>
                <a style="color: white;" href="/articles" class="btn btn-secondary">kembali</a>
                <a style="color: white;" href="/articles/judul-artikel/edit" class="btn btn-warning"><span data-feather="edit"></span>ubah</a>
	</div>
</div>
 </div>
 </div>
  
@endsection
@section('komentar')
@include('partials.komentar')
@endsection


  