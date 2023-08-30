@extends('layouts.app')

@section('title', 'DataTables')

@push('style')
    <!-- CSS Libraries -->
    {{-- <link rel="stylesheet"
        href="assets/modules/datatables/datatables.min.css">
    <link rel="stylesheet"
        href="assets/modules/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet"
        href="assets/modules/datatables/Select-1.2.4/css/select.bootstrap4.min.css"> --}}

    <link rel="stylesheet"
        href="{{ asset('library/datatables/media/css/jquery.dataTables.min.css') }}">
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Master Specimen AMS</h1>

            </div>

            <div class="section-body">

                <div class="row">
                    <div class="col-12">

                        <div class="card">

                            <div class="card-body">

                                @if (session('success'))
                                <div class="alert alert-success alert-dismissible show fade">
                                    <div class="alert-body">
                                        <button class="close"
                                            data-dismiss="alert">
                                            <span>&times;</span>
                                        </button>
                                        {{ session('success') }}
                                    </div>
                                </div>
                                @endif

                                @if (session('error'))
                                <div class="alert alert-danger alert-dismissible show fade">
                                    <div class="alert-body">
                                        <button class="close"
                                            data-dismiss="alert">
                                            <span>&times;</span>
                                        </button>
                                        {{ session('error') }}
                                    </div>
                                </div>
                                @endif

                                <div class="buttons">
                                    <a href="{{ route('posts.create') }}" class="btn btn-primary">Add Specimen</a>
                                    <a href="{{ route('export') }}" class="btn btn-success" target="_blank">EXPORT EXCEL</a>
                                    <a href="{{ route('exportpdf') }}" class="btn btn-danger" target="_blank">EXPORT PDF</a>
                                </div>
                                <br>
                                <div class="table-responsive">
                                    <table class="table-striped table"
                                        id="table-1">
                                        <thead>
                                            <tr>
                                                <th>Gambar</th>
                                                <th>Title</th>
                                                <th>Content</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            @forelse ($posts as $post)

                                            <tr>
                                                <td class="text-center">
                                                    <img src="{{ asset('/storage/posts/'.$post->image) }}" class="rounded" style="width: 50px">
                                                </td>
                                                <td>{{ $post->title }}</td>
                                                <td>{{ $post->content }}</td>
                                                <td align="right">
                                                    <form onsubmit="return confirm('Apakah Anda Yakin ?');" action  ="{{ route('posts.destroy', $post->id) }}" method="POST">
                                                        <a href="{{ route('posts.edit', $post->id) }}"
                                                            class="btn btn-primary">Edit</a>
                                                        <a href="{{ route('posts.show', $post->id) }}" class="btn btn-warning">SHOW</a>
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger">HAPUS</button>
                                                    </form>
                                                </td>
                                            </tr>

                                            @empty

                                            <tr>
                                                <td colspan="4">Data Specimen Tidak Tersedia!!!</td>
                                            </tr>

                                            @endforelse

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </section>
    </div>
@endsection

@push('scripts')
    <!-- JS Libraies -->
    {{-- <script src="assets/modules/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js"></script>
    <script src="assets/modules/datatables/Select-1.2.4/js/dataTables.select.min.js"></script> --}}
    <script src="{{ asset('library/datatables/media/js/jquery.dataTables.min.js') }}"></script>
    {{-- <script src="{{ asset() }}"></script> --}}
    {{-- <script src="{{ asset() }}"></script> --}}
    <script src="{{ asset('library/jquery-ui-dist/jquery-ui.min.js') }}"></script>

    <!-- Page Specific JS File -->
    <script src="{{ asset('js/page/modules-datatables.js') }}"></script>
@endpush
