@extends('layouts.app')

@section('title', 'Data Galeri')

@section('contents')
    <ol class="breadcrumb px-3 py-2 rounded mb-4">
        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
        <li class="breadcrumb-item active">Master Data Galeri</li>
    </ol>
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex">
            <!-- Topbar Search -->
            <form class="d-none d-sm-inline-block form-inline mr-auto md-3 my-2 my-md-0 mw-100 navbar-search">
                <div class="input-group">
                    <input type="text" class="form-control border-2 small" placeholder="Cari" aria-label="Search"
                        aria-describedby="basic-addon2">
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="button">
                            <i class="fas fa-search fa-sm"></i>
                        </button>
                    </div>
                </div>
            </form>
            <a href="{{ route('galeri.create') }}" class="btn btn-primary">Tambah Foto</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                @if ($message = Session::get('success'))
                    <div class="alert alert-success">
                        <p class="mb-0">{{ $message }}</p>
                    </div>
                @endif
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead class="text-bold text-center">
                        <tr>
                            <th style="width: 40px; color:blue">No</th>
                            <th style="color:blue">Gambar</th>
                            <th>@sortablelink('Keterangan')</th>
                            <th style="width: 200px; color:blue">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($galeris->count())
                            @php($no = 1)
                            @foreach ($galeris as $key => $row)
                                <tr>
                                    <td class="text-center">{{ $no++ }}</td>
                                    <td class="text-center">
                                        @if ($row->gambar)
                                            <img src="{{ asset('storage/' . $row->gambar) }}" class="img-account-profile rounded rounded-4 mb-2 img-fluid"
                                                style="height:80px" />
                                        @else
                                            <img src="{{ asset('img/no-image.png') }}" class="img-account-profile rounded rounded-4 mb-2 img-fluid"
                                                style="height:80px" />
                                        @endif
                                    </td>
                                    <td>{{ $row->keterangan }}</td>
                                    <td>

                                        {{-- <a href="{{ route('galeri.edit', $row->id) }}" class="btn btn-warning mt-2">Edit</a><br> --}}
                                        <form action="{{ route('galeri.destroy', $row->id) }}" method="post">
                                            <a href="{{ route('galeri.edit', $row->id) }}"
                                                class="btn btn-warning">Edit</a>
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Hapus</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
            <div class="footer">
                <h5 class="text-danger">*confirmation delete data</h5>
            </div>
        </div>
    </div>
@endsection
