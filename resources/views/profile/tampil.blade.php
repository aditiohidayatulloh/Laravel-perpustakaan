@extends('layouts.master')

@section('sidebar')
    @include('part.sidebar')
@endsection

@section('topbar')
    @include('part.topbar')
@endsection

@section('content')
    <div class="card">
        <div class="card-header py-3">
            <h4 class="m-0 font-weight-bold text-primary">Profile</h4>
        </div>
        <div class="row">
            <div class="col-auto ml-5 mr-5 my-4">
                @if ($profile->photoProfile != null)
                    <img src="{{ asset('/images/photoProfile/' . $profile->photoProfile) }}"
                        style="width:150px;height:150px;border-radius:100px">
                @else
                    <img src="{{ asset('template/img/boy.png') }}" style="width:100px;height:100px;border-radius:50px">
                @endif
            </div>
            <div class="col-auto mx-4">
                <div class="form-group mb-3">
                    <label for="nama" class="text-lg text-primary font-weight-bold">Nama Lengkap</label>
                    <h4>{{ $profile->user->name }}</h4>
                </div>

                <div class="form-group mb-3">
                    <label for="npm" class="text-lg text-primary font-weight-bold">Nomor Induk Mahasiswa</label>
                    <h4>{{ $profile->npm }}</h4>
                </div>

                <div class="form-group mb-3">
                    <label for="prodi" class="text-lg text-primary font-weight-bold">Program Studi</label>
                    <h4>{{ $profile->prodi }}</h4>
                </div>

                <div class="form-group mb-3">
                    <label for="prodi" class="text-lg text-primary font-weight-bold">Alamat</label>
                    <h4>{{ $profile->alamat }}</h4>
                </div>

                <div class="form-group mb-3">
                    <label for="prodi" class="text-lg text-primary font-weight-bold">Nomor Telephone</label>
                    <h4>{{ $profile->noTelp }}</h4>
                </div>

            </div>
        </div>
        <div class="edit d-flex justify-content-end my-4 mx-4">
            <a href="/profile/{{ $profile->id }}/edit" class="btn btn-primary px-5">Edit Profile</a>
        </div>
    </div>
@endsection
