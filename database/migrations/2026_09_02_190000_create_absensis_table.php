<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('absensis', function (Blueprint $table) {
            $table->id();

            $table->foreignId('user_id')
                ->constrained('users')
                ->cascadeOnDelete();

            $table->date('tanggal');

            $table->unsignedTinyInteger('minggu_ke');

            $table->string('status', 20);

            $table->text('keterangan')->nullable();

            $table->timestamps();

            $table->unique([
                'user_id',
                'tanggal',
            ]);

            $table->index([
                'user_id',
                'tanggal',
            ]);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('absensis');
    }
};