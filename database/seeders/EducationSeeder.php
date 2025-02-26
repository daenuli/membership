<?php

namespace Database\Seeders;

use App\Models\Education;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EducationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('education')->delete();
        Education::insert([
            ['name' => 'Primary School (SD)'],
            ['name' => 'Junior High School (SMP)'],
            ['name' => 'Senior High School (SMA)'],
            ['name' => 'Diploma (D1/D2/D3)'],
            ['name' => 'Bachelor’s Degree (S1/D4)'],
            ['name' => 'Master’s Degree (S2)'],
            ['name' => 'Doctorate (S3)'],
        ]);
    }
}
