@extends('layouts.app')

@section('title', 'Form Edit Customer')

@section('contents')
    <ol class="breadcrumb px-3 py-2 rounded mb-4">
        <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{ route('customer.index') }}">Customer</a></li>
        <li class="breadcrumb-item active">Edit</li>
    </ol>
    <form action="{{ route('customer.update', $users->id)}}" method="post">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-12">
                <div class="card shadow mb-4">
                    <div class="card-header">Detail Customer</div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="nama">Nama Lengkap<span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="nama" name="nama" required
                                value="{{ isset($users) ? $users->nama : old('nama') }}">
                            @error('nama')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="telepon">Nomor Whatsapp<span class="text-danger">*</span></label>
                            <input type="number" class="form-control" id="telepon" name="telepon" required
                                value="{{ isset($users) ? $users->telepon : old('telepon') }}">
                            @error('telepon')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="alamat">Alamat</label>
                            <textarea type="text" row=3 class="form-control" id="alamat" name="alamat">{{ isset($users) ? $users->alamat : old('alamat') }}</textarea>
                        </div>
                    </div>
                    <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
