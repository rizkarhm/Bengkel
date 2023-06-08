@extends('layouts.app')

@section('title', 'Data Customer')

@section('contents')
    <ol class="breadcrumb px-3 py-2 rounded mb-4">
        <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}">Dashboard</a></li>
        <li class="breadcrumb-item active">Customer</li>
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
            {{-- <a href="{{ route('user.create') }}" class="btn btn-primary">Tambah User</a> --}}
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
                            <th>Nama</th>
                            <th>Nomor Whatsapp</th>
                            <th>Tanggal Bergabung</th>
                            <th style="width: 200px;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($users->count())
                            @php
                                $no = ($users->currentPage() - 1) * $users->perPage() + 1;
                            @endphp
                            @foreach ($users as $key => $row)
                                @if (auth()->user()->telepon != $row->telepon)
                                    <tr>
                                        <td class="text-center">{{ $no++ }}</td>
                                        <td data-index="{{ $row->id }}">{{ $row->nama }}</td>
                                        <td>{{ $row->telepon }}</td>
                                        <td>
                                            {{ $row->created_at }}
                                        </td>
                                        <td class="text-center">
                                            <a href="{{ route('customer.show', $row->id) }}"
                                                class="btn btn-success">Detail</a>
                                        </td>
                                    </tr>
                                @endif
                            @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
            <div class="d-none flex-sm-fill d-sm-flex align-items-sm-center justify-content-sm-between">
                <div class="datatable-info">Showing {{ $users->firstItem() }} to
                    {{ $users->lastItem() }} of
                    {{ $users->total() }} entries</div>
                <nav class="datatable-pagination">
                    {!! $users->links() !!}</nav>
            </div>
        </div>
    </div>
@endsection
