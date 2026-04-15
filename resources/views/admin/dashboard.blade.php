@extends('layouts.app')

@section('content')
    <div class="min-h-screen bg-gray-50 py-10 px-6">

        <div class="max-w-7xl mx-auto space-y-12">

            <div
                class="bg-gradient-to-r from-[#3b5bdb] to-[#4c6ef5]
                    rounded-3xl p-10 text-white shadow-xl">

                <div class="inline-block bg-white/20 backdrop-blur px-4 py-2 rounded-full text-sm mb-6">
                    Selamat Datang, {{ auth()->user()->name }}
                </div>

                <h1 class="text-4xl md:text-5xl font-bold mb-6">
                    Dashboard Admin SIKUSA
                </h1>

                <p class="text-white/90 max-w-2xl mb-10">
                    Kelola laporan sarana sekolah, manajemen kategori, dan data pengguna
                    dengan sistem yang transparan dan terstruktur.
                </p>
            </div>
            <div class="max-w-7xl mx-auto mt-12">
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">

                    {{-- LAPORAN BULANAN --}}
                    <div
                        class="bg-white rounded-2xl shadow-sm hover:shadow-lg hover:-translate-y-1 transition duration-300 p-6">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-sm text-gray-500 mb-2">Laporan Bulan Ini</p>
                                <h3 class="text-3xl font-bold text-gray-800">{{ $laporanBulanan }}</h3>
                                <p class="text-xs text-gray-400 mt-2">Total laporan bulan berjalan</p>
                            </div>
                            <div class="w-14 h-14 flex items-center justify-center rounded-2xl bg-indigo-100">
                                <svg class="w-7 h-7 text-indigo-600" fill="none" stroke="currentColor" stroke-width="2"
                                    viewBox="0 0 24 24">
                                    <path d="M9 12h6M9 16h6M9 8h6M5 4h14v16H5z" />
                                </svg>
                            </div>
                        </div>
                    </div>

                    {{-- LAPORAN HARIAN --}}
                    <div
                        class="bg-white rounded-2xl shadow-sm hover:shadow-lg hover:-translate-y-1 transition duration-300 p-6">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-sm text-gray-500 mb-2">Laporan Hari Ini</p>
                                <h3 class="text-3xl font-bold text-gray-800">{{ $laporanHarian }}</h3>
                                <p class="text-xs text-gray-400 mt-2">Jumlah laporan hari ini</p>
                            </div>
                            <div class="w-14 h-14 flex items-center justify-center rounded-2xl bg-blue-100">
                                <svg class="w-7 h-7 text-blue-600" fill="none" stroke="currentColor" stroke-width="2"
                                    viewBox="0 0 24 24">
                                    <path d="M12 6v6l4 2" />
                                </svg>
                            </div>
                        </div>
                    </div>

                    {{-- TOTAL KATEGORI --}}
                    <div
                        class="bg-white rounded-2xl shadow-sm hover:shadow-lg hover:-translate-y-1 transition duration-300 p-6">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-sm text-gray-500 mb-2">Total Kategori</p>
                                <h3 class="text-3xl font-bold text-gray-800">{{ $totalKategori }}</h3>
                                <p class="text-xs text-gray-400 mt-2">Kategori tersedia</p>
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
    </div>
@endsection
