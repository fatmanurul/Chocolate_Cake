<!-- cara menyambungkan dengan class induk/ main -->
@extends('visitor.layouts.main')

<style>
    footer {
  text-align: center;
  padding: 1rem 0;
  margin-top: 3rem;
}

footer .credit {
  font-size: 3 rem;
  font-family:Garamond;

}

footer .credit a {
  color: RGB(197, 37, 37);
  font-weight: 700;
}

.footer {
    background-color: RGB(220, 169, 115);
  }
</style>
<script src="{{ asset('vendors/parsley/dist/parsley.min.js') }}"></script>
<script src="{{ asset('vendors/parsley/dist/i18n/id.js') }}"></script>
<script src="{{ asset('vendors/parsley/dist/i18n/id.extra.js') }}"></script>
<!-- memberitahu kalo ini adalah sebuah section yang bernama container -->
@section('container')
<div class="col-8">
    <div class="row mt-4">
        <b><a href="/" class="bi bi-arrow-left" style="color:black; item-weigth:bold;">Beranda {{ asset('vendors/parsley/dist/parsley.min.js') }}</a></b>
        <h1 style="text-align:center; "><b>{{$articles->art_title}}</b></h1>
        <small style="text-align:center">
            {{ \Carbon\Carbon::parse($articles->art_created_at)->formatLocalized('%A, %d %b %Y %H:%M') }} {{-- digunakan untuk mengambil waktu pembuatan artikel dari basis data dan memformatnya sesuai dengan format yang diinginkan. %A mewakili nama hari, %d mewakili tanggal, %b mewakili nama bulan singkat, %Y mewakili tahun, dan %H:%M mewakili jam dan menit. --}}
        </small>
            <center>
                <hr>
                <img src="{{asset($articles->art_image)}}" style="height: 600px; width:400px; mb-4" class="card-img-top" alt="...">
            </center>

        <div style="margin-top:50px;">
            {!! $articles->art_content !!}
        </div>
    </div>
</div>
@endsection

@section('comments')
<h3 class="mt-4">Komentar {{$comments_count}}</h3>
<hr style="width: 30rem;">
@foreach($comments as $comments)
<div class="card" style="width: 20rem; margin-top:10px;">
    <div class="card-header">
       <b>{{$comments->cmn_name}}</b> 
    </div>
    <ul class="list-group list-group-flush">
        <li class="list-group-item"><small>{{ $comments->cmn_created_at }}</small></li>
        <li class="list-group-item">{{$comments->cmn_comment}}</li>
    </ul>
</div>
 @endforeach    
<form method="post" action="/articles/{{ $articles->art_slug }}" class="mb-5" data-parsley-validate>
            @csrf
        <div class="col-9">
            <h5><b><p style = "font-family:Perpetua; color:RGB(160, 97, 36); margin-top:100px;">
            Tulis Tanggapanmu :
            </p></b></h5>
            <small style="line-height:5px"></small>
            <div class="form-floating mb-3">
                <textarea class="form-control @error('cmn_comment') is-invalid @enderror" id="cmn_comment" name="cmn_comment" style="height: 100px" >{{ old('cmn_comment') }}</textarea>
                <label for="floatingTextarea2">Komentar</label>
                <!-- pesan error -->
                    @error('cmn_comment')
                        <div class="invalid-feedback">
                        {{ $message }}
                        </div>
                    @enderror
            </div>
            <div class="form-floating mb-3">
                <input type="name" class="form-control @error ('cmn_name') is-invalid @enderror" id="cmn_name" name="cmn_name" value="{{ old('cmn_name') }}" required data-parsley-trigger="keyup" >
                <label for="floatingInput">Nama</label>
                    <!-- pesan error -->
                    @error('cmn_name')
                            <div class="invalid-feedback">
                            {{ $message }}
                            </div>
                    @enderror
            </div>
            <div class="form-floating mb-3">
                <input type="text" class="form-control  @error ('cmn_email') is-invalid @enderror" id="cmn_email" name="cmn_email" value="{{ old('cmn_email') }}" required>
                <label for="floatingInput">Email</label>
                 <!-- pesan error -->
                    @error('cmn_email')
                            <div class="invalid-feedback">
                            {{ $message }}
                            </div>
                    @enderror
            </div>
            <div class="form-floating mb-3">
                 <button type="submit" class="btn btn-primary custom-button">Kirim</button>
            </div>
        </div>
</form> 
@endsection
@section('categories')
<h5><b><p style = "font-family:Perpetua; color:RGB(160, 97, 36);">
              Cari Kategori :
              </p></b></h5>
              <hr>
              <select  disabled onChange="document.location.href=this.options[this.selectedIndex].value;" class="form-select">
              <option value="0" selected>{{$articles->ctg_name}}</option>
              <option value="/">Semua</option>
              </select>
@endsection

@section('footer')
<footer class="footer" style="background-color: RGB(220, 169, 115);">
      <div class="credit">
        <p>Created by <a href="">Fatma Nurul Hidayah</a>. | &copy; 2023.</p>
      </div>
    </footer>
@endsection


  