<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;

use Illuminate\Database\Seeder;

class ArticlesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('articles')->insert([
            'art_title' => 'brownies yang enak dan lezat',
            'art_slug' => 'brownies-yang-enak-dan-lezat',
            'art_image' => 'images/article-image/b1.jpg',
            'art_excerpt' => ' Brownies ini bisa jadi camilan anak dan keluarga. Cocok juga jadi teman minum teh atau kopi. Selengkapnya, langsung saja simak uraian kompilasi resep brownies berikut ini. ',
            'art_content' => ' Bahan yang Dibutuhkan:
            tepung terigu protein sedang 85 gram
            susu kental manis rasa cokelat 60 ml
            cake emulsifier 1 sdm
            baking powder 1 sdt
            gula pasir 150 gram
            cokelat bubuk 35 gram
            telur 4 butir
            blue band cake dan cookie 120 gram
            dark chocolate compound 70 gram
            vanili bubuk 1 sdt
            Cara memasak
            Cara Membuat Rainbow Cake Panggang:
            Kocok telur, gula, vanili, dan ovalet sampai mengembang dan berjejak.
            Tambahkan tepung dan susu bubuk yang sudah diayak ke dalam kocokan telur sedikit demi sedikit, kemudian aduk rata menggunakan mixer.
            Setelah itu, tuangkan Blue Band Cake and Cookie yang sudah dilelehkan, aduk rata menggunakan mixer sampai merata.
            Setelah merata, matikan mixer, kemudian bagi adonan menjadi lima bagian kemudian beri pewarna.
            Tuang adonan ke dalam loyang, panggang dalam suhu 170 derajat Celcius selama 25 menit atau hingga matang. Lakukan secara bergantian hingga semua warna adonan selesai dipanggang.
            Setelah semua lapisan adonan matang, lapisi setiap kuenya dengan buttercream dan lakukan hingga lapisan teratas.
            Jika buttercream masih tersisa, olesi sekeliling buttercream hingga menyelimuti Rainbow Cake. Setelah itu, hias dengan menaburkan meses warna-warni di atasnya.',
            'art_category_id' => 1
        ]);

        DB::table('articles')->insert([
            'art_title' => 'Resep Soft Cookies Enak dan Lembut, Camilan Kekinian yang Menggugah Selera',
            'art_slug' => 'resep-Soft-Cookies-Enak-dan-Lembut-Camilan-Kekinian-yang-Menggugah-Selera',
            'art_image' => 'images/article-image/cookies.jpg',
            'art_excerpt' => 'Resep soft cookies yang mudah dan dijamin enak di bawah ini sangat cocok untuk Anda yang sedang bingung mencari camilan untuk bersantai. ',
            'art_content' => ' Bahan-bahan:

            115 gr Mentega 55 gr Brown sugar/palm sugar 100 gr Gula pasir (saya pakai 60 gr) 1 Butir telur 1 sdt Vanilla essens 200 gr Tepung Terigu protein sedang 1/2 sdt baking soda 1/4 sdt garam Secukupnya Chocolate chips (sesuai selera)
            Cara membuat resep soft cookies:
            
            Lelehkan mentega, jangan sampai mendidih, asal panas saja dan semua mencair. Campurkan gula pasir dan brown sugar dengan mentega cair. Mixer sampai tercampur rata dan agak mengental. Masukkan telur dan vanilla essens. Kocok dengan mixer kecepatan terendah, sebentar saja skitar 10 detik asal tercampur rata. Masukkan tepung terigu, baking soda dan garam. Aduk dengan spatula sampai semua tercampur rata. Kalau teksturnya masih terlalu basah tambahkan lagi terigunya, adonan mestinya padat seperti di antara basah dan kering. Kalau dipegang dengan tangan sudah tidak lengket. Masukkan chocolate chips, aduk campurkan ke adonan dengan tangan atau spatula. Kalau adonan terasa agak lembek, bungkus dengan plastik masukkan kekulkas selama 5-10 menit. Panaskan oven suhu 175 derajat celcius. Keluarkan adonan dr kulkas dan bentuk2 bola sebesar bola golf. Alaskan kertas roti diatas loyang. Taruh bola2 adonan, beri jarak sedikit. Panggang di dalam oven selama 9-11 menit. Jika ingin tekstur yang chewy, pastikan jangan sampai overbake. Cookies akan terlihat seperti masih belum matang, dan agak puffy tapi bisa dicek bagian bawahnya. Kalau bagian bawah sudah agak kering kecoklatan sedikit, keluarkan saja. Diamkan selama 30 menit dan cookies akan mengeras sendiri, tapi bagian tengahnya akan tetap jadi chewy. Cookies bisa disimpan di dalam wadah kedap udara. Adonan mentah juga bisa disimpan di dalam kulkas beberapa hari.',
            'art_category_id' => 2
        ]);
    }
}