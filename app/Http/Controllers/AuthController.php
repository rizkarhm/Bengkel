<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
	public function register()
	{
		return view('auth/register');
	}

	public function registerSimpan(Request $request)
	{
		Validator::make($request->all(), [
			'nama' => 'required',
            'telepon' => 'required|unique:users',
            'password' => 'required|min:8|confirmed',
		])->validate();

		User::create([
			'nama' => $request->nama,
			'telepon' => $request->telepon,
			'password' => Hash::make($request->password),
			'role' => 'Customer'
		]);

		return redirect()->route('login')->with('success', 'Berhasil membuat akun, silahkan login!');
	}

	public function login()
	{
		return view('auth.login');
	}

	public function loginAksi(Request $request)
	{
        $request->validate([
            'telepon' => 'required',
			'password' => 'required'
        ]);

		if (!Auth::attempt($request->only('telepon', 'password'))) {
			throw ValidationException::withMessages([
				'Nomor Whatsapp atau password salah',
			]);
		}

		$request->session()->regenerate();


        if(auth()->user()->role == "Admin"){
            return redirect()->route('dashboard.index');
        } else {
            return redirect()->route('booking.index');
        }
	}

	public function logout(Request $request)
	{
		Auth::guard('web')->logout();

		$request->session()->invalidate();

		return redirect()->route('login');
	}
}
