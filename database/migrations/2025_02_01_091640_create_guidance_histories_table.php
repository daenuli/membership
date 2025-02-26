<?php

use App\Models\User;
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
        Schema::create('guidance_histories', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(User::class)->constrained()->cascadeOnDelete();
            $table->date('start_date'); // MULAI IKUT PEMBINAAN (tgl_bln_thn)
            $table->string('membership_level'); // JENJANG ANGGOTA
            $table->date('last_promotion_date')->nullable(); // PELANTIKAN JENJANG TERAKHIR (tgl_bin_thn)
            $table->string('upa_mentor'); // PEMBINA UPA
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('guidance_histories');
    }
};
