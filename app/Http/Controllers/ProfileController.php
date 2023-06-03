<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function index()
    {
        return view('admin.profile.index');
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $user = User::find($id);
        if (!$user) return redirect()->route('profile.index')
            ->with('error', 'User tidak ditemukan');

        return view('admin.profile.edit');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required',
            'telepon' => 'required|unique:users,telepon,' . $id,
            'alamat' => 'nullable',
            'password' => 'sometimes|nullable|confirmed|min:8',
            'role' => 'required'
        ]);

        $user = User::find($id);
        $user->nama = $request->nama;
        $user->telepon = $request->telepon;
        $user->alamat = $request->alamat;
        $user->role = $request->role;

        if ($request->password) {
            $user->password = Hash::make($request->password);
        }

        $user->save();

        return redirect()->route('profile.index')
            ->with('success', 'Berhasil mengubah profile user');
    }

    public function destroy($id)
    {
        //
    }
}
