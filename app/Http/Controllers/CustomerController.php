<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::where('role', 'Customer')
            ->paginate(10);

        return view('admin.customer.index', compact('users'));
    }

    public function show($id)
    {
        $user = User::find($id);
        if (!$user) return redirect()->route('customer.index')
            ->with('error', 'User dengan id' . $id . ' tidak ditemukan');

        return view('admin.customer.show', [
            'users' => $user
        ]);
    }

    public function edit($id)
    {
        $user = User::find($id);
        if (!$user) return redirect()->route('customer.index')
            ->with('error', 'Customer dengan id' . $id . ' tidak ditemukan');

        return view('admin.customer.edit', [
            'users' => $user
        ]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required',
            'telepon' => 'required|unique:users,telepon,' . $id,
            'alamat' => 'nullable',
        ]);

        $user = User::find($id);
        $user->nama = $request->nama;
        $user->telepon = $request->telepon;
        $user->alamat = $request->alamat;
        $user->role = "Customer";

        $user->save();

        return redirect()->route('user.index')
            ->with('success', 'Berhasil mengubah customer');
    }

    public function destroy(Request $request, $id)
    {
        $isUsed = DB::table('bookings')->where('user_id', $id)->exists();
        $user = User::find($id);
        
        if ($isUsed == 1) {
            return redirect()->route('customer.index')
                ->with('error', 'Hapus gagal. Data memiliki relasi dengan tabel lain');
        } else {
            if ($user) {
                $user->delete();
                return redirect()->route('customer.index')
                    ->with('success', 'Berhasil menghapus customer');
            }
        }
    }
}
