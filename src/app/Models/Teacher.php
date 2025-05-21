<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'nip',
        'email',
        'password',
        'phone',
        'address',
    ];

    public function jadwals()
    {
        return $this->hasMany(Jadwal::class);
    }
}
