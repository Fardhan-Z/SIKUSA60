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

        $now = Carbon::now();

        $laporanTerakhir= Pengaduan::where('user_id', $userId)
            ->latest()
            ->first();

        $jumlahAspirasi = Pengaduan::where('user_id', $userId)
            ->count();

        $totalKategori = Kategori::Count();

        $laporanBulanan = Pengaduan::whereMonth('created_at', $now->month)
            ->whereYear('created_at',$now->year)
            ->count();

        $laporanHarian = Pengaduan::wheredate('created_at', $now->toDateString())
            ->count();
        return view('admin.dashboard', compact('laporanTerakhir','jumlahAspirasi', 'laporanBulanan', 'laporanHarian', 'totalKategori'));
    }
}
