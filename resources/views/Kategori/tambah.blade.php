@extends('layouts.master')


@section('sidebar')
    @include('part.sidebar')
@endsection

@section('topbar')
    @include('part.topbar')
@endsection

@section('judul')
    Tambah Kategori
@endsection

@section('content')
<div class="card px-4 pt-3 pb-5">

<form action="/kategori" method="post">
    @csrf
    <div class="form-group">
      <label for="formGroupExampleInput">Nama Kategori</label>
      <input name="nama" type="text" class="form-control" id="formGroupExampleInput">
    </div>
    @error('nama')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror

    <div class="form-group">
        <label for="exampleFormControlTextarea1">Deskripsi</label>
        <textarea class="form-control" name="deskripsi" id="exampleFormControlTextarea1" rows="3"></textarea>

    </div>

    <button class="btn-sm btn-info">
        Tambah
    </button>

  </form>
</div>
@endsection

