@extends('layouts.master')

@section('sidebar')
    @include('part.sidebar')
@endsection

@section('topbar')
    @include('part.topbar')
@endsection

@section('judul')
    Tambah Buku
@endsection

@section('content')

<div class="card mb-4">
    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
      <h6 class="m-0 font-weight-bold text-primary">Form Tambah Buku</h6>
    </div>
    <div class="card-body">
      <form action="/buku" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-group mb-3">
            <label for="Judul"class="text-primary font-weight-bold"> Judul Buku</label>
          <input type="text" name="judul" class="form-control" value="{{ old('judul') }}">
        </div>

        @error('judul')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror

        <div class="form-group mb-3">
            <label for="pengarang" class="text-primary font-weight-bold">Pengarang</label>
          <input type="text" name="pengarang" class="form-control" value="{{ old('pengarang') }}">
        </div>

        @error('pengarang')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror

        <div class="form-group mb-3">
            <label for="penerbit" class="text-primary font-weight-bold">Penerbit</label>
            <input type="text" name="penerbit" class="form-control" value="{{ old('penerbit') }}">
          </div>

          @error('penerbit')
          <div class="alert alert-danger">{{ $message }}</div>
          @enderror

          <div class="form-group mb-3">
            <label for="tahun_terbit"class="text-primary font-weight-bold">Tahun Terbit</label>
            <input type="text" name="tahun_terbit" value="{{ old('tahun_terbit') }}"class="form-control">
          </div>

          @error('tahun_terbit')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror

        <div class="form-group mb-3">
            <label for="deskripsi"class="text-primary font-weight-bold">Deskripsi</label>
            <textarea class="form-control" name="deskripsi" rows="2">{{ old('deskripsi') }}</textarea>
        </div>

        @error('deskripsi')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror

        <div class="form-group">
            <div class="custom-file">
              <input type="file" name="gambar" id="gambar" value="{{ old('gambar') }}">
            </div>
          </div>

        @error('gambar')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror

        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
    </div>
  </div>

@endsection
