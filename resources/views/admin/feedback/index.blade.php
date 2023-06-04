@extends('layouts.app')

@section('title', 'Data Feedback')

@section('contents')
    <ol class="breadcrumb px-3 py-2 rounded mb-4">
        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
        <li class="breadcrumb-item active">Feedback</li>
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
            <a href="{{ route('feedback.create') }}" class="btn btn-primary">Tambah Feedback</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead class="text-bold text-center" style="color:blue">
                        <tr>
                            {{-- <th style="width: 40px;">No</th> --}}
                            <th style="width: 90px;">ID Booking</th>
                            <th>Nama Customer</th>
                            <th style="width: 60px;">Rating</th>
                            <th>Feedback</th>
                            <th style="width: 150px;">Created At</th>
                            <th style="width: 200px; color:blue">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php($no = 1)
                        @foreach ($feedbacks as $key => $row)
                            <tr>
                                {{-- <td class="text-center">{{ $no++ }}</td> --}}
                                <td class="text-center">{{ $row->booking_id }}</td>
                                <td>{{ $row->booking->user->nama }}</td>
                                <td class="text-center">{{ $row->rating }}</td>
                                <td>{{ $row->feedback }}</td>
                                <td>{{ $row->created_at }}</td>
                                <td class="text-center">
                                    <form action="{{ route('feedback.destroy', $row->id) }}" method="post">
                                        <a href="{{ route('feedback.show', $row->id) }}"
                                            class="btn btn-success">Detail</a>
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger ml-2">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="footer">
                <h5 class="text-danger">*confirmation delete data</h5>
            </div>
        </div>
    </div>
@endsection
