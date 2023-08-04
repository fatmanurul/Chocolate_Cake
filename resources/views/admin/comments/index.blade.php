@extends('admin.layouts.main')
@section('title')
Halaman Daftar Kategori
@endsection
@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">komentar</h1>
      </div>
      <div class="table-responsive col-lg-8">
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Id artikel</th>
              <th scope="col">Nama</th>
              <th scope="col">Email</th>
              <th scope="col">komentar</th>
            </tr>
          </thead>
          <tbody>
          @foreach ($comments as $comment)
            <tr>
              <td>{{$comment->cmn_id}}</td>
              <td>{{$comment->cmn_articles_id}}</td>
              <td>{{$comment->cmn_name}}</td>
              <td>{{$comment->cmn_email}}</td>
              <td>{{$comment->cmn_comment}}</td>
        </div>
            </tr>
        @endforeach
          </tbody>
        </table>
      </div>
@endsection