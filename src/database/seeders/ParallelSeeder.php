<?php

namespace Database\Seeders;

use App\Models\Parallel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ParallelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Parallel::firstOrCreate([
            'name' => 'Kelas 1A',
            'code' => 'SD1A',
            'kelas_id' => 1,
        ]);
    }
}
