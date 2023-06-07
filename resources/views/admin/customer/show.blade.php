@extends('layouts.app')

@section('title', 'Detail Customer')

@section('contents')
    <ol class="breadcrumb px-3 py-2 rounded mb-4">
        <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{ route('customer.index') }}">Customer</a></li>
        <li class="breadcrumb-item active">Detail</li>
    </ol>
    <div class="row">
        <div class="col-12">
            <div class="card shadow mb-4">
                <div class="card-header">Detail User</div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="nama">Nama Lengkap</label>
                        <input type="text" class="form-control" id="nama" name="nama"
                            value="{{ isset($users) ? $users->nama : '' }}" disabled>
                    </div>
                    <div class="form-group">
                        <label for="telepon">Nomor Whatsapp</label>
                        <input type="number" class="form-control" id="telepon" name="telepon"
                            value="{{ isset($users) ? $users->telepon : '' }}" disabled>
                    </div>
                    <div class="form-group">
                        <label for="alamat">Alamat</label>
                        <textarea disabled type="text" row=3 class="form-control" id="alamat" name="alamat">{{ isset($users) ? $users->alamat : '' }}</textarea>
                    </div>
                </div>

                <div class="card-footer">
                    <a href="{{ route('customer.edit', $users->id) }}" class="btn btn-warning">Edit</a>
                    <button class="btn btn-danger ml-2" data-toggle="modal" data-target="#deleteModal-{{ $users->id }}"
                        class="delete-item">
                        Hapus
                    </button>
                    <div class="modal fade text-left" id="deleteModal-{{ $users->id }}" tabindex="-1" role="dialog"
                        aria-labelledby="deleteModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="deleteModalLabel">Konfirmasi Hapus Data
                                    </h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <p>Anda yakin ingin menghapus data customer {{ $users->nama }}?</p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                    <form action="{{ route('customer.destroy', $users->id) }}" method="POST"
                                        style="display: inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Hapus</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </form>
@endsection
