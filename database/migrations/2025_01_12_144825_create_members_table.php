<?php

use App\Models\Subdistrict;
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
        Schema::create('members', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(User::class)->constrained()->cascadeOnDelete();
            $table->string('full_name');
            $table->string('nick_name');
            $table->string('birth_place');
            $table->date('birth_date');
            $table->enum('gender', ['male', 'female']);
            $table->string('blood_type', 2);
            $table->integer('height');
            $table->integer('weight');
            $table->enum('marital_status', ['single', 'married', 'divorced']);
            $table->string('street');
            $table->string('rt_rw')->nullable();
            $table->string('neighborhood')->nullable();
            $table->foreignIdFor(Subdistrict::class)->constrained()->cascadeOnDelete()->nullable();
            $table->string('village')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('members');
    }
};
