@extends('layouts.app')

@section('title', 'Detail Booking')

@section('contents')
    <ol class="breadcrumb px-3 py-2 rounded mb-4">
        <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{ route('booking.index') }}">Data Booking</a></li>
        <li class="breadcrumb-item active">Detail</li>
    </ol>

    <div class="row">
        <div class="col-12">
            <div class="card shadow mb-4">
                <div class="card-header">Detail Booking @if (auth()->user()->role != 'Customer')
                        — Customer {{ $bookings->user->nama }}
                    @endif
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="kendaraan_id">Merek Kendaraan</label>
                                <select name="kendaraan_id" id="kendaraan_id" class="custom-select" disabled>
                                    <option value="" selected disabled hidden>Pilih Merek Kendaraan</option>
                                    @foreach ($kendaraans as $merek)
                                        <option value="{{ $bookings->kendaraan_id }}" @selected(isset($bookings) ? $merek->id == $bookings->kendaraan_id : '')>
                                            {{ $merek->merek }}</option>
                                    @endforeach
                                </select>
                                @error('kendaraan_id')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="model">Model Kendaraan</label>
                                <input type="text" class="form-control" id="model" name="model" disabled
                                    placeholder="cth: HR-V 2017"
                                    value="{{ isset($bookings) ? $bookings->model : old('model') }}">
                                @error('model')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="nopol">Nomor Polisi</label>
                                <input type="text" class="form-control" id="nopol" name="nopol" disabled
                                    value="{{ isset($bookings) ? $bookings->nopol : old('nopol') }}">
                                @error('nopol')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="no_mesin">Nomor Mesin</label>
                                <input type="text" class="form-control" id="no_mesin" name="no_mesin" disabled
                                    value="{{ isset($bookings) ? $bookings->no_mesin : old('no_mesin') }}">
                                @error('no_mesin')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-6">
                            <div class="form-group" id="masalah">
                                <label for="masalah">Kerusakan</label>
                                <input disabled type="text" class="form-control" id="masalah" name="masalah"
                                    value="{{ isset($bookings) ? $bookings->masalah : old('masalah') }}">
                                @error('masalah')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="tgl_masuk">Tanggal Masuk</label>
                                <input type="text" class="form-control" id="tgl_masuk" name="tgl_masuk" disabled
                                    value="{{ isset($bookings) ? $bookings->tgl_masuk : old('tgl_masuk') }}">
                                @error('tgl_masuk')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="status">Status</label>
                                <select name="status" id="status" class="custom-select" disabled>
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

                            @if ($bookings->status == 'Done')
                                <div class="form-group" id="penanganan">
                                    <label for="penanganan">Penanganan</label>
                                    <textarea disabled type="text" class="form-control" id="penanganan" name="penanganan" value="">{{ isset($bookings) ? $bookings->penanganan : '' }}</textarea>
                                    @error('penanganan')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            @elseif ($bookings->status == 'Canceled')
                                <div class="form-group" id="pesan">
                                    <label for="pesan">Keterangan Pembatalan</label>
                                    <input type="text" class="form-control" id="pesan" name="pesan" disabled
                                        value="{{ isset($bookings) ? $bookings->ket_pembatalan : old('pesan') }}">
                                    @error('pesan')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            @endif

                            @if (auth()->user()->role != 'Customer' && $bookings->status != 'Booked' && $bookings->status != 'In Queue')
                                <div class="form-group" id="pic_id">
                                    <label for="pic_id">PIC</label>
                                    <select name="pic_id" id="pic_id" class="custom-select" disabled>
                                        <option value="" selected disabled hidden>Pilih PIC</option>
                                        @foreach ($pic as $pic_id)
                                            <option value="{{ $bookings->pic_id }}" @selected(isset($bookings) ? $pic_id->id == $bookings->pic_id : '')>
                                                {{ $pic_id->nama }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('pic_id')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            @endif
                        </div>
                    </div>



                </div>

                @if (auth()->user()->role == 'Customer')
                    <div class="card-footer">
                        @if ($bookings->status == 'Booked')
                            <a href="{{ route('booking.edit', $bookings) }}" class="btn btn-warning ">Edit Data
                                Booking</a>
                        @else
                            <a href="{{ route('booking.edit', $bookings) }}" class="btn btn-warning disabled">Edit Data
                                Booking</a>
                        @endif
                    </div>
                @elseif (auth()->user()->role == 'Magang')
                @else<div class="card-footer">
                        <a href="{{ route('booking.edit', $bookings) }}" class="btn btn-warning">Edit Data
                            Booking</a>
                    </div>

                @endif
            </div>
        </div>

        @if (auth()->user()->role != 'Customer')
            <div class="col-12">
                <div class="card shadow mb-4">
                    <div class="card-header">Riwayat Kendaraan</div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead class="text-bold text-center" style="color:blue">
                                    <tr>
                                        <th style="width: 100px;">ID Booking</th>
                                        <th>Tanggal Service</th>
                                        <th>Tanggal Selesai</th>
                                        <th style="width: 300px">Kendala</th>
                                        <th style="width: 300px">Keterangan</th>
                                        <th style="width: 100px">PIC</th>
                                        <th style="width: 80px">Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php($no = 1)
                                    @foreach ($history_kendaraan as $row)
                                        <tr>
                                            <td class="text-center">{{ $row->id }}</td>
                                            <td>{{ $row->tgl_masuk }}</td>
                                            @if ($row->tgl_selesai == null)
                                                <td>-</td>
                                            @else
                                                <td>{{ $row->tgl_selesai }}</td>
                                            @endif
                                            <td>{{ $row->masalah }}</td>
                                            @if ($row->status == 'Canceled')
                                                <td>{{ $row->ket_pembatalan }}</td>
                                            @elseif($row->status == 'Done')
                                                <td>{{ $row->penanganan }}</td>
                                            @else
                                                <td></td>
                                            @endif
                                            @if ($row->pic_id == null)
                                                <td>-</td>
                                            @else
                                                <td>{{ $row->pic->nama }}</td>
                                            @endif
                                            <td class="text-center">
                                                @if ($row->status == 'Booked')
                                                    <div class="text-white rounded-pill py-2 px-2 badge bg-secondary">
                                                        {{ $row->status }}</div>
                                                @elseif ($row->status == 'Done')
                                                    <div class="text-white rounded-pill py-2 px-2 badge bg-success">
                                                        {{ $row->status }}</div>
                                                @elseif ($row->status == 'In Queue')
                                                    <div class="text-white rounded-pill py-2 px-2 badge bg-warning">
                                                        {{ $row->status }}</div>
                                                @elseif ($row->status == 'Proccessed')
                                                    <div class="text-white rounded-pill py-2 px-2 badge bg-info">
                                                        {{ $row->status }}</div>
                                                @elseif ($row->status == 'Canceled')
                                                    <div class="text-white rounded-pill py-2 px-2 badge bg-danger">
                                                        {{ $row->status }}</div>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach

                                @empty($row)
                                    <tr>
                                        <td colspan="5" class="text-center">No Data</td>
                                    </tr>
                                @endempty
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    @endif
</div>
@endsection
