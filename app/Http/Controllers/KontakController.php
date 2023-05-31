<?php

namespace App\Http\Controllers;

use App\Models\Kontak;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class KontakController extends Controller
{
    public function index()
    {
        $kontaks = Kontak::orderBy('id', 'asc')->paginate(10);
        return view('admin.kontak.index', [
            'kontaks' => $kontaks
        ]);
    }

    public function create()
    {
        return view('admin.kontak.form');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'nama' => 'required',
            'isi' => 'required',
        ]);

        Kontak::create([
            'nama' => $request->nama,
            'isi' => $request->isi,
        ]);

        return redirect()->route('kontak.index')
            ->with('success', 'Berhasil menambah data kontak baru');
    }

    public function show($id)
    {
        $kontak = Kontak::find($id);
        if (!$kontak) return redirect()->route('kontak.index')
            ->with('error', 'Kontak dengan id' . $id . ' tidak ditemukan');

        return view('admin.kontak.show', [
            'kontaks' => $kontak
        ]);
    }

    public function edit($id)
    {
        $kontak = Kontak::find($id);
        if (!$kontak) return redirect()->route('kontak.index')
            ->with('error', 'Kontak dengan id' . $id . ' tidak ditemukan');

        return view('admin.kontak.form', [
            'kontaks' => $kontak
        ]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required',
            'isi' => 'required'
        ]);

        $kontak = Kontak::find($id);
        $kontak->nama = $request->nama;
        $kontak->isi = $request->isi;
        $kontak->save();

        return redirect()->route('kontak.index')
            ->with('success', 'Berhasil mengubah data kontak');
    }

    public function destroy(Request $request, $id)
    {
        $kontak = Kontak::find($id);

        if ($kontak) {
            $kontak->delete();
            return redirect()->route('kontak.index')
                ->with('success', 'Berhasil menghapus data kontak');
        }
    }
}
