@extends('layouts.app')

@section('title', isset($kendaraans) ? 'Form Edit Kendaraan' : 'Form Tambah Kendaraan')

@section('contents')
    <ol class="breadcrumb px-3 py-2 rounded mb-4">
        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{ route('kendaraan.index') }}">Master Data Kendaraan</a></li>
        <li class="breadcrumb-item active">
            {{ isset($kendaraans) ? 'Edit' : 'Tambah' }}</li>
    </ol>
    <form action="{{ isset($kendaraans) ? route('kendaraan.update', $kendaraans->id) : route('kendaraan.store') }}"
        enctype="multipart/form-data" method="post">
        @csrf

        {{-- if user exist, method edit: put --}}
        @method(isset($kendaraans) ? 'PUT' : '')

        {{-- display all error message --}}
        {{-- @if ($errors->any())
            <div class="alert alert-danger">
                @foreach ($errors->all() as $error)
                    {{ $error }}
                @endforeach
            </div>
        @endif --}}

        <div class="row">
            <div class="col-12">
                <div class="card shadow mb-4">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="merek">Merek Kendaraan<span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="merek" name="merek"
                                value="{{ isset($kendaraans) ? $kendaraans->merek : old('merek') }}">
                                @error('merek')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="gambar">Logo</label><br>
                            {{-- isset untuk menentukan apakah create / update
                            kendaraans untuk mengambil value kolom --}}
                            @if (isset($kendaraans))
                                @if ($kendaraans->gambar)
                                    <img class="img-account-profile rounded rounded-4 mb-2 img-fluid"
                                        src="{{ asset('storage/' . $kendaraans->gambar) }}" style="height:80px">
                                @else
                                    <img src="{{ asset('img/no-image.png') }}"
                                        class="img-account-profile rounded rounded-4 mb-2 img-fluid" style="height:80px" />
                                @endif
                            @endif
                            <input type="file" class="form-control" id="gambar" name="gambar"
                                onchange="previewImage()">
                            @error('gambar')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit"
                            class="btn btn-primary">{{ isset($kendaraans) ? 'Update' : 'Simpan' }}</button>
                    </div>
                </div>
                <p class="text-danger">*script image preview untuk selected new image belum jalan</p>
            </div>
        </div>
    </form>

    <script>
        function previewImage() {
            const blob = URL.createObjectURL(image.files[0]);
            imgPreview.src = blob;
        }
    </script>
@endsection
