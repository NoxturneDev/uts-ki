<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Teacher;

class TeacherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Teacher::firstOrCreate([
            'name' => 'John Doe',
            'nip' => '123456789',
            'phone' => '1234567890',
            'address' => '123 Main St, Anytown, USA',
            'secret_token' => 'xx1231xx'
        ]);
    }
}
