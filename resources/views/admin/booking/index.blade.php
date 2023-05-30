@extends('layouts.app')

@section('title', 'Data Booking')

@section('contents')
    <ol class="breadcrumb px-3 py-2 rounded mb-4">
        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
        <li class="breadcrumb-item active">Book Appointment</li>
    </ol>
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex">
            <!-- Topbar Search -->
            <form class="d-none d-sm-inline-block form-inline mr-auto md-3 my-2 my-md-0 mw-100 navbar-search">
                <div class="input-group">
                    <input type="text" class="form-control border-2 small" placeholder="Cari" id="cari" aria-label="Search"
                        aria-describedby="basic-addon2">
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="button">
                            <i class="fas fa-search fa-sm"></i>
                        </button>
                    </div>
                </div>
            </form>
            <a href="{{ route('booking.create') }}" class="btn btn-primary">Buat Appointment</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead class="text-bold text-center">
                        <tr>
                            {{-- <th style="width: 40px; color:blue">No</th> --}}
                            <th style="width: 40px; color:blue">ID</th>
                            <th>@sortablelink('Nama Customer')</th>
                            <th>@sortablelink('Merek')</th>
                            <th>@sortablelink('Model')</th>
                            <th>@sortablelink('Nomor Polisi')</th>
                            <th>@sortablelink('Tanggal Masuk')</th>
                            <th>@sortablelink('Status')</th>
                            <th style="width: 200px; color:blue">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($bookings->count())
                            @php($no = 1)
                            @foreach ($bookings as $row)
                                <tr>
                                    {{-- <td class="text-center">{{ $no++ }}</td> --}}
                                    <td class="text-center">{{ $row->id }}</td>
                                    <td>{{ $row->user->nama }}</td>
                                    <td>{{ $row->kendaraan->merek }}</td>
                                    <td>{{ $row->model }}</td>
                                    <td>{{ $row->nopol }}</td>
                                    <td>{{ $row->tgl_masuk }}</td>
                                    <td>
                                        @if ($row->status == 'Booked')
                                            <div class="text-white rounded-pill py-2 px-2 badge bg-secondary">
                                                {{ $row->status }}</div>
                                        @elseif ($row->status == 'Done')
                                            <div class="text-white rounded-pill py-2 px-2 badge bg-success">
                                                {{ $row->status }}</div>
                                        @elseif ($row->status == 'In Queue')
                                            <div class="text-white rounded-pill py-2 px-2 badge bg-warning">
                                                {{ $row->status }}</div>
                                        @elseif ($row->status == 'Proccessed')
                                            <div class="text-white rounded-pill py-2 px-2 badge bg-info">
                                                {{ $row->status }}</div>
                                        @elseif ($row->status == 'Canceled')
                                            <div class="text-white rounded-pill py-2 px-2 badge bg-danger">
                                                {{ $row->status }}</div>
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        <form action="{{ route('booking.destroy', $row->id) }}" method="post">
                                            <a href="{{ route('booking.show', $row->id) }}"
                                                class="btn btn-success">Detail</a>
                                            @csrf
                                            @method('DELETE')
                                            {{-- <button type="submit" class="btn btn-danger ml-2">Hapus</button> --}}
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
