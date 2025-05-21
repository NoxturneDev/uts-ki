<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Kelas;

class KelasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // create seeder
        Kelas::firstOrCreate([
            'name' => 'Kelas 1',
            'code' => 'SD1',
        ]);
    }
}
