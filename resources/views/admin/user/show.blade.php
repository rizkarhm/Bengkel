@extends('layouts.app')

@section('title', 'Detail User')

@section('contents')
    <ol class="breadcrumb px-3 py-2 rounded mb-4">
        <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{ route('user.index') }}">User</a></li>
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
                        <form action="{{ route('user.destroy', $users->id) }}" method="post">
                            <a href="{{ route('user.edit', $users) }}" class="btn btn-warning disabled">Edit</a>
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger ml-2 disabled">Hapus</button>
                        </form>
                    </div>
                    @else
                    <div class="card-footer">
                        <form action="{{ route('user.destroy', $users->id) }}" method="post">
                            <a href="{{ route('user.edit', $users) }}" class="btn btn-warning">Edit</a>
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger ml-2">Hapus</button>
                        </form>
                    </div>
                @endif
            </div>
        </div>
    </div>
    </form>
@endsection
