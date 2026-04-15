@extends('layouts.app')

@section('content')
    <div class="p-8 bg-gray-50 min-h-screen">
        <div class="flex items-center gap-3 mb-6">
            <div class="flex-1">
                <input type="text" id="searchInput" placeholder="Cari Nama, NIP/NIS, Kelas..."
                    class="w-full pl-4 pr-4 py-2 rounded-full border border-gray-300 bg-white shadow-sm
        focus:ring-2 focus:ring-indigo-500 focus:outline-none text-sm">
            </div>

            <button onclick="openUserModal()"
                class="whitespace-nowrap bg-gradient-to-r from-[#3b5bdb] to-[#4c6ef5]
        hover:scale-105 transition
        text-white px-5 py-2 rounded-full shadow-md text-sm font-medium">
                Tambah User
            </button>
        </div>

        <div class="bg-white rounded-2xl shadow-md overflow-hidden">
            <table class="min-w-full text-sm text-gray-600">
                <thead class="bg-gradient-to-r from-[#3b5bdb] to-[#4c6ef5] text-white text-xs uppercase tracking-wider">
                    <tr>
                        <th class="px-6 py-4 text-left">No</th>
                        <th class="px-6 py-4 text-left">Nama</th>
                        <th class="px-6 py-4 text-left">NIP/NIS</th>
                        <th class="px-6 py-4 text-left">Kelas</th>
                        <th class="px-6 py-4 text-left">Role</th>
                        <th class="px-6 py-4 text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    @foreach ($users as $user)
                        <tr class="user-row hover:bg-gray-50 transition duration-200">
                            <td class="px-6 py-4 font-medium searchable">
                                {{ $loop->iteration }}
                            </td>
                            <td class="px-6 py-4 font-semibold text-gray-800 searchable">
                                {{ $user->nama }}
                            </td>
                            <td class="px-6 py-4 text-gray-500 searchable">
                                {{ $user->nip_nis }}
                            </td>

                            <td class="px-6 py-4 searchable">
                                {{ $user->kelas }}
                            </td>
                            <td class="px-6 py-4 searchable">
                                @if ($user->role === 'admin')
                                    <span
                                        class="px-3 py-1 text-xs font-semibold rounded-full
                                         bg-purple-100 text-purple-700">
                                        Admin
                                    </span>
                                @else
                                    <span
                                        class="px-3 py-1 text-xs font-semibold rounded-full
                                         bg-green-100 text-green-700">
                                        Siswa
                                    </span>
                                @endif
                            </td>
                            <td class="px-6 py-4 text-center space-x-2">
                                <button onclick='openEditUserModal(@json($user))'
                                    class="px-3 py-1 text-xs rounded-full
                                    bg-yellow-400 hover:bg-yellow-500
                                    text-white shadow transition">
                                    Edit
                                </button>

                                <form action="/admin/users/{{ $user->id }}" method="POST" class="inline-block"
                                    onsubmit="return confirm('Yakin hapus user ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button
                                        class="px-3 py-1 text-xs rounded-full
                                       bg-red-500 hover:bg-red-600
                                       text-white shadow transition">
                                        Hapus
                                    </button>
                                </form>
                                @include('admin.users.edit')
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="mt-6">
            {{ $users->links() }}
        </div>

    </div>
    @include('admin.users.create')
    @push('scripts')
        <script>
            function openUserModal() {
                const modal = document.getElementById('modalCreateUser');
                const box = document.getElementById('modalUserBox');

                modal.classList.remove('hidden');
                modal.classList.add('flex');

                setTimeout(() => {
                    modal.classList.remove('opacity-0');
                    box.classList.remove('scale-95', 'opacity-0');
                    box.classList.add('scale-100', 'opacity-100');
                }, 10);
            }

            function closeUserModal() {
                const modal = document.getElementById('modalCreateUser');
                const box = document.getElementById('modalUserBox');

                modal.classList.add('opacity-0');
                box.classList.add('scale-95', 'opacity-0');
                box.classList.remove('scale-100', 'opacity-100');

                setTimeout(() => {
                    modal.classList.add('hidden');
                }, 300);
            }

            function openEditUserModal(user) {
                const modal = document.getElementById('modalEditUser');
                const box = document.getElementById('modalEditUserBox');

                document.getElementById('formEditUser').action = `/admin/users/${user.id}`;

                document.getElementById('edit_nama').value = user.nama;
                document.getElementById('edit_nip_nis').value = user.nip_nis;
                document.getElementById('edit_role').value = user.role;
                document.getElementById('edit_kelas').value = user.kelas ?? '';

                toggleKelasEdit();

                modal.classList.remove('hidden');
                modal.classList.add('flex');

                setTimeout(() => {
                    modal.classList.remove('opacity-0');
                    box.classList.remove('scale-95', 'opacity-0');
                    box.classList.add('scale-100', 'opacity-100');
                }, 10);
            }

            function closeEditUserModal() {
                const modal = document.getElementById('modalEditUser');
                const box = document.getElementById('modalEditUserBox');

                modal.classList.add('opacity-0');
                box.classList.add('scale-95', 'opacity-0');
                box.classList.remove('scale-100', 'opacity-100');

                setTimeout(() => {
                    modal.classList.add('hidden');
                }, 300);
            }

            function toggleKelasEdit() {
                const role = document.getElementById('edit_role').value;
                const kelasWrapper = document.getElementById('edit_kelas_wrapper');

                if (role === 'admin') {
                    kelasWrapper.classList.add('hidden');
                } else {
                    kelasWrapper.classList.remove('hidden');
                }
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
