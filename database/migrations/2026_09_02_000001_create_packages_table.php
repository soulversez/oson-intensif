<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (!Schema::hasTable('packages')) {
            Schema::create('packages', function (Blueprint $table) {
                $table->id();
                $table->string('type', 20)->default('privat');
                $table->string('name');
                $table->string('jenjang', 20);
                $table->string('jumlah_siswa');
                $table->string('durasi');
                $table->text('deskripsi')->nullable();
                $table->unsignedInteger('harga')->default(0);
                $table->string('status', 20)->default('offline');
                $table->json('facilities')->nullable();
                $table->string('image_key')->default('Paket SD');
                $table->string('badge_class')->default('badge-sd');
                $table->string('button_class')->default('btn-sd');
                $table->timestamps();
            });
        }

        if (Schema::hasTable('packages') && DB::table('packages')->count() === 0) {
            $now = now();

            $rows = [
                [
                    'type' => 'privat',
                    'name' => 'Privat TK',
                    'jenjang' => 'TK',
                    'jumlah_siswa' => '1 Siswa',
                    'durasi' => '1 jam',
                    'deskripsi' => 'Belajar Calistung dan belajar interaktif.',
                    'harga' => 250000,
                    'status' => 'offline',
                    'facilities' => json_encode(['Belajar Calistung', 'Belajar Interaktif']),
                    'image_key' => 'Paket TK',
                    'badge_class' => 'badge-tk',
                    'button_class' => 'btn-tk',
                    'created_at' => $now,
                    'updated_at' => $now,
                ],
                [
                    'type' => 'privat',
                    'name' => 'Privat SD',
                    'jenjang' => 'SD',
                    'jumlah_siswa' => '1 Siswa',
                    'durasi' => '1 jam',
                    'deskripsi' => 'Matematika, Bahasa Inggris, dan Bahasa Indonesia / IPAS.',
                    'harga' => 290000,
                    'status' => 'offline',
                    'facilities' => json_encode(['Matematika', 'Bahasa Inggris', 'Bahasa Indonesia / IPAS']),
                    'image_key' => 'Paket SD',
                    'badge_class' => 'badge-sd',
                    'button_class' => 'btn-sd',
                    'created_at' => $now,
                    'updated_at' => $now,
                ],
                [
                    'type' => 'privat',
                    'name' => 'Privat SMP',
                    'jenjang' => 'SMP',
                    'jumlah_siswa' => '1 Siswa',
                    'durasi' => '1 jam',
                    'deskripsi' => 'Matematika, Bahasa Inggris, dan Bahasa Indonesia.',
                    'harga' => 330000,
                    'status' => 'offline',
                    'facilities' => json_encode(['Matematika', 'Bahasa Inggris', 'Bahasa Indonesia']),
                    'image_key' => 'PAKET_SMP_TERBARU',
                    'badge_class' => 'badge-smp',
                    'button_class' => 'btn-smp',
                    'created_at' => $now,
                    'updated_at' => $now,
                ],
                [
                    'type' => 'privat',
                    'name' => 'Privat SMA/K',
                    'jenjang' => 'SMA/K',
                    'jumlah_siswa' => '1 Siswa',
                    'durasi' => '1 jam',
                    'deskripsi' => 'Matematika dan Bahasa Inggris.',
                    'harga' => 350000,
                    'status' => 'offline',
                    'facilities' => json_encode(['Matematika', 'Bahasa Inggris']),
                    'image_key' => 'Paket SMA',
                    'badge_class' => 'badge-sma',
                    'button_class' => 'btn-sma',
                    'created_at' => $now,
                    'updated_at' => $now,
                ],
                [
                    'type' => 'kelompok',
                    'name' => 'Kelompok TK',
                    'jenjang' => 'TK',
                    'jumlah_siswa' => '6-9 Siswa',
                    'durasi' => '1 jam',
                    'deskripsi' => 'Belajar Calistung dan belajar interaktif dalam kelompok.',
                    'harga' => 230000,
                    'status' => 'offline',
                    'facilities' => json_encode(['Belajar Calistung', 'Belajar Interaktif']),
                    'image_key' => 'Paket TK',
                    'badge_class' => 'badge-tk',
                    'button_class' => 'btn-tk',
                    'created_at' => $now,
                    'updated_at' => $now,
                ],
                [
                    'type' => 'kelompok',
                    'name' => 'Kelompok SD',
                    'jenjang' => 'SD',
                    'jumlah_siswa' => '6-9 Siswa',
                    'durasi' => '1 jam',
                    'deskripsi' => 'Matematika, Bahasa Inggris, dan Bahasa Indonesia / IPAS.',
                    'harga' => 260000,
                    'status' => 'offline',
                    'facilities' => json_encode(['Matematika', 'Bahasa Inggris', 'Bahasa Indonesia / IPAS']),
                    'image_key' => 'Paket SD',
                    'badge_class' => 'badge-sd',
                    'button_class' => 'btn-sd',
                    'created_at' => $now,
                    'updated_at' => $now,
                ],
                [
                    'type' => 'kelompok',
                    'name' => 'Kelompok SMP',
                    'jenjang' => 'SMP',
                    'jumlah_siswa' => '6-9 Siswa',
                    'durasi' => '1 jam',
                    'deskripsi' => 'Matematika, Bahasa Inggris, dan Bahasa Indonesia.',
                    'harga' => 310000,
                    'status' => 'offline',
                    'facilities' => json_encode(['Matematika', 'Bahasa Inggris', 'Bahasa Indonesia']),
                    'image_key' => 'PAKET_SMP_TERBARU',
                    'badge_class' => 'badge-smp',
                    'button_class' => 'btn-smp',
                    'created_at' => $now,
                    'updated_at' => $now,
                ],
                [
                    'type' => 'kelompok',
                    'name' => 'Kelompok SMA/K',
                    'jenjang' => 'SMA/K',
                    'jumlah_siswa' => '6-9 Siswa',
                    'durasi' => '1 jam',
                    'deskripsi' => 'Matematika dan Bahasa Inggris.',
                    'harga' => 330000,
                    'status' => 'offline',
                    'facilities' => json_encode(['Matematika', 'Bahasa Inggris']),
                    'image_key' => 'Paket SMA',
                    'badge_class' => 'badge-sma',
                    'button_class' => 'btn-sma',
                    'created_at' => $now,
                    'updated_at' => $now,
                ],
            ];

            DB::table('packages')->insert($rows);
        }
    }

    public function down(): void
    {
        Schema::dropIfExists('packages');
    }
};