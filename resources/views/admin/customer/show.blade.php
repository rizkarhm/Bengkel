@extends('layouts.app')

@section('title', 'Detail Customer')

@section('contents')
    <ol class="breadcrumb px-3 py-2 rounded mb-4">
        <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{ route('customer.index') }}">Customer</a></li>
        <li class="breadcrumb-item active">Detail</li>
    </ol>
    <div class="row">
        <div class="col-12">
            <div class="card shadow mb-4">
                <div class="card-header">Detail User</div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="nama">Nama Lengkap</label>
                        <input type="text" class="form-control" id="nama" name="nama"
                            value="{{ isset($users) ? $users->nama : '' }}" disabled>
                    </div>
                    <div class="form-group">
                        <label for="telepon">Nomor Whatsapp</label>
                        <input type="number" class="form-control" id="telepon" name="telepon"
                            value="{{ isset($users) ? $users->telepon : '' }}" disabled>
                    </div>
                    <div class="form-group">
                        <label for="alamat">Alamat</label>
                        <textarea disabled type="text" row=3 class="form-control" id="alamat" name="alamat">{{ isset($users) ? $users->alamat : '' }}</textarea>
                    </div>
                </div>

                <div class="card-footer">
                    <form action="{{ route('customer.destroy', $users->id) }}" method="post">
                        <a href="{{ route('customer.edit', $users) }}" class="btn btn-warning ">Edit</a>
                        @csrf
                        @method('DELETE')
                        @if (auth()->user()->role != 'Mekanik')
                            <button type="submit" class="btn btn-danger ml-2">Hapus</button>
                        @endif
                    </form>
                </div>
            </div>
        </div>
    </div>
    </form>
@endsection
