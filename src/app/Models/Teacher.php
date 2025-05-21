<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Teacher extends Model
{
    use HasFactory;

    protected static function boot(){
        parent::boot();

        static::creating(function ($teacher) {
            // Generate default user if not already assigned
            if (empty($teacher->user_id)) {
                $user = User::create([
                    'name' => $teacher->name,
                    'email' => strtolower(Str::slug($teacher->name)) . rand(1000, 9999) . '@example.com',
                    'password' => Hash::make('defaultpassword'), // You can change this logic
                ]);
                $teacher->user_id = $user->id;
            }

            // Generate secret token
            if (empty($teacher->secret_token)) {
                $teacher->secret_token = Str::random(5);
            }
        });
    }

    protected $fillable = [
        'name',
        'nip',
        'phone',
        'address',
    ];

    public function jadwal()
    {
        return $this->hasMany(Jadwal::class);
    }
}
