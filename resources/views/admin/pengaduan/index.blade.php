@extends('layouts.app')

@section('content')
    <div class="p-8 bg-gray-50 min-h-screen">

        <div class="flex items-center gap-3 mb-6">
            <div class="flex-1">
                <input type="text" id="searchInput" placeholder="Cari Pengaduan..."
                    class="w-full pl-4 pr-4 py-2 rounded-full border border-gray-300 bg-white shadow-sm
        focus:ring-2 focus:ring-indigo-500 focus:outline-none text-sm">
            </div>
        </div>

        <div class="bg-white rounded-2xl shadow-md overflow-hidden">
            <table class="min-w-full text-sm text-gray-600">
                <thead class="bg-gradient-to-r from-[#3b5bdb] to-[#4c6ef5] text-white text-xs uppercase tracking-wider">
                    <tr>
                        <th class="px-6 py-4 text-left">No</th>
                        <th class="px-6 py-4 text-left">Judul</th>
                        <th class="px-6 py-4 text-left">Kategori</th>
                        <th class="px-6 py-4 text-left">Status</th>
                        <th class="px-6 py-4 text-left">Tanggal</th>
                        <th class="px-6 py-4 text-center">Aksi</th>
                    </tr>
                </thead>

                <tbody class="divide-y divide-gray-100">
                    @forelse ($pengaduans as $item)
                        <tr class="user-row hover:bg-gray-50 transition duration-200">

                            <td class="px-6 py-4 searchable">
                                {{ $pengaduans->firstItem() + $loop->index }}
                            </td>

                            <td class="px-6 py-4 font-semibold text-gray-800 searchable">
                                {{ $item->judul_laporan }}
                            </td>

                            <td class="px-6 py-4 searchable">
                                {{ $item->kategori->nama_kategori ?? '-' }}
                            </td>

                            <td class="px-6 py-4 searchable">
                                @if ($item->status == 'Menunggu')
                                    <span class="px-3 py-1 text-xs rounded-full bg-yellow-400 text-white">
                                        Menunggu
                                    </span>
                                @elseif ($item->status == 'Ditolak')
                                    <span class="px-3 py-1 text-xs rounded-full bg-red-400 text-white">
                                        Ditolak
                                    </span>
                                @elseif ($item->status == 'Diproses')
                                    <span class="px-3 py-1 text-xs rounded-full bg-blue-400 text-white">
                                        Diproses
                                    </span>
                                @else
                                    <span class="px-3 py-1 text-xs rounded-full bg-green-400 text-white">
                                        Selesai
                                    </span>
                                @endif
                            </td>

                            <td class="px-6 py-4 text-gray-500 searchable">
                                {{ $item->created_at->format('d M Y') }}
                            </td>

                            <td class="px-6 py-4 text-center">
                                <div class="flex justify-center gap-2">

                                    <a href="{{ route('admin.pengaduan.show', $item->id) }}"
                                        class="px-3 py-1 text-xs rounded-full
            bg-indigo-500 hover:bg-indigo-600
            text-white shadow transition">
                                        Detail
                                    </a>

                                    <a href="{{ route('admin.pengaduan.edit', $item->id) }}"
                                        class="px-3 py-1 text-xs rounded-full
                bg-yellow-400 hover:bg-yellow-500
                text-white shadow transition">
                                        Proses
                                    </a>


                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center py-10 text-gray-400">
                                Belum ada pengaduan
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="mt-6">
            {{ $pengaduans->links() }}
        </div>

    </div>
    @push('scripts')
        <script>
            document.getElementById("searchInput").addEventListener("keyup", function() {
                let keyword = this.value.toLowerCase();
                let rows = document.querySelectorAll(".user-row");

                rows.forEach(row => {
                    let searchableCells = row.querySelectorAll(".searchable");

                    let found = false;

                    searchableCells.forEach(cell => {
                        if (cell.innerText.toLowerCase().includes(keyword)) {
                            found = true;
                        }
                    });

                    row.style.display = found ? "" : "none";
                });
            });
        </script>
    @endpush
@endsection
