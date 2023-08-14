@extends('admin.layouts.main')
@section('title')
Halaman Daftar Kategori
@endsection
@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Daftar Komentar</h1>
      </div>
      <div class="table-responsive">
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th scope="col">No</th>
              <th scope="col">Artikel</th>
              <th scope="col">Komentar</th>
              <th scope="col">Nama</th>
              <th scope="col">Email</th>
            </tr>
          </thead>
          <tbody>
          @foreach ($comments as $comment)
            <tr>
              <td>{{$loop->iteration}}</td>
              <td>{{$comment->art_title}}</td>
              <td>{{$comment->cmn_comment}}</td>
              <td>{{$comment->cmn_name}}</td>
              <td>{{$comment->cmn_email}}</td>
        </div>
            </tr>
        @endforeach
          </tbody>
        </table>
      </div>
@endsection