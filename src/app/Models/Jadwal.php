<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jadwal extends Model
{
    use HasFactory;

    protected $fillable = [
        'jam_pelajaran_id',
        'mata_pelajaran_id',
        'parallel_id',
        'teacher_id',
    ];

    public function jamPelajaran()
    {
        return $this->belongsTo(JamPelajaran::class);
    }
    public function mataPelajaran()
    {
        return $this->belongsTo(MataPelajaran::class);
    }
    public function teacher()
    {
        return $this->belongsTo(Teacher::class);
    }
    public function parallel()
    {
        return $this->belongsTo(Parallel::class);
    }
}
