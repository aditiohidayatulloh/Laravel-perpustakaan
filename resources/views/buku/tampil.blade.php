@extends('layouts.master')

@section('sidebar')
    @include('part.sidebar')
@endsection

@section('topbar')
    @include('part.topbar')
@endsection

@section('judul')
    <h1 class="text-primary">Daftar Buku</h1>
@endsection

@section('content')

@if(Auth::user()->isAdmin==1)
    <a href="/buku/create" class="btn btn-primary mb-3">Tambah Buku</a>
@endif

<div class="card container-fluid mb-3" >

<div class="row d-flex flex-wrap justify-content-center">

@forelse ($buku as $item )
<div class="col-auto my-4" style="width:18rem;">
    <div class="card mx-2 my-2" style="min-height:28rem;">
        @if($item->gambar !=null)
        <img class="card-img-top" style="height:200px;" src="{{asset('/images/'.$item->gambar)}}">
        @else
        <img class="card-img-top" style="height:200px;" src="{{asset('/images/noImage.jpg')}}">
        @endif
        <div class="card-body d-flex flex-column justify-content-between">
            <div class="detai-buku">
            <h5 class="card-title text-primary"><a href="/buku/ {{ $item->id }}"style="text-decoration: none; font-size:1rem;font-weight:bold;"> {{ $item->judul }}</a></h5>
            <p class="card-text m-0">Pengarang : <a href="#" style="text-decoration: none;">{{ $item->pengarang}}</a></p>
            <p class="card-text m-0">Penerbit : <a href="#" style="text-decoration: none;">{{ $item->penerbit}}</a></p>
            <p class="card-text">Tahun Terbit : <a href="#" style="text-decoration: none;">{{ $item->tahun_terbit}}</a></p>
            </div>
            @if(Auth::user()->isAdmin==1)
            <div class="button-area">
            <button class="btn-sm btn-info px-2"><a href="/buku/{{ $item->id }}" style="text-decoration: none; color:white;">Detail</a></button>
            <button class="btn-sm btn-warning px-2"><a href="/buku/{{ $item->id }}/edit" style="text-decoration: none;color:white">Edit</a></button>
            <button class="btn-sm btn-danger px-4"><a data-toggle="modal" data-target="#DeleteModal">Delete</a></button>
            </div>
                <!--Delete Modal -->
                <div class="modal fade" id="DeleteModal" tabindex="-1" role="dialog" aria-labelledby="ModalLabelDelete"
                        aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="ModalLabelDelete">Ohh No!</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <p>Are you sure you want to delete?</p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-outline-primary" data-dismiss="modal">Cancel</button>
                                    <form action="/buku/{{ $item->id }}" method="post">
                                        @csrf
                                        @method('delete')
                                    <input type="submit" value="delete"class="btn btn-outline-danger">
                                </form>
                            </div>
                            </div>
                        </div>
                        </div>


                    @endif

                    @if(Auth::user()->isAdmin==0)
                    <div class="button-area">
                    <a href="/buku/{{ $item->id }}" class="btn btn-info px-3 py-2" style="text-decoration:none;">Detail</a>
                    <a href="#" class="btn btn-danger px-3 py-2" style="text-decoration:none;">Pinjam Buku</a>
                    </div>
                    @endif

                    </form>
            </div>
        </div>
    </div>
@empty
<h1>Tidak ada buku</h1>
@endforelse

</div>

</div>

@endsection
