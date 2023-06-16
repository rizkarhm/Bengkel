@extends('layouts.app')

@section('title', 'Data Feedback')

<head>
    <style>
        .rate {
            float: left;
            height: 30px;
            padding-top: 0;
        }

        .rate:not(:checked)>input {
            position: absolute;
            display: none;
        }

        .rate:not(:checked)>label {
            float: right;
            width: 1em;
            overflow: hidden;
            white-space: nowrap;
            cursor: pointer;
            font-size: 20px;
            color: #ccc;
        }

        .rated:not(:checked)>label {
            float: right;
            width: 1em;
            overflow: hidden;
            white-space: nowrap;
            cursor: pointer;
            font-size: 20px;
            color: #ccc;
        }

        .rate:not(:checked)>label:before {
            content: '★ ';
        }

        .rate>input:checked~label {
            color: #ffc700;
        }

        .star-rating-complete {
            color: #c59b08;
        }

        .rating-container,
        .rating-container .form-control:focus {
            background: #fff;
            border: 1px solid #ced4da;
        }

        .rating-container textarea:focus,
        .rating-container input:focus {
            color: #000;
        }

        .rated {
            float: left;
            height: 46px;
            padding: 0 10px;
        }

        .rated:not(:checked)>input {
            position: absolute;
            display: none;
        }


    </style>
</head>

@section('contents')
    <ol class="breadcrumb px-3 py-2 rounded mb-4">
        <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}">Dashboard</a></li>
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
                            {{-- <th style="width: 40px;">No</th> --}}
                            <th style="width: 40px;">ID Booking</th>
                            @if (auth()->user()->role != 'Customer')
                            <th>Nama Customer</th>
                        @endif
                            <th>Rating</th>
                            <th>Feedback</th>
                            <th style="width: 150px;">Created At</th>
                            <th style="width: 200px; color:blue">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        {{-- list untuk customer, feedback yg ditampilkan sesuai dengan user auth id --}}
                        @if (auth()->user()->role == 'Customer')
                            @php
                                $no = ($feedbacks_user->currentPage() - 1) * $feedbacks_user->perPage() + 1;
                            @endphp
                            @foreach ($feedbacks_user as $key => $row)
                                <tr>
                                    <td class="text-center">{{ $no++ }}</td>
                                    {{-- <td class="text-center">{{ $row->booking_id }}</td> --}}
                                    {{-- <td>{{ $row->booking->user->nama }}</td> --}}
                                    {{-- <td class="text-center">{{ $row->rating }}</td> --}}
                                    <td>
                                        <div class="col">
                                            <div class="rate p-0">
                                                <input type="radio" id="star5" class="rate" name="rating" value="5" @if ( $row->rating == 5)  @checked(true) @endif disabled/><label for="star5" title="text">5 stars</label>

                                                <input type="radio" id="star4" class="rate" name="rating" value="4" @if ($row->rating == 4)  @checked(true) @endif disabled/>
                                                <label for="star4" title="text">4 stars</label>

                                                <input type="radio" id="star3" class="rate" name="rating" value="3" @if ($row->rating == 3)  @checked(true) @endif disabled/><label for="star3" title="text">3 stars</label>

                                                <input type="radio" id="star2" class="rate" name="rating" value="2" @if ($row->rating == 2)  @checked(true) @endif disabled/><label for="star2" title="text">2 stars</label>

                                                <input type="radio" id="star1" class="rate" name="rating" value="1" @if ($row->rating == 1)  @checked(true) @endif disabled/><label for="star1" title="text">1 stars</label>
                                            </div>
                                        </div>
                                    </div>
                                    </td>
                                    <td>{{ $row->feedback }}</td>
                                    <td>{{ $row->created_at }}</td>
                                    <td class="text-center">
                                        <a href="{{ route('feedback.show', $row->id) }}" class="btn btn-success">Detail</a>
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
                                                        <p>Anda yakin ingin menghapus data feedback untuk ID Booking
                                                            {{ $row->booking_id }}?</p>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-dismiss="modal">Batal</button>
                                                        <form action="{{ route('feedback.destroy', $row->id) }}"
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

                            {{-- menampilkan feedback dengan PIC == user auth --}}
                        @elseif (auth()->user()->role == 'Magang')
                            @php
                                $no = ($feedbacks->currentPage() - 1) * $feedbacks->perPage() + 1;
                            @endphp
                            @foreach ($feedbacks as $key => $row)
                                @if ($row->booking->pic_id == auth()->user()->id)
                                    <tr>
                                        {{-- <td class="text-center">{{ $no++ }}</td> --}}
                                        <td class="text-center">{{ $row->booking_id }}</td>
                                        <td>{{ $row->booking->user->nama }}</td>
                                        <td class="text-center">{{ $row->rating }}</td>
                                        <td>{{ $row->feedback }}</td>
                                        <td>{{ $row->created_at }}</td>
                                        <td class="text-center">
                                            <a href="{{ route('feedback.show', $row->id) }}"
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
                                                            <p>Anda yakin ingin menghapus data feedback dari customer
                                                                {{ $row->booking->user->nama }}?</p>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-dismiss="modal">Batal</button>
                                                            <form action="{{ route('feedback.destroy', $row->id) }}"
                                                                method="POST" style="display: inline;">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit"
                                                                    class="btn btn-danger">Hapus</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endif
                            @endforeach

                            {{-- menampilkan all feedback, untuk role admin & mekanik --}}
                        @else
                            @php
                                $no = ($feedbacks->currentPage() - 1) * $feedbacks->perPage() + 1;
                            @endphp
                            @foreach ($feedbacks as $key => $row)
                                <tr>
                                    {{-- <td class="text-center">{{ $no++ }}</td> --}}
                                    <td class="text-center">{{ $row->booking_id }}</td>
                                    <td>{{ $row->booking->user->nama }}</td>
                                    <td class="text-center">{{ $row->rating }}</td>
                                    <td>{{ $row->feedback }}</td>
                                    <td>{{ $row->created_at }}</td>
                                    <td class="text-center">
                                        <a href="{{ route('feedback.show', $row->id) }}"
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
                                                        <p>Anda yakin ingin menghapus data feedback dari customer
                                                            {{ $row->booking->user->nama }}?</p>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-dismiss="modal">Batal</button>
                                                        <form action="{{ route('feedback.destroy', $row->id) }}"
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
                                        <td colspan="6" class="text-center">No Data</td>
                                    </tr>
                                @endempty
                    </tbody>
                </table>
            </div>
            @if (auth()->user()->role == 'Customer')
                <div class="d-none flex-sm-fill d-sm-flex align-items-sm-center justify-content-sm-between">
                    <div class="datatable-info">Showing {{ $feedbacks_user->firstItem() }} to
                        {{ $feedbacks_user->lastItem() }} of
                        {{ $feedbacks_user->total() }} entries</div>
                    <nav class="datatable-pagination">
                        {!! $feedbacks_user->links() !!}</nav>
                </div>
            @elseif (auth()->user()->role == 'Magang')
                {{-- no pagination --}}
                <div></div>
            @else
                <div class="d-none flex-sm-fill d-sm-flex align-items-sm-center justify-content-sm-between">
                    <div class="datatable-info">Showing {{ $feedbacks->firstItem() }} to
                        {{ $feedbacks->lastItem() }} of
                        {{ $feedbacks->total() }} entries</div>
                    <nav class="datatable-pagination">
                        {!! $feedbacks->links() !!}</nav>
                </div>
            @endif
        </div>
    </div>
@endsection
