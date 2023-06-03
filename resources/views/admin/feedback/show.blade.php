@extends('layouts.app')

@section('title', 'Detail Feedback')

@section('contents')
    <ol class="breadcrumb px-3 py-2 rounded mb-4">
        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{ route('booking.index') }}">Feedback</a></li>
        <li class="breadcrumb-item active">Detail</li>
    </ol>

    <div class="row">
        <div class="col-xl-8">
            <div class="card shadow mb-4">
                <div class="card-header">Detail Service</div>
                <div class="card-body">
                    @if ($message = Session::get('error'))
                        <div class="alert alert-danger">
                            <p class="mb-0">{{ $message }}</p>
                        </div>
                    @endif

                    @if (auth()->user()->role != 'Customer')
                        <div class="form-group">
                            <label for="user_id">Nama Customer</label>
                            <select name="user_id" id="user_id" class="custom-select" disabled>
                                <option value="" selected disabled hidden>Pilih Customer</option>
                                @foreach ($cust as $customer)
                                    <option value="{{ $feedbacks->booking->user_id }}" @selected(isset($feedbacks) ? $customer->id == $feedbacks->booking->user_id : '')>
                                        {{ $customer->nama }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    @endif
                    <div class="form-group">
                        <label for="kendaraan_id">Merek Kendaraan</label>
                        <select name="kendaraan_id" id="kendaraan_id" class="custom-select" disabled>
                            <option value="" selected disabled hidden>Pilih Merek Kendaraan</option>
                            @foreach ($kendaraans as $merek)
                                <option value="{{ $feedbacks->booking->kendaraan_id }}" @selected(isset($feedbacks) ? $merek->id == $feedbacks->booking->kendaraan_id : '')>
                                    {{ $merek->merek }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="model">Model Kendaraan</label>
                        <input type="text" class="form-control" id="model" name="model" disabled
                            placeholder="cth: HR-V 2017"
                            value="{{ isset($feedbacks) ? $feedbacks->booking->model : old('model') }}">
                    </div>
                    <div class="form-group">
                        <label for="nopol">Nomor Polisi</label>
                        <input type="text" class="form-control" id="nopol" name="nopol" disabled
                            value="{{ isset($feedbacks) ? $feedbacks->booking->nopol : old('nopol') }}">
                    </div>
                    <div class="form-group">
                        <label for="tgl_masuk">Tanggal Masuk</label>
                        <input type="date" class="form-control" id="tgl_masuk" name="tgl_masuk" disabled
                            value="{{ isset($feedbacks) ? $feedbacks->booking->tgl_masuk : old('tgl_masuk') }}">
                    </div>
                    <div class="form-group">
                        <label for="tgl_selesai">Tanggal Selesai</label>
                        <input type="date" class="form-control" id="tgl_selesai" name="tgl_selesai" disabled
                            value="{{ isset($feedbacks) ? $feedbacks->booking->tgl_selesai : old('tgl_selesai') }}">
                    </div>

                    @if (auth()->user()->role != 'Customer')
                        <div class="form-group" id="pic_id">
                            <label for="pic_id">PIC</label>
                            <select name="pic_id" id="pic_id" class="custom-select" disabled>
                                <option value="" selected disabled hidden>Pilih PIC</option>
                                @foreach ($pic as $pic_id)
                                    <option value="{{ $feedbacks->booking->pic_id }}" @selected(isset($feedbacks) ? $pic_id->id == $feedbacks->booking->pic_id : '')>
                                        {{ $pic_id->nama }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    @endif

                    <div class="form-group">
                        <label for="status">Status</label>
                        <select name="status" id="status" class="custom-select" disabled>
                            <option value="" selected disabled hidden>Pilih Status</option>
                            <option value="Booked" @selected(isset($feedbacks) ? $feedbacks->booking->status == 'Booked' : old('status') == 'Booked')>Booked
                            </option>
                            <option value="In Queue" @selected(isset($feedbacks) ? $feedbacks->booking->status == 'In Queue' : old('status') == 'In Queue')>In Queue
                            </option>
                            <option value="Proccessed" @selected(isset($feedbacks) ? $feedbacks->booking->status == 'Proccessed' : old('status') == 'Proccessed')>Proccessed
                            </option>
                            <option value="Done" @selected(isset($feedbacks) ? $feedbacks->booking->status == 'Done' : old('status') == 'Done')>Done
                            </option>
                            <option value="Canceled" @selected(isset($feedbacks) ? $feedbacks->booking->status == 'Canceled' : old('status') == 'Canceled')>Canceled
                            </option>
                        </select>
                    </div>

                    @if ($feedbacks->booking->status == 'Done')
                        <div class="form-group" id="penanganan">
                            <label for="penanganan">Penanganan</label>
                            <textarea disabled type="text" class="form-control" id="penanganan" name="penanganan" value="">{{ isset($feedbacks) ? $feedbacks->booking->penanganan : '' }}</textarea>
                        </div>
                    @elseif ($feedbacks->booking->status == 'Canceled')
                        <div class="form-group" id="pesan">
                            <label for="pesan">Keterangan Pembatalan</label>
                            <input type="text" class="form-control" id="pesan" name="pesan" disabled
                                value="{{ isset($feedbacks) ? $feedbacks->booking->ket_pembatalan : old('pesan') }}">
                        </div>
                    @endif
                </div>
            </div>
        </div>

        <div class="col-xl-4">
            <!-- Data Feedback card-->
            <div class="card shadow mb-4 mb-xl-0 pb-2">
                <div class="card-header">Detail Feedback</div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="rating">Rating</label>
                        <input type="text" class="form-control" id="rating" name="rating" disabled
                            value="{{ isset($feedbacks) ? $feedbacks->rating : old('rating') }}">
                    </div>
                    <div class="form-group" id="feedback">
                        <label for="feedback">Feedback</label>
                        <textarea disabled type="text" class="form-control" id="feedback" name="feedback" value="">{{ isset($feedbacks) ? $feedbacks->feedback : '' }}</textarea>
                    </div>
                    <p>Ditulis pada: {{ $feedbacks->created_at }}</p>
                </div>
            </div>
        </div>
    </div>
@endsection
