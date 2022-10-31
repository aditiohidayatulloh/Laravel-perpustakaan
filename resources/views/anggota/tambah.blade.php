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
<form action="/anggota" method="post">
    @csrf

    <div class="card pb-5">
        <div class="form-group mx-4 my-2">
            <label for="nama" class="text-md text-primary font-weight-bold mt-2">Nama Lengkap</label>
            <input type="text" id="name" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}">
        </div>

        @error('name')
            <div class="alert-danger"> {{ $message }}</div>
        @enderror

        <div class="form-group mx-4 my-2">
            <label for="npm" class="text-md text-primary font-weight-bold">Nomor Induk Masiswa</label>
            <input type="text" id="npm" class="form-control @error('npm') is-invalid @enderror" name="npm" value="{{ old('npm') }}">
        </div>

        @error('npm')
        <div class="alert-danger"> {{ $message }}</div>
        @enderror

        <div class="form-group mx-4 my-2">
            <label for="nama" class="text-md text-primary font-weight-bold">Program Studi</label>
            <input type="text" id="prodi" class="form-control @error('prodi') is-invalid @enderror" name="prodi" value="{{ old('prodi') }}">
        </div>

        @error('prodi')
            <div class="alert-danger mx-2"> {{ $message }}</div>
        @enderror

        <div class="form-group mx-4 my-2">
            <label for="nama" class="text-md text-primary font-weight-bold">Alamat</label>
            <input type="text" id="alamat" class="form-control @error('alamat') is-invalid @enderror" name="alamat" value="{{ old('alamat') }}">
        </div>

        @error('alamat')
            <div class="alert-danger"> {{ $message }}</div>
        @enderror

        <div class="form-group mx-4 my-2">
            <label for="nama" class="text-md text-primary font-weight-bold">Nomor Telepon</label>
            <input type="text" id="alamat" class="form-control @error('noTelp') is-invalid @enderror" name="noTelp" value="{{ old('noTelp') }}">
        </div>

        @error('noTelp')
            <div class="alert-danger"> {{ $message }}</div>
        @enderror

        <div class="form-group mx-4 my-2">
            <label for="email" class="text-md text-primary font-weight-bold">Email</label>
            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}">
        </div>

        @error('email')
            <div class="alert-danger"> {{ $message }}</div>
        @enderror

        <div class="form-group mx-4 my-2">
            <label for="password" class="text-md text-primary font-weight-bold">Password</label>
            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password">
        </div>

        @error('password')
            <div class="alert-danger"> {{ $message }}</div>
        @enderror


        <div class="button-save d-flex justify-content-end">
            <button type="submit" class="btn btn-primary mt-4 mx-4 px-5 py-1">Simpan</button>
        </form>
        </div>
    </div>
@endsection
