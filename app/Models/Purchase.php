<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'package',
        'price',
        'status',
        'payment_method',
        'payment_proof',
        'transaction_code',
    ];

    protected $casts = [
        'price' => 'integer',
    ];

    /*
    |--------------------------------------------------------------------------
    | RELASI KE USER
    |--------------------------------------------------------------------------
    */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /*
    |--------------------------------------------------------------------------
    | BUAT KODE TRANSAKSI OTOMATIS
    |--------------------------------------------------------------------------
    */
    protected static function booted(): void
    {
        static::creating(function (Purchase $purchase) {

            // Kalau kode sudah diisi, jangan ditimpa.
            if (!empty($purchase->transaction_code)) {
                return;
            }

            /*
            | Ambil ID transaksi setelah insert tidak bisa dilakukan di event
            | creating, jadi gunakan jumlah transaksi + 1 sebagai nomor awal.
            | Loop memastikan kode tetap unik.
            */
            $number = (int) static::max('id') + 1;

            do {
                $code = 'OSTENS' . str_pad(
                    $number,
                    3,
                    '0',
                    STR_PAD_LEFT
                );

                $exists = static::where(
                    'transaction_code',
                    $code
                )->exists();

                $number++;
            } while ($exists);

            $purchase->transaction_code = $code;
        });
    }
}