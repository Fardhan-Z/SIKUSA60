@extends('layouts.app')

@section('content')
    <div class="p-8 bg-gray-50 min-h-screen">

        <div class="max-w-7xl mx-auto">

            <div class="mb-6 flex items-center justify-between">
                <a href="{{ route('siswa.pengaduan.histori') }}"
                    class="px-4 py-2 bg-gray-200 rounded-lg hover:bg-gray-300 text-sm">
                    Kembali
                </a>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

                <div class="lg:col-span-2 bg-white rounded-2xl shadow p-6">

                    <h2 class="text-xl font-bold text-gray-800 mb-6">
                        Detail Aspirasi
                    </h2>

                    <div class="space-y-5">

                        <div class="flex justify-between">
                            <span class="text-gray-500 text-sm">Tanggal Pengaduan</span>
                            <span class="text-sm">
                                {{ $pengaduan->created_at->format('d M Y') }}
                            </span>
                        </div>

                        <div class="flex justify-between items-center">
                            <span class="text-gray-500 text-sm">Kategori</span>
                            <span class="px-3 py-1 bg-blue-100 text-blue-600 rounded-full text-xs">
                                {{ $pengaduan->kategori->nama_kategori ?? '-' }}
                            </span>
                        </div>

                        <div>
                            <span class="text-gray-500 text-sm">Judul</span>
                            <p class="font-semibold text-gray-800">
                                {{ $pengaduan->judul_laporan }}
                            </p>
                        </div>

                        <div>
                            <span class="text-gray-500 text-sm">Isi Laporan</span>
                            <p class="text-gray-700">
                                {{ $pengaduan->isi_laporan }}
                            </p>
                        </div>

                        <div class="flex justify-between items-center">
                            <span class="text-gray-500 text-sm">Status</span>

                            <span
                                class="px-3 py-1 text-xs rounded-full
                            @if ($pengaduan->status == 'Menunggu') bg-yellow-100 text-yellow-700
                            @elseif($pengaduan->status == 'Ditolak') bg-red-100 text-red-700
                            @elseif($pengaduan->status == 'Diproses') bg-blue-100 text-blue-700
                            @else bg-green-100 text-green-700 @endif">
                                {{ $pengaduan->status }}
                            </span>
                        </div>

                        @if ($pengaduan->tgl_selesai)
                        <div class="flex justify-between">
                            <span class="text-gray-500 text-sm">Tanggal Selesai</span>
                            <span class="text-sm">
                                {{ $pengaduan->tgl_selesai->format('d M Y') }}
                            </span>
                        </div>
                        @endif

                        @if ($pengaduan->foto)
                            <div>
                                <label class="block text-sm font-medium text-gray-600 mb-1">Foto</label>
                                <img src="{{ asset($pengaduan->foto) }}" class="rounded-xl w-full max-h-64 object-cover">
                            </div>
                        @endif

                    </div>

                </div>

                <div class="bg-white rounded-2xl shadow p-6">

                    <h2 class="text-lg font-bold text-gray-800 mb-4">
                        Tanggapan ({{ $pengaduan->tanggapans->count() }})
                    </h2>

                    <div class="space-y-4">

                        @forelse($pengaduan->tanggapans as $tanggapan)
                            <div class="p-4 rounded-xl border bg-gray-50">

                                <div class="flex justify-between items-center mb-2">

                                    <div>
                                        <p class="text-sm font-semibold text-blue-600">
                                            {{ $tanggapan->user->name ?? 'Admin' }}
                                        </p>
                                        <p class="text-xs text-gray-400">
                                            {{ $tanggapan->created_at->format('d M Y') }}
                                        </p>
                                    </div>

                                    <span
                                        class="px-2 py-1 text-xs rounded-full
                                    @if ($pengaduan->status == 'Diproses') bg-blue-100 text-blue-700
                                    @elseif($pengaduan->status == 'Ditolak') bg-red-100 text-red-700
                                    @elseif($pengaduan->status == 'Selesai') bg-green-100 text-green-700
                                    @else bg-gray-100 text-gray-500 @endif">
                                        {{ $pengaduan->status }}
                                    </span>

                                </div>

                                <p class="text-sm text-gray-700">
                                    {{ $tanggapan->tanggapans }}
                                </p>

                            </div>
                        @empty
                            <p class="text-sm text-gray-400">
                                Belum ada tanggapan
                            </p>
                        @endforelse

                    </div>

                </div>

            </div>

        </div>

    </div>
@endsection
