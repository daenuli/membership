<?php

namespace Database\Seeders;

use App\Models\Subdistrict;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SubdistrictSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('subdistricts')->delete();
        Subdistrict::insert([
            ['name' => 'Dompu'],
            ['name' => 'Hu\'u'],
            ['name' => 'Kempo'],
            ['name' => 'Kilo'],
            ['name' => 'Manggelewa'],
            ['name' => 'Pajo'],
            ['name' => 'Pekat'],
            ['name' => 'Woja'],
        ]);
    }
}
