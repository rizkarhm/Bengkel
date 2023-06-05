@extends('layouts.app')

@section('title', 'Detail Kontak')

@section('contents')
    <ol class="breadcrumb px-3 py-2 rounded mb-4">
        <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{ route('kontak.index') }}">Master Data Kontak</a></li>
        <li class="breadcrumb-item active">Detail</li>
    </ol>
    <div class="row">
        <div class="col-12">
            <div class="card shadow mb-4">
                <div class="card-header">Detail Kontak</div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="nama">Nama Kontak</label>
                        <input type="text" class="form-control" id="nama" name="nama" disabled
                            value="{{ isset($kontaks) ? $kontaks->nama : old('nama') }}">
                        @error('nama')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="isi">Data</label>
                        <input type="text" class="form-control" id="isi" name="isi" disabled
                            value="{{ isset($kontaks) ? $kontaks->isi : old('isi') }}">
                        @error('isi')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="card-footer">
                    <a href="{{ route('kontak.edit', $kontaks) }}" class="btn btn-warning">Edit Kontak</a>
                </div>
            </div>
        </div>
    </div>
    </form>
@endsection
