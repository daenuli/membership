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
        Schema::create('families', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(User::class)->constrained()->cascadeOnDelete();
            $table->string('spouse_name')->nullable();
            $table->integer('number_of_sons')->unsigned()->default(0);
            $table->integer('number_of_daughters')->unsigned()->default(0);
            $table->enum('house_status', ['owned', 'rented', 'living_with_parents_or_in_laws'])->default('owned');
            $table->integer('number_of_siblings')->unsigned();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('families');
    }
};
