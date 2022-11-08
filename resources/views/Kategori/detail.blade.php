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
        <h3 class="judul m-3 text-primary" style="font-weight:bold;">{{ $kategori->nama }}</h3>
        @if ($kategori->deskripsi != null)
            <p class="deskripsi m-3">{{ $kategori->deskripsi }}</p>
        @else
            <p class="deskripsi m-3">Tidak Ada Deskripsi</p>
        @endif
        <div class="d-flex justify-content-end">
            <a href="/kategori" class="btn btn-info mx-3 my-3">Kembali</a>
        </div>
    </div>

    <h4 class="m-3 text-primary" style="font-weight: bold;">Buku Terkait Kategori :</h4>

    <div class="card container-fluid mb-3">

        <div class="row d-flex flex-wrap justify-content-center">

            @forelse ($kategori->kategori_buku as $item)
                <div class="col-auto my-2" style="width:18rem;">
                    <div class="card mx-2 my-2" style="min-height:28rem;">
                        @if ($item->gambar != null)
                            <img class="card-img-top" style="max-height:180px;" src="{{ asset('/images/' . $item->gambar) }}">
                        @else
                            <img class="card-img-top" style="height:200px;" src="{{ asset('/images/noImage.jpg') }}">
                        @endif
                        <div class="card-body d-flex flex-column justify-content-between">
                            <div class="detai-buku">
                                <h5 class="card-title text-primary"><a
                                        href="/buku/{{ $item->id }}"style="text-decoration: none; font-size:1rem;font-weight:bold;">
                                        {{ $item->judul }}</a></h5>
                                <p class = "cart-text m-0">Kode Buku : {{ $item->kode_buku }}</p>
                                <p class="card-text m-0">Pengarang : <a href="#"
                                        style="text-decoration: none;">{{ $item->pengarang }}</a></p>
                                <p class="card-text m-0">Kategori : </p>
                                <p class="text-primary">
                                    @foreach ($item->kategori_buku as $kategori )
                                    {{ $kategori->nama, }},
                                    @endforeach
                            </p>
                                <p class="card-text m-0">Status : {{$item->status  }}</p>
                            </div>
                            @if (Auth::user()->isAdmin == 1)
                                <div class="button-area">
                                    <button class="btn-sm btn-info px-2"><a href="/buku/{{ $item->id }}"
                                            style="text-decoration: none; color:white;">Detail</a></button>
                                    <button class="btn-sm btn-warning px-2"><a href="/buku/{{ $item->id }}/edit"
                                            style="text-decoration: none;color:white">Edit</a></button>
                                    <button class="btn-sm btn-danger px-3"><a data-toggle="modal"
                                            data-target="#DeleteModal{{ $item->id }}">Delete</a></button>
                                </div>
                            @endif

                            @if (Auth::user()->isAdmin == 0)
                                <div class="button-area">
                                    <button class="btn-sm btn-info px-2"><a href="/buku/{{ $item->id }}"
                                            style="text-decoration: none; color:white;">Detail</a></button>
                                    <button class="btn-sm btn-danger mx-1 px-3"><a href="/buku/{{ $item->id }}"
                                        style="text-decoration: none; color:white;">Pinjam Buku</a></button>
                                </div>
                            @endif

                            <!--Delete Modal -->
                            <div class="modal fade" id="DeleteModal{{ $item->id }}" tabindex="-1" role="dialog"
                                aria-labelledby="ModalLabelDelete" aria-hidden="true">
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
                                            <button type="button" class="btn btn-outline-primary"
                                                data-dismiss="modal">Cancel</button>
                                            <form action="/buku/{{ $item->id }}" method="post">
                                                @csrf
                                                @method('delete')
                                                <button class="btn btn-outline-danger px-4" type="submit"
                                                    value="delete">Delete</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
            @empty
                <h3 class="text-primary mt-3">Tidak ada buku</h3>
            @endforelse

        </div>



    </div>
@endsection
