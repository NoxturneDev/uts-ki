<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\JamPelajaran;

class JamPelajaranSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        JamPelajaran::firstOrCreate([
            'day_value' => '1',
            'jam_ke' => '1',
            'startTime' => '07:00:00',
            'finishTime' => '08:00:00',
        ]);
    }
}
