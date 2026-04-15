@extends('layouts.app')

@section('content')
    <div class="p-8 bg-gray-50 min-h-screen">

        <div class="max-w-7xl mx-auto">

            <div
                class="bg-gradient-to-r from-[#3b5bdb] to-[#4c6ef5]
                    rounded-3xl p-10 text-white shadow-xl mb-10">

                <h1 class="text-4xl font-bold mb-4">
                    Buat Laporan Aspirasi
                </h1>

                <p class="text-white/90 max-w-2xl">
                    Sampaikan laporan sarana sekolah dengan jelas dan lengkap.
                    Tim admin akan segera menindaklanjuti laporan kamu.
                </p>
            </div>

            <div class="bg-white rounded-3xl shadow-lg p-10 w-full">

                <form action="{{ route('siswa.pengaduan.store') }}" method="POST" enctype="multipart/form-data"
                    class="space-y-6">
                    @csrf
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">
                            Judul Laporan
                        </label>
                        <input type="text" name="judul_laporan" value="{{ old('judul_laporan') }}"
                            placeholder="Contoh: Kerusakan Kursi di Kelas 10A"
                            class="w-full px-4 py-3 rounded-xl border border-gray-300
                          focus:ring-2 focus:ring-[#4c6ef5]
                          focus:border-transparent outline-none transition duration-300"
                            required>

                        @error('judul_laporan')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">
                            Kategori
                        </label>
                        <select name="kategori_id"
                            class="w-full px-4 py-3 rounded-xl border border-gray-300
                           focus:ring-2 focus:ring-[#4c6ef5]
                           focus:border-transparent outline-none transition duration-300"
                            required>

                            <option value="">Pilih Kategori</option>

                            @foreach ($kategori as $item)
                                <option value="{{ $item->id }}" {{ old('kategori_id') == $item->id ? 'selected' : '' }}>
                                    {{ $item->nama_kategori }}
                                </option>
                            @endforeach
                        </select>

                        @error('kategori_id')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">
                            Lokasi
                        </label>
                        <input type="text" name="lokasi" value="{{ old('lokasi') }}"
                            placeholder="Contoh: Kelas 10A / Lab Komputer"
                            class="w-full px-4 py-3 rounded-xl border border-gray-300
                          focus:ring-2 focus:ring-[#4c6ef5]
                          focus:border-transparent outline-none transition duration-300"
                            required>

                        @error('lokasi')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">
                            Isi Laporan
                        </label>
                        <textarea name="isi_laporan" rows="5" placeholder="Jelaskan detail masalah yang terjadi..."
                            class="w-full px-4 py-3 rounded-xl border border-gray-300
                             focus:ring-2 focus:ring-[#4c6ef5]
                             focus:border-transparent outline-none transition duration-300 resize-none"
                            required>{{ old('isi_laporan') }}</textarea>

                        @error('isi_laporan')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">
                            Upload Foto
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
                            onchange="handleFile(this)" required>

                        <p id="fileError" class="text-red-500 text-sm mt-2 hidden"></p>

                        @error('foto')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="flex justify-end pt-4">
                        <button type="submit"
                            class="px-8 py-3 rounded-xl text-white font-semibold
                       bg-gradient-to-r from-[#3b5bdb] to-[#4c6ef5]
                       hover:opacity-90 hover:scale-105
                       transition duration-300 shadow-lg">
                            Kirim Laporan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @push('scripts')
        <script>
            function handleFile(input) {
                const file = input.files[0];
                const error = document.getElementById('fileError');
                const fileName = document.getElementById('fileName');

                error.classList.add('hidden');

                if (!file) return;

                if (file.size > 2 * 1024 * 1024) {
                    error.innerText = "Ukuran file maksimal 2MB!";
                    error.classList.remove('hidden');
                    input.value = "";
                    fileName.innerText = "Belum ada file dipilih";
                    return;
                }

                fileName.innerText = file.name;
            }
        </script>
    @endpush
@endsection
