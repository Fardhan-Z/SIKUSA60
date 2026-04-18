@extends('layouts.app')

@section('content')
    <div class="p-8 bg-gray-50 min-h-screen">

        <div class="max-w-7xl mx-auto">

            <div
                class="bg-gradient-to-r from-[#3b5bdb] to-[#4c6ef5]
                    rounded-3xl p-10 text-white shadow-xl mb-10">
                <h1 class="text-3xl font-bold mb-2">
                    Proses Laporan Aspirasi
                </h1>
                <p class="text-white/90">
                    Perbarui status dan berikan tanggapan terhadap laporan siswa.
                </p>
            </div>

            <form action="{{ route('admin.pengaduan.feedback', $pengaduan->id) }}" method="POST"
                class="grid grid-cols-1 md:grid-cols-2 gap-8">
                @csrf
                @method('PUT')

                <div class="bg-white rounded-3xl shadow p-8 space-y-5">

                    <h2 class="text-lg font-semibold text-gray-700">
                        Informasi Laporan
                    </h2>

                    <div>
                        <label class="block text-sm font-medium text-gray-600 mb-1">Judul</label>
                        <input type="text" value="{{ $pengaduan->judul_laporan }}"
                            class="w-full px-4 py-3 rounded-xl border border-gray-300 " readonly>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-600 mb-1">Kategori</label>
                        <input type="text" value="{{ $pengaduan->kategori->nama_kategori ?? '-' }}"
                            class="w-full px-4 py-3 rounded-xl border border-gray-300" readonly>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-600 mb-1">Status</label>
                        <input type="text" value="{{ $pengaduan->status ?? '-' }}"
                            class="w-full px-4 py-3 rounded-xl border border-gray-300" readonly>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-600 mb-1">Lokasi</label>
                        <input type="text" value="{{ $pengaduan->lokasi }}"
                            class="w-full px-4 py-3 rounded-xl border border-gray-300" readonly>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-600 mb-1">Isi Laporan</label>
                        <textarea rows="5" class="w-full px-4 py-3 rounded-xl border border-gray-300 resize-none" readonly>{{ $pengaduan->isi_laporan }}</textarea>
                    </div>

                    @if ($pengaduan->foto)
                        <div>
                            <label class="block text-sm font-medium text-gray-600 mb-1">Foto</label>
                            <img src="{{ asset($pengaduan->foto) }}" class="rounded-xl w-full max-h-64 object-cover">
                        </div>
                    @endif

                </div>

                <div class="bg-white rounded-3xl shadow p-8 space-y-5">

                    <h2 class="text-lg font-semibold text-gray-700">
                        Tanggapan Admin
                    </h2>

                    <div>
                        <label class="block text-sm font-medium text-gray-600 mb-1">Status</label>
                        <select name="status_tanggapan"
                            class="w-full px-4 py-3 rounded-xl border border-gray-300
                            focus:ring-2 focus:ring-[#4c6ef5] outline-none">

                            <option value="Ditolak"
                                {{ old('status', $tanggapan->status ?? '') == 'Ditolak' ? 'selected' : '' }}>
                                Ditolak
                            </option>

                            <option value="Diproses"
                                {{ old('status', $tanggapan->status ?? '') == 'Diproses' ? 'selected' : '' }}>
                                Diproses
                            </option>

                            <option value="Selesai"
                                {{ old('status', $tanggapan->status ?? '') == 'Selesai' ? 'selected' : '' }}>
                                Selesai
                            </option>

                        </select>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-600 mb-1">
                            Feedback / Tanggapan
                        </label>
                        <textarea name="tanggapan" rows="5" placeholder="Tulis tanggapan..."
                            class="w-full px-4 py-3 rounded-xl border border-gray-300
                               focus:ring-2 focus:ring-[#4c6ef5] outline-none resize-none"></textarea>
                    </div>
                    <div class="flex justify-end items-center pt-4">
                        <a href="{{ route('admin.pengaduan.index') }}"
                            class="px-6 py-3 rounded-xl text-sm font-semibold
               bg-gray-200 hover:bg-gray-300 transition shadow text-gray-800 mr-4">
                            Kembali
                        </a>
                        <button type="submit"
                            class="px-6 py-3 rounded-xl text-sm font-semibold text-white
               bg-gradient-to-r from-[#3b5bdb] to-[#4c6ef5]
               hover:opacity-90 transition shadow">
                            Simpan
                        </button>
                    </div>

                </div>

            </form>
        </div>
    </div>
@endsection
