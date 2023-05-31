<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductRequest;
use App\Models\Kendaraan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class KendaraanController extends Controller
{
    public function index()
    {
        $kendaraans = Kendaraan::orderBy('id', 'asc')->paginate(10);
        return view('admin.kendaraan.index', [
            'kendaraans' => $kendaraans
        ]);
    }

    public function create()
    {
        return view('admin.kendaraan.form');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'merek' => 'required',
            'gambar' => 'image|file|max:2048'
        ]);

        if ($request->file('gambar')) {
            $path = $request->file('gambar')->store('images');
        } else {
            $path = '';
        }

        Kendaraan::create([
            'merek' => $request->merek,
            'gambar' => $path,
        ]);

        return redirect()->route('kendaraan.index')
            ->with('success', 'Berhasil menambah data kendaraan baru');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $kendaraan = Kendaraan::find($id);
        if (!$kendaraan) return redirect()->route('kendaraan.index')
            ->with('error', 'Kendaraan dengan id' . $id . ' tidak ditemukan');

        return view('admin.kendaraan.form', [
            'kendaraans' => $kendaraan
        ]);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'merek' => 'required',
            'gambar' => 'image|file|max:2048'
        ]);

        $kendaraan = Kendaraan::find($id);
        $pathFoto = $kendaraan->gambar;

        $kendaraan->merek = $request->merek;

        if ($request->file('gambar') != null || $request->file('gambar') != '') {
            $kendaraan->gambar = $request->file('gambar')->store('images');
            Storage::delete($pathFoto);
        } else if ($request->file('gambar') == $pathFoto ){
            $kendaraan->gambar = $pathFoto;
        }

        $kendaraan->save();

        return redirect()->route('kendaraan.index')
            ->with('success', 'Berhasil mengubah data kendaraan');
    }

    public function destroy(Request $request, $id)
    {
        $kendaraan = Kendaraan::find($id);

        $pathFoto = $kendaraan->gambar;
        if ($pathFoto != null || $pathFoto != '') {
            Storage::delete($pathFoto);
        }

        if ($kendaraan) {
            $kendaraan->delete();
            return redirect()->route('kendaraan.index')
                ->with('success', 'Berhasil menghapus data kendaraan');
        }
    }
}
