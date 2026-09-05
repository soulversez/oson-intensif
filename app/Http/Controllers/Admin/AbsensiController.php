<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Absensi;
use App\Models\Purchase;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AbsensiController extends Controller
{
    public function index(Request $request)
    {
        abort_unless(
            Auth::check() && Auth::user()->role === 'admin',
            403
        );

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

        $selectedMonth = (int) $request->input(
            'month',
            now()->month
        );

        if ($selectedMonth < 1 || $selectedMonth > 12) {
            $selectedMonth = now()->month;
        }

        $selectedWeek = (int) $request->input(
            'week',
            1
        );

        if ($selectedWeek < 1 || $selectedWeek > 4) {
            $selectedWeek = 1;
        }

        $absensis = collect();

        if ($selectedUser) {
            $absensis = Absensi::query()
                ->where('user_id', $selectedUser->id)
                ->whereYear('tanggal', now()->year)
                ->whereMonth('tanggal', $selectedMonth)
                ->where('minggu_ke', $selectedWeek)
                ->orderBy('tanggal')
                ->get();
        }

        $purchase = null;

        if ($selectedUser) {
            $purchase = Purchase::query()
                ->where('user_id', $selectedUser->id)
                ->whereIn('status', ['success', 'pending'])
                ->latest('id')
                ->first();
        }

        return view('admin.absensi', [
            'users' => $users,
            'selectedUser' => $selectedUser,
            'selectedMonth' => $selectedMonth,
            'selectedWeek' => $selectedWeek,
            'absensis' => $absensis,
            'purchase' => $purchase,
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
            'minggu_ke' => [
                'required',
                'integer',
                'min:1',
                'max:4',
            ],
            'status' => [
                'required',
                'string',
                'in:Hadir,Sakit,Izin,Alpa',
            ],
            'keterangan' => [
                'nullable',
                'string',
                'max:500',
            ],
        ]);

        User::query()
            ->where('role', '!=', 'admin')
            ->findOrFail($data['user_id']);

        Absensi::updateOrCreate(
            [
                'user_id' => $data['user_id'],
                'tanggal' => $data['tanggal'],
            ],
            [
                'minggu_ke' => $data['minggu_ke'],
                'status' => $data['status'],
                'keterangan' => $data['keterangan'] ?? null,
            ]
        );

        return redirect()->route('admin.attendance', [
            'user_id' => $data['user_id'],
            'month' => (int) date(
                'n',
                strtotime($data['tanggal'])
            ),
            'week' => $data['minggu_ke'],
        ])->with(
            'success',
            'Absensi berhasil disimpan.'
        );
    }
}