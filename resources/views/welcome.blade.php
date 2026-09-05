<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

// ====================
// HOME
// ====================
Route::get('/', function () {
    return view('auth.home');
})->name('home');


// ====================
// DAFTAR
// ====================
Route::get('/register', [AuthController::class, 'showRegister'])
    ->name('register');

Route::post('/register', [AuthController::class, 'register']);


// ====================
// MASUK
// ====================
Route::get('/login', [AuthController::class, 'showLogin'])
    ->name('login');

Route::post('/login', [AuthController::class, 'login']);


// ====================
// AKUN
// ====================
Route::get('/account', function () {
    return view('auth.account');
})->middleware('auth')->name('account');


// ====================
// FORMULIR PENDAFTARAN PAKET
// ====================
Route::get('/pendaftaran/{package}', function (string $package) {

    $packages = [
        'privat-tk' => 'Privat TK',
        'privat-sd' => 'Privat SD',
        'privat-smp' => 'Privat SMP',
        'privat-sma' => 'Privat SMA/K',

        'kelompok-tk' => 'Kelompok TK',
        'kelompok-sd' => 'Kelompok SD',
        'kelompok-smp' => 'Kelompok SMP',
        'kelompok-sma' => 'Kelompok SMA/K',
    ];

    abort_unless(isset($packages[$package]), 404);

    return view('purchase.formulir', [
        'package' => $package,
        'packageLabel' => $packages[$package],
    ]);

})->middleware('auth')->name('registration.form');


// ====================
// PEMBAYARAN
// ====================
Route::get('/pembayaran/{package}', function (string $package) {

    $packages = [
        'privat-tk' => [
            'label' => 'Privat TK',
            'price' => 250000,
        ],

        'privat-sd' => [
            'label' => 'Privat SD',
            'price' => 290000,
        ],

        'privat-smp' => [
            'label' => 'Privat SMP',
            'price' => 330000,
        ],

        'privat-sma' => [
            'label' => 'Privat SMA/K',
            'price' => 350000,
        ],

        'kelompok-tk' => [
            'label' => 'Kelompok TK',
            'price' => 230000,
        ],

        'kelompok-sd' => [
            'label' => 'Kelompok SD',
            'price' => 260000,
        ],

        'kelompok-smp' => [
            'label' => 'Kelompok SMP',
            'price' => 310000,
        ],

        'kelompok-sma' => [
            'label' => 'Kelompok SMA/K',
            'price' => 330000,
        ],
    ];

    abort_unless(isset($packages[$package]), 404);

    return view('purchase.pembayaran', [
        'package' => $package,
        'packageLabel' => $packages[$package]['label'],
        'price' => $packages[$package]['price'],
    ]);

})->middleware('auth')->name('payment');


// ====================
// KELUAR
// ====================
Route::post('/logout', [AuthController::class, 'logout'])
    ->name('logout');