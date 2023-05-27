@extends('layouts.app')

@section('title', isset($users) ? 'Form Edit User' : 'Form Tambah User')

@section('contents')
    <ol class="breadcrumb px-3 py-2 rounded mb-4">
        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{ route('user.index') }}">User</a></li>
        <li class="breadcrumb-item active">
            {{ isset($users) ? 'Edit' : 'Tambah' }}</li>
    </ol>
    <form action="{{ isset($users) ? route('user.update', $users->id) : route('user.store') }}" method="post">
        @csrf

        {{-- if user exist, method edit: put --}}
        @method(isset($users) ? 'PUT' : '')

        <div class="row">
            <div class="col-12">
                <div class="card shadow mb-4">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="nama">Nama Lengkap<span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="nama" name="nama"
                                value="{{ isset($users) ? $users->nama : old('nama') }}">
                            @error('nama')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="telepon">Nomor Whatsapp<span class="text-danger">*</span></label>
                            <input type="number" class="form-control" id="telepon" name="telepon"
                                value="{{ isset($users) ? $users->telepon : old('telepon') }}">
                            @error('telepon')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="alamat">Alamat</label>
                            <textarea type="text" row=3 class="form-control" id="alamat" name="alamat">{{ isset($users) ? $users->alamat : old('alamat') }}</textarea>

                        </div>
                        <div class="form-group">
                            <label for="role">Role<span class="text-danger">*</span></label>
                            <select name="role" id="role" class="custom-select">
                                <option value="" selected disabled hidden>Pilih Role</option>
                                <option value="Customer" @selected(isset($users) ? $users->role == 'Customer' : old('role') == 'Customer')>Customer
                                </option>
                                <option value="Admin" @selected(isset($users) ? $users->role == 'Admin' : old('role') == 'Admin')>Admin
                                </option>
                                <option value="Mekanik" @selected(isset($users) ? $users->role == 'Mekanik' : old('role') == 'Mekanik')>Mekanik
                                </option>
                                <option value="Magang" @selected(isset($users) ? $users->role == 'Magang' : old('role') == 'Magang')>Magang
                                </option>
                            </select>
                            @error('role')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <i>
                            <h6 class="m-0 font-weight-bold text-danger bold mb-2 mt-4">
                                {{ isset($users) ? 'Isi jika Anda ingin merubah password' : '' }}</h6>
                        </i>
                        <div class="form-group">
                            <label for="password">Password<span class="text-danger">*</span></label>
                            <input type="password" class="form-control" id="password" name="password"
                                value="{{ old('password') }}">
                            @error('password')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="password_confirmation">Konfirmasi Password<span class="text-danger">*</span></label>
                            <input type="password" class="form-control" id="password_confirmation"
                                name="password_confirmation" value="{{ old('password_confirmation') }}">
                        </div>
                        @error('password_confirmation')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">{{ isset($kontaks) ? 'Update' : 'Simpan' }}</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
