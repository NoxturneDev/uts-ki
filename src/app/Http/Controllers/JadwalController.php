<?php

namespace App\Http\Controllers;

use App\Helpers\EncryptionHelper;
use Illuminate\Http\Request;

class JadwalController extends Controller
{
    
    public function index(Request $request)
    {
        $teacher = $request->get('authenticated_teacher');
        $jadwal = $teacher
            ->jadwal()
            ->with(['parallel', 'teacher', 'jamPelajaran', 'mataPelajaran'])
            ->get();

        $encryptedResponse = EncryptionHelper::encrypt(json_encode($jadwal));
        return response()->json(['data' => $encryptedResponse]);

    }
}
