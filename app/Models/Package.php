<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    protected $fillable = [
        'type',
        'name',
        'jenjang',
        'jumlah_siswa',
        'durasi',
        'deskripsi',
        'harga',
        'status',
        'facilities',
        'image_key',
        'badge_class',
        'button_class',
    ];

    protected $casts = [
        'harga' => 'integer',
        'facilities' => 'array',
    ];
}