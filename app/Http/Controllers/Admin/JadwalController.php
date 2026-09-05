<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Jadwal;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class JadwalController extends Controller
{
    public function index(Request $request)
    {
        abort_unless(
            Auth::check() && Auth::user()->role === 'admin',
            403
        );

        $selectedMonth = (int) $request->input(
            'month',
            now()->month
        );

        if ($selectedMonth < 1 || $selectedMonth > 12) {
            $selectedMonth = now()->month;
        }

        $users = User::query()
            ->where('role', '!=', 'admin')
            ->orderBy('name')
            ->get();

        $selectedUser = null;

        if ($request->filled('user_id')) {
            $selectedUser = $users->firstWhere(
                'id',
                (int) $request->input('user_id')
            );
        }

        if (!$selectedUser) {
            $selectedUser = $users->first();
        }

        /*
        |--------------------------------------------------------------------------
        | AMBIL SEMUA JADWAL USER
        |--------------------------------------------------------------------------
        | Tidak menggunakan filter bulan.
        | Jadi satu user bisa mempunyai 1, 2, 5, 10, dst jadwal.
        */
        $jadwals = collect();

        if ($selectedUser) {
            $jadwals = Jadwal::query()
                ->where('user_id', $selectedUser->id)
                ->orderBy('tanggal', 'asc')
                ->orderBy('jam_mulai', 'asc')
                ->get();
        }

        return view('admin.jadwal', [
            'users' => $users,
            'selectedUser' => $selectedUser,
            'jadwals' => $jadwals,
            'selectedMonth' => $selectedMonth,
        ]);
    }

    public function store(Request $request)
    {
        abort_unless(
            Auth::check() && Auth::user()->role === 'admin',
            403
        );

        $data = $request->validate([
            'user_id' => [
                'required',
                'integer',
                'exists:users,id',
            ],

            'tanggal' => [
                'required',
                'date',
            ],

            'belajar' => [
                'required',
                'string',
                'max:100',
                'in:Calistung,Matematika,Bahasa Indonesia,IPAS,Bahasa Inggris',
            ],

            'jam_mulai' => [
                'required',
                'date_format:H:i',
            ],

            'jam_selesai' => [
                'required',
                'date_format:H:i',
                'after:jam_mulai',
            ],
        ]);

        $user = User::query()
            ->where('role', '!=', 'admin')
            ->findOrFail($data['user_id']);

        /*
        |--------------------------------------------------------------------------
        | SELALU MEMBUAT DATA BARU
        |--------------------------------------------------------------------------
        */
        $jadwal = new Jadwal();

        $jadwal->user_id = $data['user_id'];
        $jadwal->tanggal = $data['tanggal'];
        $jadwal->belajar = $data['belajar'];
        $jadwal->jam_mulai = $data['jam_mulai'];
        $jadwal->jam_selesai = $data['jam_selesai'];

        $jadwal->save();

        return redirect()
            ->route('admin.schedule', [
                'user_id' => $user->id,
                'month' => $selectedMonth = (int) date(
                    'n',
                    strtotime($jadwal->tanggal)
                ),
            ])
            ->with(
                'success',
                'Jadwal berhasil ditambahkan.'
            );
    }

    public function update(Request $request, Jadwal $jadwal)
    {
        abort_unless(
            Auth::check() && Auth::user()->role === 'admin',
            403
        );

        $data = $request->validate([
            'user_id' => [
                'required',
                'integer',
                'exists:users,id',
            ],

            'tanggal' => [
                'required',
                'date',
            ],

            'belajar' => [
                'required',
                'string',
                'max:100',
                'in:Calistung,Matematika,Bahasa Indonesia,IPAS,Bahasa Inggris',
            ],

            'jam_mulai' => [
                'required',
                'date_format:H:i',
            ],

            'jam_selesai' => [
                'required',
                'date_format:H:i',
                'after:jam_mulai',
            ],
        ]);

        $user = User::query()
            ->where('role', '!=', 'admin')
            ->findOrFail($data['user_id']);

        /*
        |--------------------------------------------------------------------------
        | HANYA ID JADWAL YANG DIPILIH YANG DIUPDATE
        |--------------------------------------------------------------------------
        */
        $jadwal->user_id = $data['user_id'];
        $jadwal->tanggal = $data['tanggal'];
        $jadwal->belajar = $data['belajar'];
        $jadwal->jam_mulai = $data['jam_mulai'];
        $jadwal->jam_selesai = $data['jam_selesai'];

        $jadwal->save();

        return redirect()
            ->route('admin.schedule', [
                'user_id' => $user->id,
                'month' => (int) date(
                    'n',
                    strtotime($jadwal->tanggal)
                ),
            ])
            ->with(
                'success',
                'Jadwal berhasil diperbarui.'
            );
    }

    public function destroy(Jadwal $jadwal)
    {
        abort_unless(
            Auth::check() && Auth::user()->role === 'admin',
            403
        );

        $userId = $jadwal->user_id;

        $month = (int) date(
            'n',
            strtotime($jadwal->tanggal)
        );

        /*
        |--------------------------------------------------------------------------
        | HANYA SATU JADWAL YANG DIHAPUS
        |--------------------------------------------------------------------------
        */
        $jadwal->delete();

        return redirect()
            ->route('admin.schedule', [
                'user_id' => $userId,
                'month' => $month,
            ])
            ->with(
                'success',
                'Jadwal berhasil dihapus.'
            );
    }
}