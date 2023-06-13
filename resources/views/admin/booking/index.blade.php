@extends('layouts.app')

@section('title', 'Data Booking')
<style>
    .filter {
        width: 100%
    }

    select {
        -webkit-appearance: none;
        appearance: none;
    }

    @-moz-document url-prefix() {
        .filter {
            border: 1px solid #000;
            border-radius: 4px;
            box-sizing: border-box;
            position: relative;
            overflow: hidden;
        }

        .filter select {
            width: 110%;
            background-position: right 30px center !important;
            border: none !important;
        }
    }
</style>

@section('contents')
    <ol class="breadcrumb px-3 py-2 rounded mb-4">
        <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}">Dashboard</a></li>
        <li class="breadcrumb-item active">Book Appointment</li>
    </ol>
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between">
            <!-- Topbar Search -->
            <form class="d-none d-sm-inline-block form-inline my-2 my-md-0 mw-50 navbar-search mr-2">
                <div class="input-group">
                    <input type="text" class="form-control border-2 small" placeholder="Cari" name="search"
                        aria-label="Search" aria-describedby="basic-addon2" style="max-width: 400px">
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="button">
                            <i class="fas fa-search fa-sm"></i>
                        </button>
                    </div>
                </div>
            </form>

            <div class="right">
                @if (auth()->user()->role == 'Admin')
                    <form class="d-none d-sm-inline-block form-inline my-md-0 mr-2 mw-100"
                        action="{{ route('booking.index') }}" method="GET">
                        <div class="input-group filter">
                            <select name="filter" class="form-control">
                                <option value="" selected disabled hidden>Filter by Status</option>
                                <option value="Booked" {{ request('filter') == 'Booked' ? ' selected' : '' }}>Booked
                                </option>
                                <option value="In Queue" {{ request('filter') == 'In Queue' ? ' selected' : '' }}>In Queue
                                </option>
                                <option value="Proccessed" {{ request('filter') == 'Proccessed' ? ' selected' : '' }}>
                                    Proccessed
                                </option>
                                {{-- <option value="Done" {{ request('filter') ==  'Done' ? ' selected' : '' }}>Done
                            </option>
                            <option value="Canceled" {{ request('filter') ==  'Canceled' ? ' selected' : '' }}>Canceled
                            </option> --}}
                            </select>
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="submit">
                                    <i class="fas fa-filter fa-sm"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                @endif

                @if (auth()->user()->role != 'Magang' && auth()->user()->role != 'Mekanik')
                    <a href="{{ route('booking.create') }}" class="btn btn-primary ">Buat Appointment</a>
                @endif
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                @if ($message = Session::get('success'))
                    <div class="alert alert-success">
                        <p class="mb-0">{{ $message }}</p>
                    </div>
                @elseif($message = Session::get('error'))
                    <div class="alert alert-danger">
                        <p class="mb-0">{{ $message }}</p>
                    </div>
                @endif
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead class="text-bold text-center" style="color:blue">
                        <tr>
                            <th style="width: 40px;">No</th>
                            {{-- <th style="width: 40px;">ID</th> --}}
                            @if (auth()->user()->role != 'Customer')
                                <th>Nama Customer</th>
                            @endif
                            <th>Merek</th>
                            <th>Model</th>
                            <th>Nomor Polisi</th>
                            <th>Tanggal Masuk</th>
                            <th>Status</th>
                            <th style="width: 200px;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>

                        {{-- View for role customer --}}
                        @if (auth()->user()->role == 'Customer')
                            @php
                                $no = ($bookings_user->currentPage() - 1) * $bookings_user->perPage() + 1;
                            @endphp
                            @foreach ($bookings_user as $row)
                                <tr>
                                    <td class="text-center">{{ $no++ }}</td>
                                    {{-- <td class="text-center">{{ $row->id }}</td> --}}
                                    {{-- <td>{{ $row->user->nama }}</td> --}}
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
                                        <a href="{{ route('booking.show', $row->id) }}" class="btn btn-success">Detail</a>
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
                                                        <h5 class="modal-title" id="deleteModalLabel">Konfirmasi Hapus
                                                            Data
                                                        </h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <p>Anda yakin ingin menghapus data booking dengan ID
                                                            {{ $row->id }}?</p>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-dismiss="modal">Batal</button>
                                                        <form action="{{ route('booking.destroy', $row->id) }}"
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

                            {{-- View for role magang --}}
                        @elseif (auth()->user()->role == 'Magang')
                            @php
                                $no = ($bookings_pic->currentPage() - 1) * $bookings_pic->perPage() + 1;
                            @endphp
                            @foreach ($bookings_pic as $row)
                                <tr>
                                    <td class="text-center">{{ $no++ }}</td>
                                    {{-- <td class="text-center">{{ $row->id }}</td> --}}
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

                            {{-- View for role mekanik --}}
                        @elseif (auth()->user()->role == 'Mekanik')
                            @php
                                $no = ($bookings_mekanik->currentPage() - 1) * $bookings_mekanik->perPage() + 1;
                            @endphp
                            @foreach ($bookings_mekanik as $row)
                                <tr>
                                    <td class="text-center">{{ $no++ }}</td>
                                    {{-- <td class="text-center">{{ $row->id }}</td> --}}
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
                                        {{-- <button class="btn btn-danger ml-2" data-toggle="modal"
                                                data-target="#deleteModal-{{ $row->id }}" class="delete-item">
                                                Hapus
                                            </button> --}}

                                        <div class="modal fade text-left" id="deleteModal-{{ $row->id }}"
                                            tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel"
                                            aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="deleteModalLabel">Konfirmasi Hapus
                                                            Data
                                                        </h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <p>Anda yakin ingin menghapus data booking customer
                                                            {{ $row->user->nama }}?</p>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-dismiss="modal">Batal</button>
                                                        <form action="{{ route('booking.destroy', $row->id) }}"
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

                            {{-- View for role admin & mekanik --}}
                        @else
                            @php
                                $no = ($bookings->currentPage() - 1) * $bookings->perPage() + 1;
                            @endphp
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
                                        <a href="{{ route('detail.booking', ['id' => $row->id, 'nopol' => $row->nopol]) }}"
                                            class="btn btn-success">Detail</a>
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
                                                        <h5 class="modal-title" id="deleteModalLabel">Konfirmasi Hapus
                                                            Data
                                                        </h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <p>Anda yakin ingin menghapus data booking customer
                                                            {{ $row->user->nama }}?</p>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-dismiss="modal">Batal</button>
                                                        <form action="{{ route('booking.destroy', $row->id) }}"
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

                        {{-- @endif --}}
                    </tbody>
                </table>
            </div>
            @if (auth()->user()->role == 'Admin')
                @if ($bookings->count() != 0)
                    <div class="d-none flex-sm-fill d-sm-flex align-items-sm-center justify-content-sm-between">
                        <div class="datatable-info">Showing {{ $bookings->firstItem() }} to {{ $bookings->lastItem() }}
                            of
                            {{ $bookings->total() }} entries</div>
                        <nav class="datatable-pagination">
                            {!! $bookings->links() !!}</nav>
                    </div>
                @endif
            @elseif (auth()->user()->role == 'Customer')
                @if ($bookings_user->count() != 0)
                    <div class="d-none flex-sm-fill d-sm-flex align-items-sm-center justify-content-sm-between">
                        <div class="datatable-info">Showing {{ $bookings_user->firstItem() }} to
                            {{ $bookings_user->lastItem() }} of
                            {{ $bookings_user->total() }} entries</div>
                        <nav class="datatable-pagination">
                            {!! $bookings_user->links() !!}</nav>
                    </div>
                @endif
            @elseif (auth()->user()->role == 'Magang')
                @if ($bookings_pic->count() != 0)
                    <div class="d-none flex-sm-fill d-sm-flex align-items-sm-center justify-content-sm-between">
                        <div class="datatable-info">Showing {{ $bookings_pic->firstItem() }} to
                            {{ $bookings_pic->lastItem() }} of
                            {{ $bookings_pic->total() }} entries</div>
                        <nav class="datatable-pagination">
                            {!! $bookings_pic->links() !!}</nav>
                    </div>
                @endif
            @elseif (auth()->user()->role == 'Mekanik')
                @if ($bookings_mekanik->count() != 0)
                    <div class="d-none flex-sm-fill d-sm-flex align-items-sm-center justify-content-sm-between">
                        <div class="datatable-info">Showing {{ $bookings_mekanik->firstItem() }} to
                            {{ $bookings_mekanik->lastItem() }} of
                            {{ $bookings_mekanik->total() }} entries</div>
                        <nav class="datatable-pagination">
                            {!! $bookings_mekanik->links() !!}</nav>
                    </div>
                @endif
            @else
                @if ($bookings->count() != 0)
                    <div class="d-none flex-sm-fill d-sm-flex align-items-sm-center justify-content-sm-between">
                        <div class="datatable-info">Showing {{ $bookings->firstItem() }} to
                            {{ $bookings->lastItem() }} of
                            {{ $bookings->total() }} entries</div>
                        <nav class="datatable-pagination">
                            {!! $bookings->links() !!}</nav>
                    </div>
                @endif
            @endif
        </div>
    </div>
@endsection
