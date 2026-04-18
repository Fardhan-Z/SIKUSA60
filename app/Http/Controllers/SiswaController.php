<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
Use App\Models\Pengaduan;
Use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Models\Kategori;

class SiswaController extends Controller
{
    public function dashboard() {

        $userId = Auth::id();

        $laporanTerakhir= Pengaduan::where('user_id', $userId)
            ->latest()
            ->first();

        $jumlahAspirasi = Pengaduan::where('user_id', $userId)
            ->count();

        return view('siswa.dashboard', compact('laporanTerakhir','jumlahAspirasi'));
    }
}
