<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles = Article::join('categories','categories.ctg_id', 'articles.art_category_id')//mengambil data artikel dan menggabungkannya dengan tabel 'categories' menggunakan operasi join. 
                           ->get();//menjalankan query ke database dan mengambil semua data.
      return view('admin.article.index',[ 
      //return view : mengirim data ke view (tampilan) 
      //('admin.article.index' :merujuk pada file Blade template yang terletak di direktori 
        'articles' => $articles,
        // 'articles' : array asosiatif yang berisi data yang ingin di kirimkan ke view. 
        // $articles : akan menjadi variabel yang dapat di gunakan di dalam template Blade untuk menampilkan daftar artikel.
      ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() //sebuah method (fungsi) Secara umum, dalam kerangka kerja (framework) web Laravel, method ini akan dipanggil ketika pengguna mengakses halaman pembuatan artikel baru.
    {
        return view('admin.article.create',[ 
        //pernyataan yang mengembalikan sebuah tampilan (view) ke pengguna. 
                     // adalah nama view yang akan ditampilkan.
            'categories' => Category::where('ctg_status', 1)->get()
            //categories : adalah nama variabel yang akan digunakan di tampilan untuk merujuk kepada data kategori. 
            //where('ctg_status', 1) : adalah sebuah query untuk memfilter data kategori dengan ctg_status bernilai 1(aktif). 
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->art_image);
        $messages = [
            'required' => 'Silahkan isi kolom ini!',
            'max' => 'Tidak boleh lebih dari 100 karakter!',
            'image' => 'Anda hanya dapat mengunggah gambar!'
        ];
        // $messages = [..]   Ini adalah sebuah array yang berisi pesan yang akan ditampilkan jika validasi gagal. Pesan ini akan digunakan untuk memberikan informasi lebih jelas kepada pengguna mengenai apa yang salah dengan input mereka.

        // Input::flash()
        $request->validate([
            'art_title' => [
                'required',
                'max:100',
            ],
            'art_category_id' => 'required',
            'art_excerpt' => 'required|max:100',
            'art_image' => 'required|image',
            'art_content' => 'required'
        ], $messages);//mendefinisikan aturan validasi untuk setiap input dalam bentuk array asosiatif. Dalam kasus ini, aturan validasi didefinisikan untuk art_title, art_excerpt, art_image, dan art_content. Jika validasi gagal, Laravel akan mengembalikan pesan kesalahan yang sesuai berdasarkan aturan yang telah Anda tentukan.

        $check_art_title = Article::join('categories','categories.ctg_id','articles.art_category_id')// menggunakan model Eloquent Article untuk mengakses tabel articles. join adalah metode yang digunakan untuk melakukan operasi penggabungan antara dua tabel. Dalam hal ini, kita menggabungkan tabel articles dengan tabel categories berdasarkan kolom yang sesuai.
                                    ->where('art_title', $request->art_title)//Memastikan judul artikel sama dengan judul yang diinputkan oleh pengguna.
                                    ->get();//Metode ini akan mengembalikan hasil pertama dari query yang dibuat.Kita hanya tertarik untuk mengetahui apakah artikel dengan judul yang sama ditemukan dalam kategori yang sama atau tidak.
        
        $base_slug = Str::slug($request->art_title);//Pada baris ini, kode mengambil judul artikel dari permintaan (request) yang masuk dan menggunakan fungsi Str::slug() untuk mengonversinya menjadi bentuk slug. Fungsi Str::slug() berfungsi untuk menggantikan karakter non-alfanumerik(karakter non-alfanumerik (seperti spasi, tanda baca, atau karakter khusus lainnya) dalam judul artikel akan dihapus atau digantikan dengan karakter "-" oleh fungsi Str::slug(). Hal ini dilakukan untuk menghasilkan string yang bersih dan cocok digunakan dalam URL, karena URL biasanya tidak boleh mengandung karakter non-alfanumerik.) dengan tanda strip "-" sehingga cocok digunakan dalam URL. Hasil slug ini disimpan dalam variabel $base_slug.
        $unique_slug = $base_slug;//ertujuan untuk memulai variabel $unique_slug dengan nilai yang sama seperti $base_slug, yang kemudian akan dimodifikasi jika diperlukan untuk menciptakan slug yang benar-benar unik.

        if ($check_art_title->count() > 0) {//digunakan untuk menghitung berapa banyak artikel yang ditemukan dengan judul yang sama. Jika hasil hitungannya lebih besar dari 0, itu berarti ada artikel dengan judul yang sama.
            $count = 1;// adalah nomor unik yang akan ditambahkan ke slug jika diperlukan.
            while (Article::where('art_slug', $unique_slug)->count() > 0) {//loop while yang akan berjalan selama ada artikel lain dengan slug yang sama dengan $unique_slug.
                $unique_slug = $base_slug . '-' . $count;
                $count++;
            }//$unique_slug diperbarui dengan tambahan nomor unik yang disimpan dalam variabel $count. Jadi, jika slug art_slug sudah ada, maka akan ditambahkan nomor unik setelah tanda strip -.$count ditingkatkan untuk menyiapkan nomor unik untuk iterasi berikutnya.
        }

        $article = new Article;// membuat instance baru dari model Article yang akan digunakan untuk menyimpan data artikel baru.
        
        $article-> art_title = $request->art_title;
        $article-> art_category_id =$request->ctg_id;
        $article->art_slug = $unique_slug; // Gunakan slug yang unik
        $article-> art_excerpt = $request->art_excerpt;
        $article-> art_image = $request->art_image;
        $article-> art_content = $request->art_content;
        $article->art_created_by = auth()->user()->usr_id;//bagian di mana kita mengisi properti-properti objek $article dengan nilai-nilai yang diambil dari input yang diberikan oleh pengguna melalui formulir.

        if ($request->hasFile('art_image')) {
            $files = $request->file('art_image');
            $path = public_path('images/article-image');
            $files_name = 'images' . '/' . 'article-image' . '/' . date('Ymd') . '_' . $files->getClientOriginalName();
            $files->move($path, $files_name);
            $article->art_image = $files_name;
        }//memeriksa apakah ada file gambar yang diunggah oleh pengguna melalui input dengan nama art_image. Jika ada, maka kode di dalam blok ini akan dieksekusi. Kode ini mengatur tempat penyimpanan file gambar dan memindahkan gambar yang diunggah ke lokasi tersebut.

        $article->save();//menyimpan objek $article (artikel baru) ke dalam database.

        return redirect('/admin/articles')->with('success', 'Artikel baru telah ditambahkan!');// akan diarahkan ke halaman daftar artikel admin dengan pesan sukses yang disimpan dalam session menggunakan metode with('success', 'Artikel baru telah ditambahkan!'). Pesan ini dapat ditampilkan kepada pengguna di tampilan nanti.
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Artikel  $artikel
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article)// Parameter ini diberikan dalam format Article $article, yang secara otomatis mengambil artikel berdasarkan ID artikel yang diberikan dalam URL.
    {
        $articles = Article::join('categories','categories.ctg_id', 'articles.art_category_id')//menggunakan model Eloquent Article untuk mengakses tabel articles. Kemudian kita menggunakan metode join untuk menggabungkan tabel articles dengan tabel categories berdasarkan kolom yang sesuai.
                             ->where('art_id',$article->art_id)//menerapkan kondisi untuk memfilter artikel berdasarkan ID artikel yang diberikan.
                             ->first();//Metode ini mengambil hasil pertama dari query yang dibuat. Ini menghasilkan objek artikel yang memiliki ID yang sesuai.
                    return view('admin.article.show',[//ni adalah pernyataan yang mengembalikan sebuah tampilan (view) kepada pengguna.
                    'articles' => $articles, //Data yang akan ditampilkan dalam tampilan adalah artikel yang telah diambil dari database dan disimpan dalam variabel $artikel.
                    ]);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Artikel  $artikel
     * @return \Illuminate\Http\Response
     */
    public function edit($article)
    {
        // dd($article);
        $articles = Article::join('categories','categories.ctg_id', 'articles.art_category_id')//Di sini, kita menggunakan model Eloquent Article untuk mengakses tabel articles dan melakukan operasi join dengan tabel categories berdasarkan kolom yang sesuai.
                        ->where('art_id', $article)// Ini adalah bagian di mana kita menerapkan kondisi pada query. Kondisi ini digunakan untuk memfilter data artikel berdasarkan ID artikel yang diberikan.
                        ->first();// metode yang mengambil hasil pertama dari query yang dibuat.
         $category = Category::where('ctg_id','!=', $articles->ctg_id)// Mengambil kategori yang memiliki ID yang berbeda dari ID kategori artikel yang sedang diedit. Ini menghindari kategori saat ini muncul dalam daftar pilihan.
         ->where('ctg_status', 1)//Mengambil kategori hanya yang memiliki ctg_status bernilai 1 ( status aktif).
         ->get(); //dimana ctg_id sama dengan ctg_id sebelumnya maka tidak akan mucul 

                        // dd($articles);
        return view('admin.article.edit',[
            'article' => $articles,
            'category' => $category
        ]);
        // $article = Article::where('art_slug', $art_slug)->first();
        // return view('dashboard.article.edit',['Article' => $article]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Artikel  $artikel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $article_id)//selain reques, parameter lain di dapat di url dinamis
    {
        // dd($request->art_image);
        // $request->art_image = $request->file('art_image')->getClientOriginalName();
       
 

         $messages = [
            'required' => 'Silahkan isi kolom ini!',
            'max' => 'Tidak boleh lebih dari 100 karakter!',
            'image' => 'Anda hanya dapat mengunggah gambar!'
        
        ];

        $article = $request->validate([
            'art_title' => 'required|max:100 ',
            'art_excerpt' => 'required|max:100',
            'art_image' => 'required',
            'art_content' => 'required',
        ], $messages);//Bagian ini mengambil data yang dikirimkan melalui form untuk diperiksa validitasnya menggunakan metode validate(). Dalam kasus ini, validasi hanya diterapkan pada art_title, memastikan judul artikel diisi dan tidak lebih dari 255 karakter.

 
        $check_art_title = Article::join('categories','categories.ctg_id','articles.art_category_id')
        ->where('art_title', $request->art_title)
        ->where('ctg_id', $request->ctg_id)
        ->where('art_id', '!=' ,$article_id)
        ->get();
        //  dd($check_art_title);
    

        $base_slug = Str::slug($request->art_title);//Pada baris ini, kode mengambil judul artikel dari permintaan (request) yang masuk dan menggunakan fungsi Str::slug() untuk mengonversinya menjadi bentuk slug. Fungsi Str::slug() berfungsi untuk menggantikan karakter non-alfanumerik(karakter non-alfanumerik (seperti spasi, tanda baca, atau karakter khusus lainnya) dalam judul artikel akan dihapus atau digantikan dengan karakter "-" oleh fungsi Str::slug(). Hal ini dilakukan untuk menghasilkan string yang bersih dan cocok digunakan dalam URL, karena URL biasanya tidak boleh mengandung karakter non-alfanumerik.) dengan tanda strip "-" sehingga cocok digunakan dalam URL. Hasil slug ini disimpan dalam variabel $base_slug.
        $unique_slug = $base_slug;//ertujuan untuk memulai variabel $unique_slug dengan nilai yang sama seperti $base_slug, yang kemudian akan dimodifikasi jika diperlukan untuk menciptakan slug yang benar-benar unik.

        if ($check_art_title->count() > 0) {//digunakan untuk menghitung berapa banyak artikel yang ditemukan dengan judul yang sama. Jika hasil hitungannya lebih besar dari 0, itu berarti ada artikel dengan judul yang sama.
            $count = 1;// adalah nomor unik yang akan ditambahkan ke slug jika diperlukan.
            while (Article::where('art_slug', $unique_slug)->count() > 0) {//loop while yang akan berjalan selama ada artikel lain dengan slug yang sama dengan $unique_slug.
                $unique_slug = $base_slug . '-' . $count;
                $count++;
            }//$unique_slug diperbarui dengan tambahan nomor unik yang disimpan dalam variabel $count. Jadi, jika slug art_slug sudah ada, maka akan ditambahkan nomor unik setelah tanda strip -.$count ditingkatkan untuk menyiapkan nomor unik untuk iterasi berikutnya.
        }




        $update = Article::where('art_id', $article_id)->first();//mengambil artikel yang sedang diubah berdasarkan ID artikel yang diberikan. 
        $image = substr($update->art_image, 21);//mengambil nama file gambar yang saat ini digunakan oleh artikel tersebut.
        echo $request->art_image;
        $update->art_category_id = $request->ctg_id;
        $update->art_title = $request->art_title;
        $update->art_slug =  Str::slug($unique_slug);//Ini adalah bagian di mana data artikel yang akan diperbarui diperbarui dengan nilai-nilai dari form yang dikirim oleh pengguna.
        if($request->file('art_image')->getClientOriginalName() == $image ){} else{
            if ($request->hasFile('art_image')) {
                $files = $request->file('art_image');
                $path = public_path('images/article-image');
                $files_name = 'images' . '/' . 'article-image' . '/' . date('Ymd') . '_' . $files->getClientOriginalName();
                $files->move($path, $files_name);
                $update->art_image = $files_name;
            }//Ini memeriksa apakah file gambar yang diunggah sama dengan yang saat ini digunakan oleh artikel. Jika berbeda, maka gambar akan diperbarui. Jika sama, tidak ada tindakan yang diambil.
        }
        $update->art_excerpt = $request->art_excerpt;
        $update->art_content = $request->art_content;
        $update['art_updated_by'] = auth()->user()->usr_id;       
        $update->save();//Bagian ini mengupdate bagian lain dari data artikel seperti cuplikan, konten, dan ID pengguna yang melakukan pembaruan.

        return redirect('/admin/articles/' . $article_id)->with('success', 'Artikel telah diperbarui!');//Jika seluruh proses berjalan dengan sukses, pengguna akan diarahkan kembali ke halaman daftar artikel admin dengan pesan sukses yang disimpan dalam session.
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Artikel $artikel
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $rtaicle)
    {
        //
    }

    public function switch($id)
    {
        $status = Article::where('art_id', $id)->first(); //memilih data dari ctg_status lalu di ambil data yang pertama di temukan 
    //   dd($status);
        if($status->art_status == 1){ //mengecek status
           $status->art_status = 0;  //merubah data yang awalnya aktif jadi nonaktif
           $status->save();
        return redirect('/admin/articles')->with('success', 'Artikel telah dinonaktifkan!');
        }else{
            $status->art_status = 1;
            $status->save();
            return redirect('/admin/articles')->with('success', 'Artikel berhhasil diaktifkan!');  
        }
    }
}
