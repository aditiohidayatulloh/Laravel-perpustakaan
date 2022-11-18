@extends('layouts.master')

@section('sidebar')
    @include('part.sidebar')
@endsection

@section('topbar')
    @include('part.topbar')
@endsection

@section('judul')
    <h2 class="text-primary">Daftar Kategori</h2>
@endsection

@push('styles')
    <link rel="stylesheet" type="text/css"
        href="https://cdn.datatables.net/v/bs4/dt-1.12.1/date-1.1.2/fc-4.1.0/r-2.3.0/sc-2.0.7/datatables.min.css" />
@endpush


@push('scripts')
    <script src="{{ '/template/vendor/datatables/jquery.dataTables.min.js' }}"></script>
    <script src="{{ '/template/vendor/datatables/dataTables.bootstrap4.min.js' }}"></script>

    <!-- Page level custom scripts -->
    <script>
        $(document).ready(function() {
            $('#dataTable').DataTable(); // ID From dataTable
            $('#dataTableHover').DataTable(); // ID From dataTable with Hover
        });
    </script>
@endpush

@section('content')
    @if (Auth::user()->isAdmin == 1)
        <a href="/kategori/create" class="btn btn-info mb-3">Tambah Kategori</a>
    @endif

    <div class="col-lg-auto">
        <div class="card mb-4">

            <div class="table-responsive p-3">
                <table class="table align-items-center table-flush table-hover" id="dataTableHover">
                    <thead class="thead-light">
                        <tr>
                            <th scope="col">No.</th>
                            <th scope="col">Nama Kategori</th>
                            <th scope="col">Tombol Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($kategori as $key => $item)
                            <tr>
                                <th scope="row">{{ $key + 1 }}</th>
                                <td>{{ $item->nama }}</td>
                                <td>

                                    @if (Auth::user()->isAdmin == 1)
                                        <button class="btn btn-info"><a href="/kategori/{{ $item->id }}"
                                                style="text-decoration: none; color:white;"><i class="fa-solid fa-circle-info"></i></a></button>
                                        <button class="btn btn-warning"><a href="/kategori/{{ $item->id }}/edit"
                                                style="text-decoration: none;color:white"><i class="fa-solid fa-pen-to-square"></i></a></button>
                                        <button class="btn btn-danger"><a data-toggle="modal"
                                                data-target="#DeleteModal{{ $item->id }}"><i class="fa-solid fa-trash"></i></a></button>

                                        <!--Delete Modal -->
                                        <div class="modal fade" id="DeleteModal{{ $item->id }}" role="dialog"
                                            aria-labelledby="ModalLabelDelete" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="ModalLabelDelete">Ohh No!</h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <p>Are you sure you want to delete?</p>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-outline-primary"
                                                            data-dismiss="modal">Cancel</button>
                                                        <form action="/kategori/{{ $item->id }}" method="post" id="DeleteModal">
                                                            @csrf
                                                            @method('delete')
                                                            <input type="submit"
                                                             value="delete" class="btn btn-outline-danger">
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
            </div>
            @endif

            @if (Auth::user()->isAdmin == 0)
                <a href="/kategori/{{ $item->id }}" class="btn-sm btn-info px-3 py-2"
                    style="text-decoration: none;color:white">Detail</a>
            @endif

            </form>
            </td>
            </tr>
        @empty
            @endforelse
            </tbody>
            </table>
        </div>
    </div>
    </div>
@endsection
