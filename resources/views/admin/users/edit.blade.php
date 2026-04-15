<div id="modalEditUser"
    class="fixed inset-0 z-50 hidden items-center justify-center bg-black/40 backdrop-blur-sm
            opacity-0 transition-opacity duration-300">

    <div id="modalEditUserBox"
        class="bg-white w-full max-w-lg rounded-2xl shadow-2xl
                transform scale-95 opacity-0
                transition-all duration-300">
        <div
            class="flex items-center justify-between px-6 py-4
                    bg-gradient-to-r from-[#3b5bdb] to-[#4c6ef5]
                    rounded-t-2xl text-white">
            <h2 class="text-lg font-semibold">
                Edit User
            </h2>
            <button onclick="closeEditUserModal()" class="text-white/80 hover:text-white text-xl leading-none">
                ✕
            </button>
        </div>

        <form id="formEditUser" method="POST">
            @csrf
            @method('PUT')

            <div class="px-6 py-6 space-y-4">
                <div>
                    <label class="block text-left text-sm font-medium text-gray-700 mb-2">
                        Nama Lengkap
                    </label>
                    <input type="text" name="nama" id="edit_nama"
                        class="w-full rounded-xl border border-gray-300 px-4 py-2.5
                               focus:ring-2 focus:ring-[#4c6ef5] outline-none transition"
                        required>
                </div>
                <div>
                    <label class="block text-left text-sm font-medium text-gray-700 mb-2">
                        NIP / NIS
                    </label>
                    <input type="text" name="nip_nis" id="edit_nip_nis" maxlength="18"
                        class="w-full rounded-xl border border-gray-300 px-4 py-2.5
                               focus:ring-2 focus:ring-[#4c6ef5] outline-none transition"
                        required>
                </div>

                <div>
                    <label class="block text-left text-sm font-medium text-gray-700 mb-2">
                        Role
                    </label>
                    <select name="role" id="edit_role" onchange="toggleKelasEdit()"
                        class="w-full rounded-xl border border-gray-300 px-4 py-2.5
                               focus:ring-2 focus:ring-[#4c6ef5] outline-none transition"
                        required>
                        <option value="admin">Admin</option>
                        <option value="siswa">Siswa</option>
                    </select>
                </div>

                <div id="edit_kelas_wrapper">
                    <label class="block text-left text-sm font-medium text-gray-700 mb-2">
                        Kelas
                    </label>
                    <input type="text" name="kelas" id="edit_kelas" maxlength="50"
                        class="w-full rounded-xl border border-gray-300 px-4 py-2.5
                               focus:ring-2 focus:ring-[#4c6ef5] outline-none transition"
                        required>
                </div>

                <div>
                    <label class="block text-left text-sm font-medium text-gray-700 mb-2">
                        Password (Kosongkan jika tidak diubah)
                    </label>
                    <input type="password" name="password"
                        class="w-full rounded-xl border border-gray-300 px-4 py-2.5
                               focus:ring-2 focus:ring-[#4c6ef5] outline-none transition">
                </div>

            </div>

            <div class="flex justify-end gap-3 px-6 py-4 bg-gray-50 rounded-b-2xl">
                <button type="button" onclick="closeEditUserModal()"
                    class="px-4 py-2 rounded-xl text-sm font-medium
                           bg-gray-200 hover:bg-gray-300 transition">
                    Batal
                </button>
                <button type="submit"
                    class="px-5 py-2 rounded-xl text-sm font-medium text-white
                           bg-gradient-to-r from-[#3b5bdb] to-[#4c6ef5]
                           hover:opacity-90 transition shadow-md">
                    Update
                </button>
            </div>

        </form>

    </div>
</div>
