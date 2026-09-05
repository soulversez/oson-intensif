<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('purchases', function (Blueprint $table) {
            $table->string('transaction_code', 20)
                ->nullable()
                ->unique()
                ->after('id');
        });

        /*
        |--------------------------------------------------------------------------
        | TRANSAKSI LAMA
        |--------------------------------------------------------------------------
        | Transaksi yang sudah ada diberi kode berdasarkan urutan ID.
        | Contoh:
        | 1 -> OSTENS001
        | 2 -> OSTENS002
        | 3 -> OSTENS003
        */
        $purchases = DB::table('purchases')
            ->whereNull('transaction_code')
            ->orderBy('id')
            ->get(['id']);

        $number = 1;

        foreach ($purchases as $purchase) {
            DB::table('purchases')
                ->where('id', $purchase->id)
                ->update([
                    'transaction_code' => 'OSTENS' . str_pad(
                        $number,
                        3,
                        '0',
                        STR_PAD_LEFT
                    ),
                ]);

            $number++;
        }
    }

    public function down(): void
    {
        Schema::table('purchases', function (Blueprint $table) {
            $table->dropUnique(['transaction_code']);
            $table->dropColumn('transaction_code');
        });
    }
};