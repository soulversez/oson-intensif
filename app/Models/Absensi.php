<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Absensi extends Model
{
    protected $table = 'absensis';

    protected $fillable = [
        'user_id',
        'tanggal',
        'minggu_ke',
        'status',
        'keterangan',
    ];

    protected $casts = [
        'tanggal' => 'date',
        'minggu_ke' => 'integer',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}