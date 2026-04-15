@extends('layouts.app')

@section('content')
    <div class="p-8 bg-gray-50 min-h-screen">

        <div class="max-w-7xl mx-auto">

            {{-- HEADER --}}
            <div
                class="bg-gradient-to-r from-[#3b5bdb] to-[#4c6ef5]
                    rounded-3xl p-10 text-white shadow-xl mb-10">

                <h1 class="text-4xl font-bold mb-4">
                    Edit Laporan Aspirasi
                </h1>

                <p class="text-white/90 max-w-2xl">
                    Perbarui laporan aspirasi yang telah Anda kirimkan.
                </p>
            </div>

            <div class="bg-white rounded-3xl shadow-lg p-10 w-full">

                <form action="{{ route('siswa.pengaduan.update', $pengaduan->id) }}" method="POST"
                    enctype="multipart/form-data" class="space-y-6">

                    @csrf
                    @method('PUT')

                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">
                            Judul Laporan
                        </label>

                        <input type="text" name="judul_laporan"
                            value="{{ old('judul_laporan', $pengaduan->judul_laporan) }}"
                            class="w-full px-4 py-3 rounded-xl border border-gray-300
                        focus:ring-2 focus:ring-[#4c6ef5] outline-none">
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">
                            Kategori
                        </label>

                        <select name="kategori_id"
                            class="w-full px-4 py-3 rounded-xl border border-gray-300
                        focus:ring-2 focus:ring-[#4c6ef5] outline-none">

                            @foreach ($kategori as $item)
                                <option value="{{ $item->id }}"
                                    {{ $pengaduan->kategori_id == $item->id ? 'selected' : '' }}>
                                    {{ $item->nama_kategori }}
                                </option>
                            @endforeach

                        </select>
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">
                            Lokasi
                        </label>

                        <input type="text" name="lokasi" value="{{ old('lokasi', $pengaduan->lokasi) }}"
                            class="w-full px-4 py-3 rounded-xl border border-gray-300
                        focus:ring-2 focus:ring-[#4c6ef5] outline-none">
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">
                            Isi Laporan
                        </label>

                        <textarea name="isi_laporan" rows="5"
                            class="w-full px-4 py-3 rounded-xl border border-gray-300
                        focus:ring-2 focus:ring-[#4c6ef5] outline-none resize-none">{{ old('isi_laporan', $pengaduan->isi_laporan) }}</textarea>
                    </div>

                    @if ($pengaduan->foto)
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">
                                Foto Saat Ini
                            </label>

                            <img src="{{ asset($pengaduan->foto) }}" class="w-52 rounded-lg shadow">
                        </div>
                    @endif


                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">
                            Ganti Foto (Opsional)
                        </label>

                        <div class="flex items-center gap-4">
                            <label for="fotoInput"
                                class="px-6 py-3 bg-gradient-to-r from-[#3b5bdb] to-[#4c6ef5]
                   text-white font-semibold rounded-xl cursor-pointer
                   hover:opacity-90 transition">
                                Pilih File
                            </label>

                            <span id="fileName" class="text-sm text-gray-500">
                                Belum ada file dipilih
                            </span>
                        </div>

                        <input type="file" name="foto" id="fotoInput" class="hidden" accept="image/*"
                            onchange="handleFile(this)">

                        <p id="fileError" class="text-red-500 text-sm mt-2 hidden"></p>

                        @error('foto')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                   <div class="flex justify-end gap-4 pt-4">
                        <a href="{{ route('siswa.pengaduan.histori') }}"
                            class="px-8 py-3 rounded-xl font-semibold
                            bg-gray-200 text-gray-700
                            hover:bg-gray-300 transition duration-300">
                            Kembali
                        </a>

                        <button type="submit"
                            class="px-8 py-3 rounded-xl text-white font-semibold
                            bg-gradient-to-r from-[#3b5bdb] to-[#4c6ef5]
                            hover:opacity-90 hover:scale-105
                            transition duration-300 shadow-lg">
                            Update Laporan
                        </button>
                    </div>

                </form>

            </div>
        </div>
    </div>
@endsection
