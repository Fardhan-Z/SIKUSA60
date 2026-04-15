@extends('layouts.app')

@section('content')
<div class="p-8 bg-gray-50 min-h-screen">

    <div class="max-w-6xl mx-auto space-y-8">

        <div class="bg-gradient-to-r from-indigo-600 to-blue-600
                    text-white p-8 rounded-3xl shadow-lg">
            <h1 class="text-3xl font-bold">Detail Laporan Aspirasi</h1>
            <p class="text-white/80 mt-2">
                Dikirim oleh: {{ $pengaduan->user->name }}
            </p>
        </div>

        <div class="bg-white rounded-3xl shadow-lg p-8 space-y-6">

            <div>
                <h2 class="text-xl font-semibold text-gray-800">
                    {{ $pengaduan->judul_laporan }}
                </h2>
            </div>

            <div class="grid grid-cols-2 gap-6 text-sm">
                <div>
                    <p class="text-gray-500">Kategori</p>
                    <p class="font-medium">{{ $pengaduan->kategori->nama_kategori }}</p>
                </div>

                <div>
                    <p class="text-gray-500">Lokasi</p>
                    <p class="font-medium">{{ $pengaduan->lokasi }}</p>
                </div>

                <div>
                    <p class="text-gray-500">Status</p>
                    <span class="px-3 py-1 rounded-full text-white text-xs
                        @if($pengaduan->status == 'menunggu') bg-yellow-500
                        @elseif($pengaduan->status == 'proses') bg-blue-500
                        @else bg-green-500
                        @endif">
                        {{ ucfirst($pengaduan->status) }}
                    </span>
                </div>

                <div>
                    <p class="text-gray-500">Tanggal</p>
                    <p class="font-medium">
                        {{ $pengaduan->created_at->format('d M Y H:i') }}
                    </p>
                </div>
            </div>

            <div>
                <p class="text-gray-500 mb-2">Isi Laporan</p>
                <div class="bg-gray-100 p-4 rounded-xl">
                    {{ $pengaduan->isi_laporan }}
                </div>
            </div>

            @if($pengaduan->foto)
                <div>
                    <p class="text-gray-500 mb-2">Foto</p>
                    <img src="{{ asset('storage/'.$pengaduan->foto) }}"
                         class="rounded-xl max-h-72 shadow-md">
                </div>
            @endif
        </div>

        <div class="bg-white rounded-3xl shadow-lg p-8">

            <h2 class="text-lg font-semibold mb-6">
                Update Status & Beri Tanggapan
            </h2>

            <form action="{{ route('admin.pengaduan.update',$pengaduan->id) }}"
                  method="POST"
                  class="space-y-6">

                @csrf
                @method('PUT')

                <div>
                    <label class="block text-sm font-semibold mb-2">
                        Status
                    </label>
                    <select name="status"
                        class="w-full px-4 py-3 rounded-xl border border-gray-300
                               focus:ring-2 focus:ring-indigo-500 outline-none">

                        <option value="menunggu"
                            {{ $pengaduan->status == 'menunggu' ? 'selected' : '' }}>
                            Menunggu
                        </option>

                        <option value="proses"
                            {{ $pengaduan->status == 'proses' ? 'selected' : '' }}>
                            Proses
                        </option>

                        <option value="selesai"
                            {{ $pengaduan->status == 'selesai' ? 'selected' : '' }}>
                            Selesai
                        </option>
                    </select>
                </div>

                <div>
                    <label class="block text-sm font-semibold mb-2">
                        Tanggapan Admin
                    </label>
                    <textarea name="tanggapan"
                        rows="4"
                        placeholder="Berikan tanggapan untuk laporan ini..."
                        class="w-full px-4 py-3 rounded-xl border border-gray-300
                               focus:ring-2 focus:ring-indigo-500 outline-none resize-none">{{ $pengaduan->tanggapan }}</textarea>
                </div>

                <div class="flex justify-end">
                    <button type="submit"
                        class="px-8 py-3 rounded-xl text-white font-semibold
                               bg-gradient-to-r from-indigo-600 to-blue-600
                               hover:scale-105 transition duration-300 shadow-lg">
                        Simpan Perubahan
                    </button>
                </div>

            </form>

        </div>

    </div>
</div>
@endsection
