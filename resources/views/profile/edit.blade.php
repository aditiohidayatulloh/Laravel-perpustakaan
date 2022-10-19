@extends('layouts.master')

@section('sidebar')
    @include('part.sidebar')
@endsection

@section('topbar')
    @include('part.topbar')
@endsection

@section('judul')
    <h1 class="text-primary">Edit Profile</h1>
@endsection

@section('content')
    <form action="/profile{{ $profile->id }}" method="post">
    @csrf
    @method('put')

    <div class="card pb-5">
        <div class="form-group mx-4 my-2">
            <label for="nama" class="text-md text-primary font-weight-bold mt-2">Nama Lengkap</label>
            <input type="text" class="form-control" value="{{ old('name',$profile->user->name) }}">
        </div>

        @error('name')
            <div class="alert-danger">{{ $massage }}</div>
        @enderror

        <div class="form-group mx-4 my-2">
            <label for="nama" class="text-md text-primary font-weight-bold">Nomor Induk Masiswa</label>
            <input type="text" class="form-control" value="{{ old('npm',$profile->npm) }}">
        </div>

        @error('npm')
        <div class="alert-danger">{{ $massage }}</div>
        @enderror

        <div class="form-group mx-4 my-2">
            <label for="nama" class="text-md text-primary font-weight-bold">Program Studi</label>
            <input type="text" class="form-control" value="{{ old('prodi',$profile->prodi) }}">
        </div>

        @error('prodi')
            <div class="alert-danger">{{ $massage }}</div>
        @enderror

        <div class="form-group mx-4 my-2">
            <label for="nama" class="text-md text-primary font-weight-bold">Alamat</label>
            <input type="text" class="form-control" value="{{ old('alamat',$profile->alamat) }}">
        </div>

        @error('alamat')
            <div class="alert-danger">{{ $massage }}</div>
        @enderror

        <div class="form-group mx-4 my-2">
            <label for="nama" class="text-md text-primary font-weight-bold">Nomor Telepon</label>
            <input type="text" class="form-control" value="{{ old('alamat',$profile->noTelp) }}">
        </div>

        @error('noTelp')
            <div class="alert-danger">{{ $massage }}</div>
        @enderror

        <div class="form-group mx-4 my-2">
            <label for="gambar" class ="text-md text-primary font-weight-bold">Tambah Photo Profile</label>
            <div class="custom-file">
                <input type="file" value="{{ old('alamat',$profile->gambar) }}">{{ $profile->gambar }}
            </div>
        </div>

        <div class="button-save d-flex justify-content-end">
            <button class="btn btn-primary mt-4 mx-4 px-5 py-1">Simpan</button>
        </div>

    </form>
    </div>
@endsection
