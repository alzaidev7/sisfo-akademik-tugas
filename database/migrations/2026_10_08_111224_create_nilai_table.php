<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('nilai', function (Blueprint $table) {
            $table->id();

            $table->foreignId('siswa_id')
                ->constrained('siswa')
                ->cascadeOnUpdate()
                ->cascadeOnDelete();

            $table->foreignId('mapel_id')
                ->constrained('mapel')
                ->cascadeOnUpdate()
                ->cascadeOnDelete();

            $table->foreignId('guru_id')
                ->constrained('guru')
                ->cascadeOnUpdate()
                ->cascadeOnDelete();

            $table->decimal('tugas', 5, 2);
            $table->decimal('uts', 5, 2);
            $table->decimal('uas', 5, 2);

            $table->decimal('nilai_akhir', 5, 2);

            $table->timestamps();

            $table->unique(['siswa_id', 'mapel_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('nilai');
    }
};