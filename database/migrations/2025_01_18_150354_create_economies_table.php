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
        Schema::create('economies', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(User::class)->constrained()->cascadeOnDelete();
            $table->string('occupation'); // PEKERJAAN
            $table->decimal('average_monthly_income', 15, 2)->nullable(); // PENGHASILAN RATA2 PER BULAN
            $table->boolean('bpjs')->default(false); // BPJS (true if they have it, false otherwise)
            $table->boolean('pkh')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('economies');
    }
};
