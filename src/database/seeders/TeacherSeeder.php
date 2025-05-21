<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Teacher;
use Illuminate\Support\Str;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class TeacherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Role::firstOrCreate([
            'name' => 'teacher',
        ]);

        $user = User::create([
        'name' => 'Pak Ahmad',
        'email' => 'ahmad@example.com',
        'password' => Hash::make('ahmad123'),
        ]);

        $user->assignRole('teacher');

        Teacher::firstOrCreate([
            'name' => 'Ahmad',
            'nip' => '198708152005031007',
            'phone' => '081234567890',
            'address' => 'Jl. Pendidikan No. 7',
            'user_id' => $user->id,
            'secret_token' => Str::random(5),
        ]);
    }
}
