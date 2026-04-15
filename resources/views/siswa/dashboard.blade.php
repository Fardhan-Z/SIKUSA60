@extends('layouts.app')

@section('content')
<div class="p-8 bg-gray-50 min-h-screen">
    <div class="max-w-7xl mx-auto">

        <div class="bg-gradient-to-r from-[#3b5bdb] to-[#4c6ef5] rounded-3xl p-10 text-white shadow-lg">

            <div class="inline-block bg-white/20 backdrop-blur px-4 py-2 rounded-full text-sm mb-6">
                Halo, {{ auth()->user()->name }}
            </div>

            <h1 class="text-4xl md:text-5xl font-bold leading-tight mb-6">
                Dashboard Siswa SIKUSA
            </h1>

            <p class="text-white/90 max-w-2xl mb-10">
                Pantau laporan sarana yang kamu kirim, lihat status penanganan,
                dan pastikan sekolah kita tetap nyaman bersama.
            </p>


        </div>
    </div>

    <div class="max-w-7xl mx-auto mt-12">
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">

            <div class="bg-white rounded-2xl shadow-sm hover:shadow-lg hover:-translate-y-1 transition duration-300 p-6">
                <div class="flex items-center justify-between">
                    <div>
                        <h3 class="text-lg font-bold text-gray-800">
                            {{ $laporanTerakhir->judul_laporan ?? 'Belum ada laporan' }}
                        </h3>

                        <p class="text-xs mt-2
                            @if(($laporanTerakhir->status ?? '') == 'Diproses') text-yellow-500
                            @elseif(($laporanTerakhir->status ?? '') == 'Selesai') text-green-500
                            @elseif(($laporanTerakhir->status ?? '') == 'Ditolak') text-red-500
                            @else text-gray-400
                            @endif
                        ">
                            Status: {{ $laporanTerakhir->status ?? '-' }}
                        </p>
                    </div>
                    <div class="w-14 h-14 flex items-center justify-center rounded-2xl bg-indigo-100">
                        <svg class="w-7 h-7 text-indigo-600" fill="none" stroke="currentColor" stroke-width="2"
                            viewBox="0 0 24 24">
                            <path d="M9 12h6M9 16h6M9 8h6M5 4h14v16H5z" />
                        </svg>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-2xl shadow-sm hover:shadow-lg hover:-translate-y-1 transition duration-300 p-6">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm text-gray-500 mb-2">Jumlah Aspirasi</p>
                        <h3 class="text-3xl font-bold text-gray-800">{{ $jumlahAspirasi }}</h3>
                    </div>
                    <div class="w-14 h-14 flex items-center justify-center rounded-2xl bg-blue-100">
                        <svg class="w-7 h-7 text-blue-600" fill="none" stroke="currentColor" stroke-width="2"
                            viewBox="0 0 24 24">
                            <path d="M12 6v6l4 2" />
                        </svg>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-2xl shadow-sm hover:shadow-lg hover:-translate-y-1 transition duration-300 p-6">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm text-gray-500 mb-2">Butuh Melapor?</p>
                        <h3 class="text-lg font-bold text-gray-800">Buat Laporan Baru</h3>
                        <a href="{{ route('siswa.pengaduan.create') }}" class="text-sm text-indigo-600 font-semibold mt-2 inline-block">
                            Kirim Aspirasi
                        </a>
                    </div>
                    <div class="w-14 h-14 flex items-center justify-center rounded-2xl bg-green-100">
                        <svg class="w-7 h-7 text-green-600" fill="none" stroke="currentColor" stroke-width="2"
                            viewBox="0 0 24 24">
                            <path d="M12 4v16M4 12h16" />
                        </svg>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
