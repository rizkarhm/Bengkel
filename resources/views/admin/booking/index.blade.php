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
                    <input type="text" class="form-control border-2 small" placeholder="Cari" id="cari"
                        aria-label="Search" aria-describedby="basic-addon2">
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
                @if ($message = Session::get('success'))
                    <div class="alert alert-success">
                        <p class="mb-0">{{ $message }}</p>
                    </div>
                @endif
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead class="text-bold text-center" style="color:blue">
                        <tr>
                            <th style="width: 40px;">ID</th>
                            <th>Nama Customer</th>
                            <th>Merek</th>
                            <th>Model</th>
                            <th>Nomor Polisi</th>
                            <th>Tanggal Masuk</th>
                            <th>Status</th>
                            <th style="width: 200px;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (isset($all))
                            @php($no = 1)

                            @if (auth()->user()->role == 'Admin' || 'Mekanik')
                                @foreach ($all as $row)
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
                                            <a href="{{ route('booking.show', $row->id) }}"
                                            class="btn btn-success">Detail</a>
                                        </td>
                                    </tr>
                                @endforeach
                            @elseif (auth()->user()->role == 'Customer')
                                @foreach ($bookings_user as $row)
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
                                                <button type="submit" class="btn btn-danger ml-2">Hapus</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach

                                @elseif (auth()->user()->role == 'Magang' )
                                @foreach ($bookings_pic as $row)
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
                                                <button type="submit" class="btn btn-danger ml-2">Hapus</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            @endif

                        @endif
                    </tbody>
                </table>
            </div>
            @if ($all->count() != 0)
                <div class="d-none flex-sm-fill d-sm-flex align-items-sm-center justify-content-sm-between">
                    <div class="datatable-info">Showing {{ $all->firstItem() }} to {{ $all->lastItem() }} of
                        {{ $all->total() }} entries</div>
                    <nav class="datatable-pagination">
                        {!! $all->links() !!}</nav>
                </div>
            @endif
        </div>
    </div>
    <div class="footer">
        <h5 class="text-danger">*confirmation delete data</h5>
    </div>
@endsection
