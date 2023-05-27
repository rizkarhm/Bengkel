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
			'telepon' => 'required',
			'password' => 'required|confirmed'
		])->validate();

		User::create([
			'nama' => $request->nama,
			'telepon' => $request->telepon,
			'password' => Hash::make($request->password),
			'role' => 'Admin'
		]);

		return redirect()->route('login');
	}

	public function login()
	{
		return view('auth.login');
	}

	public function loginAksi(Request $request)
	{
		Validator::make($request->all(), [
			'telepon' => 'required',
			'password' => 'required'
		])->validate();

		if (!Auth::attempt($request->only('telepon', 'password'), $request->boolean('remember'))) {
			throw ValidationException::withMessages([
				'telepon' => trans('auth.failed')
			]);
		}

		$request->session()->regenerate();

		return redirect()->route('dashboard');
	}

	public function logout(Request $request)
	{
		Auth::guard('web')->logout();

		$request->session()->invalidate();

		return redirect('/');
	}
}
