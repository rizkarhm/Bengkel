<?php

namespace App\Http\Controllers;

use App\Models\Galeri;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GaleriController extends Controller
{
    public function index()
    {
        $galeris = Galeri::all();
        return view('admin.galeri.index', [
            'galeris' => $galeris
        ]);
    }

    public function create()
    {
        return view('admin.galeri.form');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'keterangan' => 'required',
            'gambar' => 'image|file|max:2048'
        ]);

        if ($request->file('gambar')) {
            $path = $request->file('gambar')->store('images');
        } else {
            $path = '';
        }

        Galeri::create([
            'keterangan' => $request->keterangan,
            'gambar' => $path,
        ]);

        return redirect()->route('galeri.index')
            ->with('success', 'Berhasil menambah data foto baru');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $galeri = Galeri::find($id);
        if (!$galeri) return redirect()->route('galeri.index')
            ->with('error', 'Galeri dengan id' . $id . ' tidak ditemukan');

        return view('admin.galeri.form', [
            'galeris' => $galeri
        ]);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'keterangan' => 'required',
            'gambar' => 'image|file|max:2048'
        ]);

        $galeri = Galeri::find($id);
        $pathFoto = $galeri->gambar;

        $galeri->keterangan = $request->keterangan;

        if ($request->file('gambar') != null || $request->file('gambar') != '') {
            $galeri->gambar = $request->file('gambar')->store('images');
            Storage::delete($pathFoto);
        } else if ($request->file('gambar') == $pathFoto ){
            $galeri->gambar = $pathFoto;
        }

        $galeri->save();

        return redirect()->route('galeri.index')
            ->with('success', 'Berhasil mengubah data foto');
    }

    public function destroy(Request $request, $id)
    {
        $galeri = Galeri::find($id);

        $pathFoto = $galeri->gambar;
        if ($pathFoto != null || $pathFoto != '') {
            Storage::delete($pathFoto);
        }

        if ($galeri) {
            $galeri->delete();
            return redirect()->route('galeri.index')
                ->with('success', 'Berhasil menghapus data foto');
        }
    }
}

