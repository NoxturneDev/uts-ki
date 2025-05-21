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

        static::creating(function ($teacher){
            if(empty($teacher->secret_token)){
                $teacher->secret_token = Str::random(5);
            }
        });
    }

    protected $fillable = [
        'name',
        'nip',
        'email',
        'password',
        'phone',
        'address',
    ];

    public function jadwal()
    {
        return $this->hasMany(Jadwal::class);
    }
}
