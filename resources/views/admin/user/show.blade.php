@extends('layouts.app')

@section('title', 'Detail User')

@section('contents')
    <ol class="breadcrumb px-3 py-2 rounded mb-4">
        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{ route('user.index') }}">User</a></li>
        <li class="breadcrumb-item active">Detail</li>
    </ol>
    <div class="row">
        <div class="col-12">
            <div class="card shadow mb-4">
                <div class="card-body">
                    <div class="form-group">
                        <label for="nama">Nama Lengkap<span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="nama" name="nama"
                            value="{{ isset($users) ? $users->nama : '' }}" disabled>
                        @error('nama')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="telepon">Nomor Whatsapp<span class="text-danger">*</span></label>
                        <input type="number" class="form-control" id="telepon" name="telepon"
                            value="{{ isset($users) ? $users->telepon : '' }}" disabled>
                        @error('telepon')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="alamat">Alamat</label>
                        <textarea disabled type="text" row=3 class="form-control" id="alamat" name="alamat">{{ isset($users) ? $users->alamat : '' }}</textarea>

                    </div>
                    <div class="form-group">
                        <label for="role">Role<span class="text-danger">*</span></label>
                        <select name="role" id="role" class="custom-select" disabled>
                            <option value="" selected disabled hidden>-- Pilih Role --</option>
                            <option value="Customer" {{ isset($users) ? ($users->role ? 'selected' : '') : '' }}>
                                Customer</option>
                            <option value="Admin" {{ isset($users) ? ($users->role ? 'selected' : '') : '' }}>Admin
                            </option>
                            <option value="Mekanik" {{ isset($users) ? ($users->role ? 'selected' : '') : '' }}>Mekanik
                            </option>
                            <option value="Magang" {{ isset($users) ? ($users->role ? 'selected' : '') : '' }}>Magang
                            </option>
                        </select>
                        @error('role')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                @if (auth()->user()->telepon != $users->telepon)
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
