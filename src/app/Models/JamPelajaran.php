<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JamPelajaran extends Model
{
    protected $table="jam_pelajarans";    
    public $timestamps = false;
    
    public function kelas(){
        return $this->belongsTo('App\Models\Kelas', 'kelas_id');
    }
}
