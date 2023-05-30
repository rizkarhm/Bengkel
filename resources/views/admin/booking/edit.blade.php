@extends('layouts.app')

@section('title', 'Form Edit Appointment' )

@section('contents')
    <ol class="breadcrumb px-3 py-2 rounded mb-4">
        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{ route('booking.index') }}">Data Booking</a></li>
        <li class="breadcrumb-item active">Edit</li>
    </ol>
    <form action="{{ route('booking.update', $bookings->id) }}" method="post">
        @csrf

        @method(isset($bookings) ? 'PUT' : '')

        <div class="row">
            <div class="col-12">
                <div class="card shadow mb-4">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="user_id">NamaCustomer<span class="text-danger">*</span></label>
                            <select name="user_id" id="user_id" class="custom-select">
                                <option value="" selected disabled hidden>Pilih Customer</option>
                                @foreach ($cust as $customer)
                                    <option value="{{ $customer->id }}" @selected(isset($bookings) ? $customer->id == $bookings->user_id : '')>{{ $customer->nama }}</option>
                                @endforeach
                            </select>
                            @error('user_id')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="kendaraan_id">Merek Kendaraan<span class="text-danger">*</span></label>
                            <select name="kendaraan_id" id="kendaraan_id" class="custom-select">
                                <option value="" selected disabled hidden>Pilih Merek Kendaraan</option>
                                @foreach ($kendaraans as $merek)
                                    <option value="{{ $merek->id }}" @selected(isset($bookings) ? $merek->id == $bookings->kendaraan_id : '')>{{ $merek->merek }}</option>
                                @endforeach
                            </select>
                            @error('kendaraan_id')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="model">Model Kendaraan<span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="model" name="model" placeholder="cth: HR-V 2017"
                                value="{{ isset($bookings) ? $bookings->model : old('model') }}">
                            @error('model')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="nopol">Nomor Polisi<span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="nopol" name="nopol" placeholder="cth: B 1975 AK"
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
                        <div class="form-group">
                            <label for="status">Status<span class="text-danger">*</span></label>
                            <select name="status" id="status" class="custom-select">
                                <option value="" selected disabled hidden>Pilih Status</option>
                                <option value="Booked" @selected(isset($bookings) ? $bookings->status == 'Booked' : old('status') == 'Booked')>Booked
                                </option>
                                <option value="In Queue" @selected(isset($bookings) ? $bookings->status == 'In Queue' : old('status') == 'In Queue')>In Queue
                                </option>
                                <option value="Proccessed" @selected(isset($bookings) ? $bookings->status == 'Proccessed' : old('status') == 'Proccessed')>Proccessed
                                </option>
                                <option value="Done" @selected(isset($bookings) ? $bookings->status == 'Done' : old('status') == 'Done')>Done
                                </option>
                                <option value="Canceled" @selected(isset($bookings) ? $bookings->status == 'Canceled' : old('status') == 'Canceled')>Canceled
                                </option>
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
                                    <option value="{{ $pic_id->id }}" @selected(isset($bookings) ? $pic_id->id == $bookings->pic_id : '')>{{ $pic_id->nama }}</option>
                                @endforeach
                            </select>
                            @error('pic_id')
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
@endsection
