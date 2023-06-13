@extends('layouts.app')

@section('title', 'Data Kendaraan')

@section('contents')
    <ol class="breadcrumb px-3 py-2 rounded mb-4">
        <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}">Dashboard</a></li>
        <li class="breadcrumb-item active">Master Data Kendaraan</li>
    </ol>
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex">
            <!-- Topbar Search -->
            <form class="d-none d-sm-inline-block form-inline mr-auto md-3 my-2 my-md-0 mw-100 navbar-search">
                <div class="input-group">
                    <input type="text" class="form-control border-2 small" placeholder="Cari" id="cari"
                        aria-label="Search" aria-describedby="basic-addon2">
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="button">
                            <i class="fas fa-search fa-sm"></i>
                        </button>
                    </div>
                </div>
            </form>
            <a href="{{ route('kendaraan.create') }}" class="btn btn-primary">Tambah Kendaraan</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                @if ($message = Session::get('success'))
                    <div class="alert alert-success">
                        <p class="mb-0">{{ $message }}</p>
                    </div>
                @elseif ($message = Session::get('error'))
                    <div class="alert alert-danger">
                        <p class="mb-0">{{ $message }}</p>
                    </div>
                @endif
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead class="text-bold text-center" style="color:blue">
                        <tr>
                            <th style="width: 40px;">No</th>
                            <th>Logo</th>
                            <th>Merek Kendaraan</th>
                            <th style="width: 200px;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($kendaraans->count())
                            @php
                                $no = ($kendaraans->currentPage() - 1) * $kendaraans->perPage() + 1;
                            @endphp
                            @foreach ($kendaraans as $key => $row)
                                <tr>
                                    <td class="text-center">{{ $no++ }}</td>
                                    <td class="text-center">
                                        @if ($row->gambar)
                                            <img src="{{ asset('storage/' . $row->gambar) }}"
                                                class="img-account-profile rounded rounded-4 mb-2 img-fluid"
                                                style="height:80px" />
                                        @else
                                            <img src="{{ asset('img/no-image.png') }}"
                                                class="img-account-profile rounded rounded-4 mb-2 img-fluid"
                                                style="height:80px" />
                                        @endif
                                    </td>
                                    <td>{{ $row->merek }}</td>
                                    <td class="text-center">
                                        <a href="{{ route('kendaraan.edit', $row->id) }}" class="btn btn-warning">Edit</a>
                                        <button class="btn btn-danger ml-2" data-toggle="modal"
                                            data-target="#deleteModal-{{ $row->id }}" class="delete-item">
                                            Hapus
                                        </button>

                                        <div class="modal fade text-left" id="deleteModal-{{ $row->id }}"
                                            tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel"
                                            aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="deleteModalLabel">Konfirmasi Hapus Data
                                                        </h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <p>Anda yakin ingin menghapus data {{ $row->merek }}?</p>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-dismiss="modal">Batal</button>
                                                        <form action="{{ route('kendaraan.destroy', $row->id) }}"
                                                            method="POST" style="display: inline;">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-danger">Hapus</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                        @empty($row)
                                    <tr>
                                        <td colspan="4" class="text-center">No Data</td>
                                    </tr>
                                @endempty
                    </tbody>
                </table>
            </div>
            @if ($kendaraans->count() != 0)
                <div class="d-none flex-sm-fill d-sm-flex align-items-sm-center justify-content-sm-between">
                    <div class="datatable-info">Showing {{ $kendaraans->firstItem() }} to {{ $kendaraans->lastItem() }} of
                        {{ $kendaraans->total() }} entries</div>
                    <nav class="datatable-pagination">
                        {!! $kendaraans->links() !!}</nav>
                </div>
            @endif
        </div>
    </div>
@endsection
