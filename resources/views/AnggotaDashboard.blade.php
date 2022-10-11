@extends('layouts.master')

@section('topbar')
    @include('part.topbar')
@endsection

@section('sidebar')
    @include('part.sidebar')
@endsection

@section('judul')
   <h2 class="text-primary"> Selamat Datang, {{ Auth::user()->name }}</h2>
@endsection

@section('content')

@endsection
