<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.category.index',[
            'category' => Category::all()//adalah metode yang digunakan untuk mengambil semua data kategori dari database. Dalam hal ini, Category adalah model yang mewakili entitas kategori dalam basis data.
          ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $message = [
            'unique' => 'Nama sudah dipakai!',
            'required' => 'Silahkan isi kolom ini!'
        ];//Variabel ini berisi pesan yang akan ditampilkan jika validasi data gagal. Pesan ini dapat disesuaikan dan disesuaikan dengan kondisi yang berbeda.
        $validatedData = $request->validate([
            'ctg_name' => 'required|max:255|unique:categories'     
        ],$message
    );

        $validatedData['ctg_created_by'] = auth()->user()->usr_id;


        // insert data ke database
        Category::create($validatedData);

        return redirect('/admin/categories')->with('success', 'Kategori baru telah ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        return view('admin.category.edit',[
            'category' => $category
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        // dd($category);
        $message = [
            'required' => 'Silahkan isi kolom ini!',
            'unique' => 'Nama sudah dipakai!'
        ];
        $validatedData = $request->validate([
            'ctg_name' => 'required|max:255|unique:categories,ctg_name,'.$category->ctg_id.',ctg_id,ctg_deleted_at,NULL'
        ],$message
    );//kode ini memvalidasi bahwa nama kategori yang diinput harus unik dalam tabel 'categories', tetapi jika kategori dengan ID yang sama dengan yang sedang diedit sudah ada, validasi unik tidak akan diterapkan pada data tersebut.

         $validatedData['ctg_updated_by'] = auth()->user()->usr_id;

         Category::where('ctg_id', $category->ctg_id)//akan memilih catatan dalam tabel 'categories' yang memiliki nilai 'ctg_id' yang sama dengan nilai 'ctg_id' dari objek $category.
                ->update($validatedData);

        return redirect('/admin/categories')->with('success', 'Kategori telah diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        //
    }

    public function switch($id)
    {
        $status = Category::where('ctg_id', $id)->first(); //memilih data dari ctg_status lalu di ambil data yang pertama di temukan 
    //   dd($status);
        if($status->ctg_status == 1){ //mengecek status
           $status->ctg_status = 0;  //merubah data yang awalnya aktif jadi nonaktif
           $status->save();
        return redirect('/admin/categories')->with('success', 'Kategori telah dinonaktifkan!');
        }else{
            $status->ctg_status = 1;
            $status->save();
            return redirect('/admin/categories')->with('success', 'kategori telah diaktifkan!');  
        }
    }
}
