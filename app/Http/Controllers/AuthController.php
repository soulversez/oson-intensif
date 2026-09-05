<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    // =========================
    // FORM DAFTAR
    // =========================
    public function showRegister()
    {
        return view('auth.register');
    }

    // =========================
    // PROSES DAFTAR
    // =========================
    public function register(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email'],
            'password' => ['required', 'string', 'min:6'],
        ]);

        User::create([
            'name' => trim($validated['name']),
            'email' => strtolower(trim($validated['email'])),
            'password' => Hash::make($validated['password']),
        ]);

        return redirect()->route('login')
            ->with('success', 'Pendaftaran berhasil! Silakan masuk.');
    }

    // =========================
    // FORM MASUK
    // =========================
    public function showLogin()
    {
        return view('auth.login');
    }

    // =========================
    // PROSES MASUK USER
    // =========================
    public function login(Request $request)
    {
        $validated = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required', 'string'],
        ]);

        $email = strtolower(trim($validated['email']));

        $user = User::whereRaw('LOWER(email) = ?', [$email])->first();

        if (!$user || !Hash::check($validated['password'], $user->password)) {
            return back()
                ->withErrors([
                    'email' => 'Email atau kata sandi salah.',
                ])
                ->withInput($request->only('email'));
        }

        /*
        |--------------------------------------------------------------------------
        | AUTHENTICATION USER
        |--------------------------------------------------------------------------
        */
        Auth::login($user);

        /*
        |--------------------------------------------------------------------------
        | BACKUP ID USER DI SESSION
        |--------------------------------------------------------------------------
        | Home menggunakan ID ini untuk memastikan tampilan user tetap konsisten
        | setelah redirect.
        */
        $request->session()->put('user_logged_in_id', $user->id);

        $request->session()->regenerate();

        return redirect()->route('home');
    }

    // =========================
    // KELUAR
    // =========================
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->forget('user_logged_in_id');
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }
}
