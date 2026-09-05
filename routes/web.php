<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Admin\JadwalController;
use App\Http\Controllers\Admin\AbsensiController;
use App\Models\Purchase;
use App\Models\Package;

/*
|--------------------------------------------------------------------------
| HOME
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    $currentUser = null;

    $packages = \App\Models\Package::orderBy('type')
        ->orderBy('id')
        ->get();

    if (session()->has('user_logged_in_id')) {
        $currentUser = \App\Models\User::find(session('user_logged_in_id'));
    }

    return view('auth.home', [
        'currentUser' => $currentUser,
        'packages' => $packages,
    ]);
})->name('home');

/*
|--------------------------------------------------------------------------
| INFORMASI
|--------------------------------------------------------------------------
*/

Route::get('/informasi', function () {
    return view('informasi');
})->name('informasi');

/*
|--------------------------------------------------------------------------
| FASILITAS
|--------------------------------------------------------------------------
*/

Route::get('/fasilitas', function () {
    return view('fasilitas');
})->name('fasilitas');

/*
|--------------------------------------------------------------------------
| GALERI BELAJAR
|--------------------------------------------------------------------------
*/

Route::get('/galeri-belajar', function () {
    return view('galeri-belajar');
})->name('galeri.belajar');

/*
|--------------------------------------------------------------------------
| LOGIN ADMIN
|--------------------------------------------------------------------------
*/

Route::get('/admin/login', function () {
    return view('admin.login');
})->name('admin.login');

Route::post('/admin/login', function (Request $request) {

    $credentials = $request->validate([
        'name' => ['required', 'string'],
        'password' => ['required', 'string'],
    ]);

    // Hapus sesi login sebelumnya agar sesi User tidak ikut terbawa.
    Auth::logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();

    // Cari akun berdasarkan NAMA, sesuai form login Admin.
    $admin = \App\Models\User::query()
        ->where('name', $credentials['name'])
        ->where('role', 'admin')
        ->first();

    if (!$admin) {
        return back()
            ->withErrors([
                'name' => 'Nama Admin atau kata sandi salah.',
            ])
            ->withInput();
    }

    // Cek password dan login sebagai Admin.
    if (!Auth::attempt([
        'name' => $credentials['name'],
        'password' => $credentials['password'],
        'role' => 'admin',
    ])) {
        return back()
            ->withErrors([
                'name' => 'Nama Admin atau kata sandi salah.',
            ])
            ->withInput();
    }

    $request->session()->regenerate();

    // Homepage Admin milik aplikasi, BUKAN dashboard Laravel.
    return redirect()->route('admin.home');

})->name('admin.login.submit');

/*
|--------------------------------------------------------------------------
| HOME PAGE ADMIN
|--------------------------------------------------------------------------
*/

Route::get('/admin/home', function () {

    abort_unless(
        Auth::check()
        && Auth::user()->role === 'admin',
        403
    );

    $packages = Package::orderBy('type')->orderBy('id')->get();

    return view('admin.home', [
        'packages' => $packages,
    ]);

})->middleware('auth')->name('admin.home');


/*
|--------------------------------------------------------------------------
| AKUN ADMIN
|--------------------------------------------------------------------------
*/

Route::get('/admin/akun', function () {

    abort_unless(
        Auth::check()
        && Auth::user()->role === 'admin',
        403
    );

    return view('admin.akun');

})->middleware('auth')->name('admin.account');


Route::post('/admin/account/password', function (Request $request) {

    abort_unless(
        Auth::check()
        && Auth::user()->role === 'admin',
        403
    );

    $data = $request->validate([
        'current_password' => ['required', 'string'],
        'password' => ['required', 'string', 'min:6', 'confirmed'],
    ]);

    $admin = Auth::user();

    if (!\Illuminate\Support\Facades\Hash::check(
        $data['current_password'],
        $admin->password
    )) {
        return back()->withErrors([
            'current_password' => 'Kata sandi saat ini salah.',
        ]);
    }

    $admin->password = \Illuminate\Support\Facades\Hash::make(
        $data['password']
    );

    $admin->save();

    return redirect()
        ->route('admin.account')
        ->with('success', 'Kata sandi berhasil diperbarui.');

})->middleware('auth')->name('admin.account.password.update');


Route::post('/admin/logout', function (Request $request) {

    abort_unless(
        Auth::check()
        && Auth::user()->role === 'admin',
        403
    );

    Auth::logout();

    $request->session()->invalidate();
    $request->session()->regenerateToken();

    return redirect()->route('admin.login');

})->middleware('auth')->name('admin.logout');


/*
|--------------------------------------------------------------------------
| CRUD PAKET ADMIN
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->group(function () {

    Route::post('/admin/packages', function (Request $request) {

        abort_unless(
            Auth::check()
            && Auth::user()->role === 'admin',
            403
        );

        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'type' => ['required', 'in:privat,kelompok'],
            'jenjang' => ['required', 'in:TK,SD,SMP,SMA/K'],
            'jumlah_siswa' => ['required', 'string', 'max:100'],
            'durasi' => ['required', 'string', 'max:100'],
            'deskripsi' => ['required', 'string'],
            'harga' => ['required', 'integer', 'min:0'],
        ]);

        $data['status'] = 'offline';

        $data['image_key'] = match ($data['jenjang']) {
            'TK' => 'Paket TK',
            'SD' => 'Paket SD',
            'SMP' => 'PAKET_SMP_TERBARU',
            default => 'Paket SMA',
        };

        $data['badge_class'] = match ($data['jenjang']) {
            'TK' => 'badge-tk',
            'SD' => 'badge-sd',
            'SMP' => 'badge-smp',
            default => 'badge-sma',
        };

        $data['button_class'] = match ($data['jenjang']) {
            'TK' => 'btn-tk',
            'SD' => 'btn-sd',
            'SMP' => 'btn-smp',
            default => 'btn-sma',
        };

        $data['facilities'] = match ($data['jenjang']) {
            'TK' => ['Belajar Calistung', 'Belajar Interaktif'],
            'SD' => ['Matematika', 'Bahasa Inggris', 'Bahasa Indonesia / IPAS'],
            'SMP' => ['Matematika', 'Bahasa Inggris', 'Bahasa Indonesia'],
            default => ['Matematika', 'Bahasa Inggris'],
        };

        $package = Package::create($data);

        return response()->json([
            'message' => 'Paket berhasil disimpan.',
            'package' => $package,
        ], 201);

    })->name('admin.packages.store');


    Route::put('/admin/packages/{package}', function (Request $request, Package $package) {

        abort_unless(
            Auth::check()
            && Auth::user()->role === 'admin',
            403
        );

        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'type' => ['required', 'in:privat,kelompok'],
            'jenjang' => ['required', 'in:TK,SD,SMP,SMA/K'],
            'jumlah_siswa' => ['required', 'string', 'max:100'],
            'durasi' => ['required', 'string', 'max:100'],
            'deskripsi' => ['required', 'string'],
            'harga' => ['required', 'integer', 'min:0'],
        ]);

        $data['image_key'] = match ($data['jenjang']) {
            'TK' => 'Paket TK',
            'SD' => 'Paket SD',
            'SMP' => 'PAKET_SMP_TERBARU',
            default => 'Paket SMA',
        };

        $data['badge_class'] = match ($data['jenjang']) {
            'TK' => 'badge-tk',
            'SD' => 'badge-sd',
            'SMP' => 'badge-smp',
            default => 'badge-sma',
        };

        $data['button_class'] = match ($data['jenjang']) {
            'TK' => 'btn-tk',
            'SD' => 'btn-sd',
            'SMP' => 'btn-smp',
            default => 'btn-sma',
        };

        $data['facilities'] = match ($data['jenjang']) {
            'TK' => ['Belajar Calistung', 'Belajar Interaktif'],
            'SD' => ['Matematika', 'Bahasa Inggris', 'Bahasa Indonesia / IPAS'],
            'SMP' => ['Matematika', 'Bahasa Inggris', 'Bahasa Indonesia'],
            default => ['Matematika', 'Bahasa Inggris'],
        };

        $package->update($data);

        return response()->json([
            'message' => 'Paket berhasil diperbarui.',
            'package' => $package->fresh(),
        ]);

    })->name('admin.packages.update');


    Route::delete('/admin/packages/{package}', function (Package $package) {

        abort_unless(
            Auth::check()
            && Auth::user()->role === 'admin',
            403
        );

        $package->delete();

        return response()->json([
            'message' => 'Paket berhasil dihapus.',
        ]);

    })->name('admin.packages.destroy');

});

/*
|--------------------------------------------------------------------------
| KONFIRMASI PEMBAYARAN ADMIN
|--------------------------------------------------------------------------
*/

Route::get('/admin/konfirmasi', function () {

    abort_unless(
        Auth::check()
        && Auth::user()->role === 'admin',
        403
    );

    $purchases = Purchase::with('user')
        ->latest('id')
        ->get();

    return view('admin.konfirmasi', [
        'purchases' => $purchases,
    ]);

})->middleware('auth')->name('admin.confirmation');

/*
|--------------------------------------------------------------------------
| DETAIL KONFIRMASI ADMIN
|--------------------------------------------------------------------------
*/

Route::get('/admin/konfirmasi/{purchase}', function (Purchase $purchase) {

    abort_unless(
        Auth::check()
        && Auth::user()->role === 'admin',
        403
    );

    $purchase->load('user');

    return view('admin.konfirmasi', [
        'purchases' => Purchase::with('user')->latest('id')->get(),
        'selectedPurchase' => $purchase,
    ]);

})->middleware('auth')->name('admin.confirmation.show');

/*
|--------------------------------------------------------------------------
| TERIMA PEMBAYARAN
|--------------------------------------------------------------------------
*/

Route::post('/admin/purchases/{purchase}/approve', function (Purchase $purchase) {

    abort_unless(
        Auth::check()
        && Auth::user()->role === 'admin',
        403
    );

    abort_unless($purchase->status === 'pending', 409);

    $purchase->update([
        'status' => 'success',
    ]);

    return redirect()->route('admin.confirmation');

})->middleware('auth')->name('admin.purchase.approve');

/*
|--------------------------------------------------------------------------
| TOLAK PEMBAYARAN
|--------------------------------------------------------------------------
*/

Route::post('/admin/purchases/{purchase}/reject', function (Purchase $purchase) {

    abort_unless(
        Auth::check()
        && Auth::user()->role === 'admin',
        403
    );

    abort_unless($purchase->status === 'pending', 409);

    $purchase->update([
        'status' => 'failed',
    ]);

    return redirect()->route('admin.confirmation');

})->middleware('auth')->name('admin.purchase.reject');

/*
|--------------------------------------------------------------------------
| DAFTAR USER
|--------------------------------------------------------------------------
*/

Route::get('/register', [AuthController::class, 'showRegister'])
    ->name('register');

Route::post('/register', [AuthController::class, 'register']);

/*
|--------------------------------------------------------------------------
| LOGIN USER
|--------------------------------------------------------------------------
*/

Route::get('/login', [AuthController::class, 'showLogin'])
    ->name('login');

Route::post('/login', [AuthController::class, 'login']);

/*
|--------------------------------------------------------------------------
| AKUN USER
|--------------------------------------------------------------------------
*/

Route::get('/account', function () {
    $currentUser = null;

    if (session()->has('user_logged_in_id')) {
        $currentUser = \App\Models\User::find(session('user_logged_in_id'));
    }

    abort_unless($currentUser, 403);

    return view('auth.account', [
        'currentUser' => $currentUser,
    ]);
})->name('account');

/*
|--------------------------------------------------------------------------
| FORMULIR / PAKET
|--------------------------------------------------------------------------
|
| Paket yang dibuat Admin dibaca langsung dari tabel packages.
| Nomor ID database dipakai sebagai identifier untuk paket baru/dinamis,
| sedangkan key lama (privat-tk, privat-sd, dst.) tetap didukung agar
| pembelian lama tidak rusak.
*/

$resolvePackage = function (string $package): array {
    $legacyPackages = [
        'privat-tk' => ['label' => 'Privat TK', 'price' => 200000],
        'privat-sd' => ['label' => 'Privat SD', 'price' => 290000],
        'privat-smp' => ['label' => 'Privat SMP', 'price' => 330000],
        'privat-sma' => ['label' => 'Privat SMA/K', 'price' => 350000],
        'kelompok-tk' => ['label' => 'Kelompok TK', 'price' => 230000],
        'kelompok-sd' => ['label' => 'Kelompok SD', 'price' => 260000],
        'kelompok-smp' => ['label' => 'Kelompok SMP', 'price' => 310000],
        'kelompok-sma' => ['label' => 'Kelompok SMA/K', 'price' => 330000],
    ];

    // Rapikan nilai package yang datang dari URL.
    $rawPackage = trim(urldecode($package));
    $normalizedPackage = strtolower($rawPackage);
    $normalizedPackage = str_replace(['_', ' '], '-', $normalizedPackage);
    $normalizedPackage = preg_replace('/-+/', '-', $normalizedPackage);
    $normalizedPackage = trim($normalizedPackage, '-');

    // 1. Identifier lama/slug standar.
    if (isset($legacyPackages[$normalizedPackage])) {
        return [
            'token' => $normalizedPackage,
            'label' => $legacyPackages[$normalizedPackage]['label'],
            'price' => $legacyPackages[$normalizedPackage]['price'],
            'record' => null,
        ];
    }

    // 2. Paket dinamis berdasarkan ID database.
    if (ctype_digit($rawPackage)) {
        $record = Package::find((int) $rawPackage);

        if ($record) {
            return [
                'token' => (string) $record->id,
                'label' => (string) $record->name,
                'price' => (int) ($record->harga ?? 0),
                'record' => $record,
            ];
        }
    }

    // 3. Paket dinamis berdasarkan nama paket.
    $record = Package::query()
        ->get()
        ->first(function ($item) use ($normalizedPackage) {
            $name = strtolower(trim((string) $item->name));
            $nameSlug = str_replace(['_', ' '], '-', $name);
            $nameSlug = preg_replace('/-+/', '-', $nameSlug);
            $nameSlug = trim($nameSlug, '-');

            return $name === strtolower(trim($normalizedPackage))
                || $nameSlug === $normalizedPackage;
        });

    if ($record) {
        return [
            'token' => (string) $record->id,
            'label' => (string) $record->name,
            'price' => (int) ($record->harga ?? 0),
            'record' => $record,
        ];
    }

    abort(404);
};


Route::get('/pendaftaran/{package}', function (string $package) use ($resolvePackage) {

    $packageInfo = $resolvePackage($package);
    $packageToken = $packageInfo['token'];

    $latestPurchase = Purchase::query()
        ->where('user_id', auth()->id())
        ->where('package', $packageToken)
        ->latest('id')
        ->first();

    if ($latestPurchase) {
        if ($latestPurchase->status === 'pending') {
            return redirect()->route('payment.pending', [
                'package' => $packageToken,
            ]);
        }

        if ($latestPurchase->status === 'success') {
            return redirect()->route('payment.success', [
                'package' => $packageToken,
            ]);
        }

        if ($latestPurchase->status === 'failed') {
            return redirect()->route('payment.failed', [
                'package' => $packageToken,
            ]);
        }
    }

    return view('purchase.formulir', [
        'package' => $packageToken,
        'packageLabel' => $packageInfo['label'],
        'packagePrice' => $packageInfo['price'],
        'packageRecord' => $packageInfo['record'],
    ]);

})->middleware('auth')->name('registration.form');

/*
|--------------------------------------------------------------------------
| PEMBAYARAN
|--------------------------------------------------------------------------
*/

Route::get('/pembayaran/{package}', function (string $package) use ($resolvePackage) {

    $packageInfo = $resolvePackage($package);

    return view('purchase.pembayaran', [
        'package' => $packageInfo['token'],
        'packageLabel' => $packageInfo['label'],
        'price' => $packageInfo['price'],
        'packageRecord' => $packageInfo['record'],
    ]);

})->middleware('auth')->name('payment');

/*
|--------------------------------------------------------------------------
| KONFIRMASI PEMBAYARAN USER + UPLOAD BUKTI
|--------------------------------------------------------------------------
*/

Route::post('/pembayaran/{package}/konfirmasi', function (Request $request, string $package) use ($resolvePackage) {

    $packageInfo = $resolvePackage($package);
    $packageToken = $packageInfo['token'];

    $request->validate([
        'payment_proof' => [
            'nullable',
            'file',
            'mimes:jpg,jpeg,png,webp,pdf',
            'max:5120',
        ],
    ]);

    $existingPending = Purchase::query()
        ->where('user_id', auth()->id())
        ->where('package', $packageToken)
        ->where('status', 'pending')
        ->latest('id')
        ->first();

    if ($existingPending) {
        return redirect()->route('payment.pending', [
            'package' => $packageToken,
        ]);
    }

    $paymentProof = null;

    if ($request->hasFile('payment_proof')) {
        $paymentProof = $request->file('payment_proof')->store('payment-proofs', 'public');
    }

    Purchase::create([
        'user_id' => auth()->id(),
        'package' => $packageToken,
        'price' => $packageInfo['price'],
        'status' => 'pending',
        'payment_method' => $paymentProof ? 'transfer' : 'cash',
        'payment_proof' => $paymentProof,
    ]);

    return redirect()->route('payment.pending', [
        'package' => $packageToken,
    ]);

})->middleware('auth')->name('payment.confirm');

/*
|--------------------------------------------------------------------------
| BATALKAN PEMBELIAN
|--------------------------------------------------------------------------
*/

Route::post('/pembayaran/{package}/batal', function (string $package) use ($resolvePackage) {

    $packageInfo = $resolvePackage($package);
    $packageToken = $packageInfo['token'];

    $purchase = Purchase::query()
        ->where('user_id', auth()->id())
        ->where('package', $packageToken)
        ->where('status', 'pending')
        ->latest('id')
        ->first();

    if ($purchase) {
        $purchase->update([
            'status' => 'cancelled',
        ]);
    }

    return redirect()->route('home');

})->middleware('auth')->name('payment.cancel');

/*
|--------------------------------------------------------------------------
| MENUNGGU
|--------------------------------------------------------------------------
*/

Route::get('/pembayaran/{package}/menunggu', function (string $package) use ($resolvePackage) {

    $packageInfo = $resolvePackage($package);
    $packageToken = $packageInfo['token'];

    $purchase = Purchase::query()
        ->where('user_id', auth()->id())
        ->where('package', $packageToken)
        ->latest('id')
        ->first();

    abort_unless($purchase, 404);

    if ($purchase->status === 'success') {
        return redirect()->route('payment.success', [
            'package' => $packageToken,
        ]);
    }

    if ($purchase->status === 'failed') {
        return redirect()->route('payment.failed', [
            'package' => $packageToken,
        ]);
    }

    if ($purchase->status === 'cancelled') {
        return redirect()->route('registration.form', [
            'package' => $packageToken,
        ]);
    }

    return view('menunggu-konfirmasi', [
        'package' => $packageToken,
        'selectedPurchase' => $purchase,
        'purchases' => Purchase::query()
            ->where('user_id', auth()->id())
            ->latest('id')
            ->get(),
        'packageLabel' => $packageInfo['label'],
        'packagePrice' => $packageInfo['price'],
    ]);

})->middleware('auth')->name('payment.pending');

/*
|--------------------------------------------------------------------------
| BERHASIL
|--------------------------------------------------------------------------
*/

Route::get('/pembayaran/{package}/berhasil', function (string $package) use ($resolvePackage) {

    $packageInfo = $resolvePackage($package);
    $packageToken = $packageInfo['token'];

    $purchase = Purchase::query()
        ->where('user_id', auth()->id())
        ->where('package', $packageToken)
        ->latest('id')
        ->first();

    return view('pembayaran-berhasil', [
        'package' => $packageToken,
        'selectedPurchase' => $purchase,
        'purchases' => Purchase::query()
            ->where('user_id', auth()->id())
            ->latest('id')
            ->get(),
        'packageLabel' => $packageInfo['label'],
        'price' => $packageInfo['price'],
    ]);

})->middleware('auth')->name('payment.success');

/*
|--------------------------------------------------------------------------
| DITOLAK
|--------------------------------------------------------------------------
*/

Route::get('/pembayaran/{package}/ditolak', function (string $package) use ($resolvePackage) {

    $packageInfo = $resolvePackage($package);
    $packageToken = $packageInfo['token'];

    $purchase = Purchase::query()
        ->where('user_id', auth()->id())
        ->where('package', $packageToken)
        ->latest('id')
        ->first();

    return view('pembayaran-ditolak', [
        'package' => $packageToken,
        'selectedPurchase' => $purchase,
        'purchases' => Purchase::query()
            ->where('user_id', auth()->id())
            ->latest('id')
            ->get(),
        'packageLabel' => $packageInfo['label'],
        'price' => $packageInfo['price'],
    ]);

})->middleware('auth')->name('payment.failed');

/*
|--------------------------------------------------------------------------
| LOGOUT
|--------------------------------------------------------------------------
*/

Route::post('/logout', [AuthController::class, 'logout'])
    ->name('logout');

/*
|--------------------------------------------------------------------------
| JADWAL ADMIN
|--------------------------------------------------------------------------
*/

Route::get('/admin/jadwal', [JadwalController::class, 'index'])
    ->middleware('auth')
    ->name('admin.schedule');

Route::post('/admin/jadwal', [JadwalController::class, 'store'])
    ->middleware('auth')
    ->name('admin.schedule.store');

Route::put('/admin/jadwal/{jadwal}', [JadwalController::class, 'update'])
    ->middleware('auth')
    ->name('admin.schedule.update');

Route::delete('/admin/jadwal/{jadwal}', [JadwalController::class, 'destroy'])
    ->middleware('auth')
    ->name('admin.schedule.destroy');

 /*
|--------------------------------------------------------------------------
| ABSENSI ADMIN
|--------------------------------------------------------------------------
*/

Route::get('/admin/absensi', [AbsensiController::class, 'index'])
    ->middleware('auth')
    ->name('admin.attendance');

Route::post('/admin/absensi', [AbsensiController::class, 'store'])
    ->middleware('auth')
    ->name('admin.attendance.store');
