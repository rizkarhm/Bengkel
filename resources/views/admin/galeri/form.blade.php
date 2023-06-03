@extends('layouts.app')

@section('title', isset($galeris) ? 'Form Edit Galeri' : 'Form Tambah Galeri')

@section('contents')
    <ol class="breadcrumb px-3 py-2 rounded mb-4">
        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{ route('galeri.index') }}">Master Data Galeri</a></li>
        <li class="breadcrumb-item active">
            {{ isset($galeris) ? 'Edit' : 'Tambah' }}</li>
    </ol>
    <form action="{{ isset($galeris) ? route('galeri.update', $galeris->id) : route('galeri.store') }}"
        enctype="multipart/form-data" method="post">
        @csrf

        {{-- if user exist, method edit: put --}}
        @method(isset($galeris) ? 'PUT' : '')

        <div class="row">
            <div class="col-12">
                <div class="card shadow mb-4">
                    <div class="card-header">Detail Galeri</div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="gambar">Gambar</label><br>
                            {{-- isset untuk menentukan apakah create / update
                            galeris untuk mengambil value kolom --}}
                            @if (isset($galeris))
                                @if ($galeris->gambar)
                                    <img class="img-account-profile rounded rounded-4 mb-2 img-fluid"
                                        src="{{ asset('storage/' . $galeris->gambar) }}" style="height:80px">
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
                        <div class="form-group">
                            <label for="keterangan">Keterangan<span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="keterangan" name="keterangan"
                                value="{{ isset($galeris) ? $galeris->keterangan : old('keterangan') }}">
                                @error('keterangan')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit"
                            class="btn btn-primary">{{ isset($galeris) ? 'Update' : 'Simpan' }}</button>
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
