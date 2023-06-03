@extends('layouts.app')

@section('title', 'Edit Profile User')

@section('contents')
    <ol class="breadcrumb px-3 py-2 rounded mb-4">
        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{ route('profile.index') }}">Profie</a></li>
        <li class="breadcrumb-item active">Edit</li>
    </ol>
    <form action="{{ route('profile.update', auth()->user()->id) }}" method="post">
        @csrf

        @method('PUT')
    <div class="row">
        <div class="col-12">
            <div class="card shadow mb-4">
                <div class="card-body">
                    <div class="form-group">
                        <label for="nama">Nama Lengkap<span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="nama" name="nama"
                            value="{{ auth()->user()->nama }}">
                        @error('nama')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="telepon">Nomor Whatsapp<span class="text-danger">*</span></label>
                        <input type="number" class="form-control" id="telepon" name="telepon"
                            value="{{ auth()->user()->telepon }}">
                        @error('telepon')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="alamat">Alamat</label>
                        <textarea type="text" row=3 class="form-control" id="alamat" name="alamat">{{ auth()->user()->alamat }}</textarea>
                        @error('alamat')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="role">Role<span class="text-danger">*</span></label>
                        <select name="role" id="role" class="custom-select">
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
                        @error('role')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <i>
                        <h6 class="m-0 font-weight-bold text-danger bold mb-2 mt-4">
                            Isi jika Anda ingin merubah password</h6>
                    </i>
                    <div class="row gx-3">
                        <div class="form-group col-md-6">
                            <label for="password">Password<span class="text-danger">*</span></label>
                            <input type="password" class="form-control" id="password" name="password"
                                value="{{ old('password') }}">
                            @error('password')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label for="password_confirmation">Konfirmasi Password<span class="text-danger">*</span></label>
                            <input type="password" class="form-control" id="password_confirmation"
                                name="password_confirmation" value="{{ old('password_confirmation') }}">
                        </div>
                        @error('password_confirmation')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </div>
        </div>
    </div>
</form>

    <div class="footer">
        <h5 class="text-danger">*confirmation delete data | user yang memiliki kaitan dengan tabel lain tidak dapat
            dihapus</h5>
    </div>
@endsection
