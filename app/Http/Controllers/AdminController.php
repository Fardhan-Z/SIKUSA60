<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Kategori;
use App\Models\Pengaduan;

class AdminController extends Controller
{
    public function dashboard() {
        $now = Carbon::now();

        $totalKategori = Kategori::Count();

        $laporanBulanan = Pengaduan::whereMonth('created_at', $now->month)
            ->whereYear('created_at',$now->year)
            ->count();

        $laporanHarian = Pengaduan::wheredate('created_at', $now->toDateString())
            ->count();
        return view('admin.dashboard', compact('totalKategori','laporanBulanan','laporanHarian'));
    }
}
