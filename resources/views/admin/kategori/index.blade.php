@extends('layouts.app')

@section('content')
    <div class="p-8 bg-gray-50 min-h-screen">
        <div class="flex items-center gap-3 mb-6">
            <div class="flex-1">
                <input type="text" id="searchInput" placeholder="Cari kategori..."
                    class="w-full pl-4 pr-4 py-2 rounded-full border border-gray-300 bg-white shadow-sm
        focus:ring-2 focus:ring-indigo-500 focus:outline-none text-sm">
            </div>

            <button onclick="openModal()"
                class="whitespace-nowrap bg-gradient-to-r from-[#3b5bdb] to-[#4c6ef5]
        hover:scale-105 transition
        text-white px-5 py-2 rounded-full shadow-md text-sm font-medium">
                Tambah Kategori
            </button>
        </div>
        <div class="bg-white rounded-2xl shadow-md overflow-hidden">
            <table class="min-w-full text-sm text-gray-600">
                <thead class="bg-gradient-to-r from-[#3b5bdb] to-[#4c6ef5] text-white text-xs uppercase tracking-wider">
                    <tr>
                        <th class="px-6 py-4 text-left">No</th>
                        <th class="px-6 py-4 text-left">Nama Kategori</th>
                        <th class="px-6 py-4 text-left">Dibuat</th>
                        <th class="px-6 py-4 text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    @forelse ($kategori as $item)
                        <tr class="user-row hover:bg-gray-50 transition duration-200">
                            <td class="px-6 py-4 font-medium">
                                {{ $loop->iteration }}
                            </td>
                            <td class="px-6 py-4 font-semibold text-gray-800 searchable">
                                {{ $item->nama_kategori }}
                            </td>
                            <td class="px-6 py-4 text-gray-500">
                                {{ $item->created_at->format('d M Y') }}
                            </td>
                            <td class="px-6 py-4 text-center space-x-2">
                                <button onclick='openEditKategoriModal(@json($item))'
                                    class="px-3 py-1 text-xs rounded-full
                                    bg-yellow-400 hover:bg-yellow-500
                                    text-white shadow transition">
                                    Edit
                                </button>
                                <form action="{{ route('kategori.destroy', $item->id) }}" method="POST"
                                    class="inline-block" onsubmit="return confirm('Yakin hapus kategori ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button
                                        class="px-3 py-1 text-xs rounded-full
                                       bg-red-500 hover:bg-red-600
                                       text-white shadow transition">
                                        Hapus
                                    </button>
                                </form>
                                @include('admin.kategori.edit')
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center py-10 text-gray-400">
                                Belum ada kategori
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="mt-6">
            {{ $kategori->links() }}
        </div>
    </div>
    @include('admin.kategori.create')
    @push('scripts')
        <script>
            function openModal() {
                const modal = document.getElementById('modalCreateKategori');
                const box = document.getElementById('modalBox');

                modal.classList.remove('hidden');
                modal.classList.add('flex');

                setTimeout(() => {
                    modal.classList.remove('opacity-0');
                    box.classList.remove('scale-95', 'opacity-0');
                    box.classList.add('scale-100', 'opacity-100');
                }, 10);
            }

            function closeModal() {
                const modal = document.getElementById('modalCreateKategori');
                const box = document.getElementById('modalBox');

                modal.classList.add('opacity-0');
                box.classList.add('scale-95', 'opacity-0');
                box.classList.remove('scale-100', 'opacity-100');

                setTimeout(() => {
                    modal.classList.add('hidden');
                }, 300);
            }

            function openEditKategoriModal(kategori) {
                const modal = document.getElementById('modalEditKategori');
                const box = document.getElementById('modalEditKategoriBox');

                document.getElementById('formEditKategori').action = `/admin/kategori/${kategori.id}`;

                document.getElementById('edit_nama_kategori').value = kategori.nama_kategori;

                modal.classList.remove('hidden');
                modal.classList.add('flex');

                setTimeout(() => {
                    box.classList.remove('scale-95', 'opacity-0');
                    box.classList.add('scale-100', 'opacity-100');
                }, 10);
            }

            function closeEditKategoriModal() {
                const modal = document.getElementById('modalEditKategori');
                const box = document.getElementById('modalEditKategoriBox');

                box.classList.add('scale-95', 'opacity-0');
                box.classList.remove('scale-100', 'opacity-100');

                setTimeout(() => {
                    modal.classList.add('hidden');
                }, 300);
            }

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
