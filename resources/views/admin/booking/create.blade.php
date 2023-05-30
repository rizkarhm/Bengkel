@extends('layouts.app')

@section('title', 'Form Buat Appointment')

@section('contents')
    <ol class="breadcrumb px-3 py-2 rounded mb-4">
        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{ route('booking.index') }}">Data Booking</a></li>
        <li class="breadcrumb-item active">Appointment Baru</li>
    </ol>
    <form action="{{ route('booking.store') }}" method="post">
        @csrf
    <div class="row">
        <div class="col-xl-4">
            <!-- Data Customer card-->
            <div class="card shadow mb-4 mb-xl-0 pb-2">
                <div class="card-header">Data Customer</div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="user_id">Pilih Customer<span class="text-danger">*</span></label>
                        <select name="user_id" id="user_id" class="custom-select">
                            <option value="" selected disabled hidden>Pilih Customer</option>
                            @foreach ($cust as $customer)
                                <option value="{{ $customer->id }}" @selected(old('user_id') == $customer->id)>{{ $customer->id }} - {{ $customer->nama }}</option>
                                @endforeach
                                <option value="new_customer">Customer Baru</option>
                        </select>

                        @error('user_id')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
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
                        <textarea type="text" row=5 class="form-control" id="alamat" name="alamat">{{ isset($users) ? $users->alamat : old('alamat') }}</textarea>

                    </div>
                    <div class="form-group" style="display: none">
                        <label for="role">Role<span class="text-danger">*</span></label>
                        <input type="test" class="form-control" id="role" name="role" value="Customer" disabled>
                        @error('role')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <i>
                        <h6 class="m-0 font-weight-bold text-danger bold mb-2 mt-4">
                            {{ isset($users) ? 'Isi jika Anda ingin merubah password' : '' }}</h6>
                    </i>
                    <div class="row gx-3 mb-3" style="display: none">
                        <div class="form-group col-md-6">
                            <label for="password">Password<span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="password" name="password" value="customer123" disabled>
                            @error('password')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group col-md-6" style="display: none">
                            <label for="password_confirmation">Konfirmasi Password<span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="password_confirmation"
                                name="password_confirmation" value="customer123" disabled>
                        </div>
                        @error('password_confirmation')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-8">
            <!-- Data Booking card-->
            <div class="card shadow mb-4">
                <div class="card-header">Data Booking</div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="kendaraan_id">Merek Kendaraan<span class="text-danger">*</span></label>
                        <select name="kendaraan_id" id="kendaraan_id" class="custom-select">
                            <option value="" selected disabled hidden>Pilih Merek Kendaraan</option>
                            @foreach ($kendaraans as $merek)
                                <option value="{{ $merek->id }}" @selected(old('kendaraan_id') == $merek->id)>{{ $merek->merek }}
                                </option>
                            @endforeach
                        </select>
                        @error('kendaraan_id')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="model">Model Kendaraan<span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="model" name="model"
                            placeholder="cth: HR-V 2017" value="{{ isset($bookings) ? $bookings->model : old('model') }}">
                        @error('model')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="nopol">Nomor Polisi<span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="nopol" name="nopol"
                            placeholder="cth: B 1975 AK"
                            value="{{ isset($bookings) ? $bookings->nopol : old('nopol') }}">
                        @error('nopol')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="tgl_masuk">Tanggal Masuk<span class="text-danger">*</span></label>
                        <input type="date" class="form-control" id="tgl_masuk" name="tgl_masuk"
                            value="{{ isset($bookings) ? $bookings->tgl_masuk : old('tgl_masuk') }}">
                        @error('tgl_masuk')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group" style="display: none">
                        <label for="status">Status<span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="model" name="model"
                         value="Booked">
                        </select>
                        @error('status')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group" id="pic_id" style="display:none">
                        <label for="pic_id">PIC<span class="text-danger">*</span></label>
                        <select name="pic_id" id="pic_id" class="custom-select">
                            <option value="" selected disabled hidden>Pilih PIC</option>
                            @foreach ($pic as $pic_id)
                                <option value="{{ $pic_id->id }}" @selected(old('pic_id') == $pic_id->id)>{{ $pic_id->nama }}
                                </option>
                            @endforeach
                        </select>
                        @error('pic_id')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="card">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </form>
@endsection
