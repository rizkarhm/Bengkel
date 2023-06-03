@extends('layouts.app')

@section('title', isset($kontaks) ? 'Form Edit Kontak' : 'Form Tambah Kontak')

@section('contents')
    <ol class="breadcrumb px-3 py-2 rounded mb-4">
        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{ route('kontak.index') }}">Master Data Kontak</a></li>
        <li class="breadcrumb-item active">
            {{ isset($kontaks) ? 'Edit' : 'Tambah' }}</li>
    </ol>
    <form action="{{ isset($kontaks) ? route('kontak.update', $kontaks->id) : route('kontak.store') }}" method="post">
        @csrf

        {{-- if user exist, method edit: put --}}
        @method(isset($kontaks) ? 'PUT' : '')
        <div class="row">
            <div class="col-12">
                <div class="card shadow mb-4">
                    <div class="card-header">Detail Kontak</div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="nama">Nama Kontak<span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="nama" name="nama"
                                value="{{ isset($kontaks) ? $kontaks->nama : old('nama') }}">
                            @error('nama')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="isi">Data<span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="isi" name="isi"
                                value="{{ isset($kontaks) ? $kontaks->isi : old('isi') }}">
                            @error('isi')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">{{ isset($kontaks) ? 'Update' : 'Simpan' }}</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
