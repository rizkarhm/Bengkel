@extends('layouts.app')

@section('title', 'Profile User')

@section('contents')
    <ol class="breadcrumb px-3 py-2 rounded mb-4">
        <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}">Dashboard</a></li>
        <li class="breadcrumb-item active">Profile</li>
    </ol>
    <div class="row">
        <div class="col-12">
            <div class="card shadow mb-4">
                <div class="card-header">Detail User</div>
                <div class="card-body">
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p class="mb-0">{{ $message }}</p>
                        </div>
                    @endif
                    <div class="form-group">
                        <label for="nama">Nama Lengkap<span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="nama" name="nama" disabled
                            value="{{ auth()->user()->nama }}">
                    </div>
                    <div class="form-group">
                        <label for="telepon">Nomor Whatsapp<span class="text-danger">*</span></label>
                        <input type="number" class="form-control" id="telepon" name="telepon" disabled
                            value="{{ auth()->user()->telepon }}">
                    </div>
                    <div class="form-group">
                        <label for="alamat">Alamat</label>
                        <textarea type="text" row=3 class="form-control" id="alamat" name="alamat" disabled>{{ auth()->user()->alamat }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="role">Role<span class="text-danger">*</span></label>
                        <select name="role" id="role" class="custom-select" disabled>
                            <option value="" selected disabled hidden>Pilih Role</option>
                            <option value="Customer" @selected(auth()->user()->role == 'Customer')>Customer
                            </option>
                            <option value="Admin" @selected(auth()->user()->role == 'Admin')>Admin
                            </option>
                            <option value="Mekanik" @selected(auth()->user()->role == 'Mekanik')>Mekanik
                            </option>
                            <option value="Magang" @selected(auth()->user()->role == 'Magang')>Magang
                            </option>
                        </select>
                    </div>
                </div>
                <div class="card-footer">
                    <a href="{{ route('profile.edit', auth()->user()->id) }}" class="btn btn-warning">Edit Profile</a>
                </div>
            </div>
        </div>
    </div>

    <div class="footer">
        <h5 class="text-danger">*confirmation delete data | user yang memiliki kaitan dengan tabel lain tidak dapat
            dihapus</h5>
    </div>
@endsection
