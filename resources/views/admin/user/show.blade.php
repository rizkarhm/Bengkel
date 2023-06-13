@extends('layouts.app')

@section('title', 'Detail User')

@section('contents')
    <ol class="breadcrumb px-3 py-2 rounded mb-4">
        <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{ route('akun.index') }}">User</a></li>
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
                    <div class="form-group">
                        <label for="role">Role</label>
                        <select name="role" id="role" class="custom-select" disabled>
                            <option value="" selected disabled hidden>-- Pilih Role --</option>
                            <option value="Customer" @selected(isset($users) ? $users->role == 'Customer' : old('status') == 'Customer')>
                                Customer</option>
                            <option value="Admin" @selected(isset($users) ? $users->role == 'Admin' : old('status') == 'Admin')>Admin
                            </option>
                            <option value="Mekanik" @selected(isset($users) ? $users->role == 'Mekanik' : old('status') == 'Mekanik')>Mekanik
                            </option>
                            <option value="Magang" @selected(isset($users) ? $users->role == 'Magang' : old('status') == 'Magang')>Magang
                            </option>
                        </select>
                    </div>
                </div>

                @if (auth()->user()->id == $users->id)
                    <div class="card-footer">
                        <a href="{{ route('akun.edit', $users) }}" class="btn btn-warning disabled">Edit</a>
                        <button type="submit" class="btn btn-danger ml-2 disabled">Hapus</button>
                    </div>
                @else
                    <div class="card-footer">
                        <a href="{{ route('akun.edit', $users->id) }}" class="btn btn-warning">Edit</a>
                        <button class="btn btn-danger ml-2" data-toggle="modal"
                            data-target="#deleteModal-{{ $users->id }}" class="delete-item">
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
                                        <p>Anda yakin ingin menghapus data user {{ $users->nama }}?</p>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                        <form action="{{ route('akun.destroy', $users->id) }}" method="POST"
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
                @endif
            </div>
        </div>
    </div>
    </form>
@endsection
