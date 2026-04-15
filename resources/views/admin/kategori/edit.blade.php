<div id="modalEditKategori"
     class="fixed inset-0 z-50 hidden items-center justify-center bg-black/40 backdrop-blur-sm">

    <div id="modalEditKategoriBox"
         class="bg-white w-full max-w-md rounded-2xl shadow-2xl
                transform scale-95 opacity-0
                transition-all duration-300">

        <div class="flex items-center justify-between px-6 py-4
                    bg-gradient-to-r from-[#3b5bdb] to-[#4c6ef5]
                    rounded-t-2xl text-white">
            <h2 class="text-lg font-semibold">
                Edit Kategori
            </h2>
            <button onclick="closeEditKategoriModal()"
                class="text-white/80 hover:text-white text-xl leading-none">
                ✕
            </button>
        </div>

        <form id="formEditKategori" method="POST">
            @csrf
            @method('PUT')

            <div class="px-6 py-6">
                <label class="block text-sm font-medium text-gray-700 mb-2">
                    Nama Kategori
                </label>
                <input type="text"
                    name="nama_kategori"
                    id="edit_nama_kategori"
                    class="w-full rounded-xl border border-gray-300 px-4 py-2.5
                           focus:ring-2 focus:ring-[#4c6ef5]
                           outline-none transition"
                    required>
            </div>

            <div class="flex justify-end gap-3 px-6 py-4 bg-gray-50 rounded-b-2xl">
                <button type="button"
                    onclick="closeEditKategoriModal()"
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
