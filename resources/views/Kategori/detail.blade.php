@extends('layouts.master')

@section('sidebar')
    @include('part.sidebar')
@endsection

@section('topbar')
    @include('part.topbar')
@endsection

@section('judul')
    <h2 class="text-primary">Detail Kategori</h2>
@endsection

@section('content')
    <div class="card">
        <h3 class="judul m-3 text-primary" style="font-weight:bold;">{{$kategori->nama}}</h3>
        @if($kategori->deskripsi !=null)
        <p class="deskripsi m-3">{{ $kategori->deskripsi }}</p>
        @else
        <p class="deskripsi m-3">Tidak Ada Deskripsi</p>
        @endif
    </div>

<h4 class="serupa m-3 text-primary" style="font-weight: bold;">Buku Terkait Kategori :</h4>
@endsection
