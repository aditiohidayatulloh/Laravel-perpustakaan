@extends('layouts.master')

@section('sidebar')
    @include('part.sidebar')
@endsection

@section('topbar')
    @include('part.topbar')
@endsection

@section('judul')
    <h1 class="text-primary">Tambah Anggota</h1>
@endsection

@section('content')
<form action="/anggota" method="post" enctype="multipart/form-data">
    @csrf
    @method('put')

    <div class="card pb-5">
        <div class="form-group mx-4 my-2">
            <label for="nama" class="text-md text-primary font-weight-bold mt-2">Nama Lengkap</label>
            <input type="text" class="form-control" value="">
        </div>

        @error('name')
            <div class="alert-danger"> {{ $message }}</div>
        @enderror

        <div class="form-group mx-4 my-2">
            <label for="nama" class="text-md text-primary font-weight-bold">Nomor Induk Masiswa</label>
            <input type="text" class="form-control" value="">
        </div>

        @error('npm')
        <div class="alert-danger"> {{ $message }}</div>
        @enderror

        <div class="form-group mx-4 my-2">
            <label for="nama" class="text-md text-primary font-weight-bold">Program Studi</label>
            <input type="text" class="form-control" value="">
        </div>

        @error('prodi')
            <div class="alert-danger mx-2"> {{ $message }}</div>
        @enderror

        <div class="form-group mx-4 my-2">
            <label for="nama" class="text-md text-primary font-weight-bold">Alamat</label>
            <input type="text" class="form-control" value="">
        </div>

        @error('alamat')
            <div class="alert-danger"> {{ $message }}</div>
        @enderror

        <div class="form-group mx-4 my-2">
            <label for="nama" class="text-md text-primary font-weight-bold">Nomor Telepon</label>
            <input type="text" class="form-control" value="">
        </div>

        @error('noTelp')
            <div class="alert-danger"> {{ $message }}</div>
        @enderror

        <div class="form-group mx-4 my-2">
            <label for="gambar" class ="text-md text-primary font-weight-bold">Tambah Photo Profile</label>
            <div class="custom-file">
                <input type="file" value="">
            </div>
        </div>

        <div class="button-save d-flex justify-content-end">
            <button type="submit"class="btn btn-primary mt-4 mx-4 px-5 py-1">Simpan</button>
        </form>
        </div>
    </div>
@endsection
