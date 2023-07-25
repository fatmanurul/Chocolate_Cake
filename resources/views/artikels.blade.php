<!-- cara menyambungkan dengan class induk/ main -->
@extends('layouts.main')
<!-- memberitahu kalo ini adalah sebuah section yang bernama container -->
@section('container')
        <h1 class="mb-5">Halaman Artikel</h1>
        @foreach ($artikel as $artikels)
        <article>
                <h2><a href="/artikels/{{$artikel->id}}">{{$artikel->title}}</a></h2>
                <p>{{$artikel->excerpt}}</p>
        </article>
@endsection
  