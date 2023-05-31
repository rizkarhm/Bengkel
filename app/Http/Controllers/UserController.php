<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        // $users = User::all();
        $users = User::orderBy('id', 'asc')->paginate(10);
        // $users = $users->intersect(User::whereIn('role', ['Mekanik', 'Admin', 'Magang'])->get());
        return view('admin.user.index', compact('users'));
    }

    public function create()
    {
        return view('admin.user.form');
    }


    public function store(Request $request)
    {
        $this->validate($request, [
            'nama' => 'required',
            'telepon' => 'required|unique:users',
            'alamat' => 'nullable',
            'password' => 'required|min:8|confirmed',
            'role' => 'required'
        ]);

        User::create([
            'nama' => $request->nama,
            'telepon' => $request->telepon,
            'alamat' => $request->alamat,
            'password' => Hash::make($request->password),
            'role' => $request->role
        ]);

        return redirect()->route('user.index')
            ->with('success', 'Berhasil menambah user baru');
    }

    public function show($id)
    {
        $user = User::find($id);
        if (!$user) return redirect()->route('user.index')
            ->with('error', 'User dengan id' . $id . ' tidak ditemukan');

        return view('admin.user.show', [
            'users' => $user
        ]);
    }

    public function edit($id)
    {
        $user = User::find($id);
        if (!$user) return redirect()->route('user.index')
            ->with('error', 'User dengan id' . $id . ' tidak ditemukan');

        return view('admin.user.form', [
            'users' => $user
        ]);
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

        return redirect()->route('user.index')
            ->with('success', 'Berhasil mengubah user');
    }

    public function destroy(Request $request, $id)
    {
        $user = User::find($id);

        if ($user) {
            $user->delete();
            return redirect()->route('user.index')
                ->with('success', 'Berhasil menghapus user');
        }
    }
}
