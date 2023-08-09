 <!-- Boostrap Icons -->
 <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
 <!-- cara menyambungkan dengan class induk/ main -->
    @extends('admin.layouts.main')
    @section('title')
    Halaman Detail Artikel
    @endsection
<!-- memberitahu kalo ini adalah sebuah section yang bernama container -->
@section('container')
<style>
  th, td {
    vertical-align: top; /* Ini yang membuat teks di atas sel */
  }
</style>
<div class="">
<div class="card mt-4">
	<div class="card-header">
		<h3>Detail Artikel</h3>
	</div>
 
	<div class="card-body">
        <table cellpadding="12">
            <tr>
                <th style="vertical-align: top;"><small>Judul artikel</small></th>
                <td><small>:</small></td>
                <td><small>{{$artikel->art_title}}</small></td>
            </tr>
            <tr>
                <th style="vertical-align: top;"><small>Kategori</small></th>
                <td><small>:</small></td>
                <td><small>{{$artikel->ctg_name}}</small></td>
            </tr>
            <tr>
                <th style="vertical-align: top;"><small>Kutipan</small></th>
                <td><small>:</small></td>
                <td><small>{{ $artikel->art_excerpt }}.</small></td>
            </tr>
            <tr>
                <th style="vertical-align: top;"><small>Gambar artikel</small></th>
                <td><small>:</small></td>
                <!-- {{ asset('storage/'. $artikel->art_image) }} -->
                <td><img src="{{asset($artikel->art_image)}}" style="height: 200px; width:200px;" alt="brownies"></td>
            </tr>
            <tr>
                <th style="vertical-align: top;"><small>Isi artikel</small></th>
                <td><small>:</small></td>
                <td><small>
                {!! $artikel->art_content !!}
                </small></td>
            </tr>
        </table>
                <a style="color: white;" href="/admin/articles" class="btn btn-secondary">kembali</a>
                <a style="color: white;" href="/admin/articles/{{ $artikel->art_id}}/edit" class="btn btn-warning"><span data-feather="edit"></span>ubah</a>
	</div>
</div>
 </div>
 </div>
  
@endsection


  