@extends('layouts.master')

@section('sidebar')
    @include('part.sidebar')
@endsection

@section('topbar')
    @include('part.topbar')
@endsection

@section('judul')
    <h1 class="text-primary">Form Pinjam Buku</h1>
@endsection

@section('content')
    <div class="card">

        <div class="card-body">

            <form action="/peminjaman" method="POST">
                @csrf
                <div class="form-group">
                    <label for="nama" class="text-primary font-weight-bold">Nama Peminjam</label>
                    @if(Auth::user()->isAdmin == 1)
                    <select name="users_id" id="" class="form-control">
                        <option value=""></option>
                        @forelse ($peminjam as $item)
                                <option value="{{ $item->id }}">{{ $item->user->name}} ( {{ $item->npm }} )</option>
                            @empty
                                tidak ada user
                            @endforelse
                    </select>
                    @endif

                    @if(Auth::user()->isAdmin == 0)
                    <select name="users_id" id="" class="form-control">
                        <option value="{{ $peminjam->users_id }}">{{ $peminjam->user->name }} ( {{ $peminjam->npm }} )</option>
                    </select>
                    @endif


                </div>

                @error('users_id')
                    <div class="alert alert-danger mt-3">{{ $message }}</div>
                @enderror

                <div class="fom-group">
                    <label for="buku" class="text-primary font-weight-bold">Buku yang akan dipinjam</label>
                    <select name="buku_id" id="" class="form-control">
                        <option value=""></option>
                        @forelse ($buku as $item)
                                <option value="{{ $item->id }}">{{ $item->judul}} ( {{ $item->kode_buku }} ) - {{ $item->status }}</option>
                            @empty
                                tidak ada buku yang tersedia
                            @endforelse
                    </select>
                </div>

                @error('buku_id')
                    <div class="alert alert-danger mt-3">{{ $message }}</div>
                @enderror

                <div class="d-flex justify-content-end mt-5">
                    <a href="/buku" class="btn btn-danger">Kembali</a>
                    <button type="submit" class="btn btn-primary mx-1 px-4">Submit</button>
                </div>


            </form>

        </div>
    </div>
@endsection
