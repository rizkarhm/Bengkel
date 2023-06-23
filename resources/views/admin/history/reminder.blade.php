@extends('layouts.app')

@section('title', 'Reminder Form')

@section('contents')
    <ol class="breadcrumb px-3 py-2 rounded mb-4">
        <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{ route('history.index') }}">Riwayat Service</a></li>
        <li class="breadcrumb-item active">Reminder</li>
    </ol>
    <div class="row">
        <div class="col-12">
            <!-- Data Feedback card-->
            <div class="card shadow mb-4 mb-xl-0 pb-2">
                <div class="card-header">Kirim Pengingat Service - Customer {{ $customer->nama }}</div>
                <div class="card-body">
                    <form action="{{ route('whatsapp.send') }}" method="POST" autocomplete="off">
                        @csrf
                        <div class="form-group" id="telepon">
                            <label for="telepon">Telepon</label>
                            <input type="text" class="form-control" id="telepon" name="telepon" value="{{ isset($customer) ? $customer->telepon : old('telepon') }}" placeholder="cth: 08785919068" required>
                        </div>
                        <div class="form-group" id="pesan">
                            <label for="pesan">Pesan</label>
                            <textarea type="text" class="form-control" id="pesan" name="pesan" value="" required>Kepada Yth. Pelanggan {{ isset($customer) ? $customer->nama : '' }}. Silahkan kembali melakukan pengecekan berkala kendaraan Anda pada tanggal ...... .Terima Kasih</textarea>
                        </div>
                </div>

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Kirim</button>
                </div>
                </form>
            </div>
        </div>
    </div>
@endsection
