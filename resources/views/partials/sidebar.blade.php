<aside class="w-64 min-h-screen bg-white shadow-2xl p-6 flex flex-col">

    <div class="flex items-center gap-3 mb-8">
        <div class="w-12 h-12 rounded-full bg-gradient-to-br from-blue-500 to-indigo-600
                    flex items-center justify-center text-white font-semibold text-lg">
            {{ strtoupper(substr(auth()->user()->nama,0,1)) }}
        </div>
        <div>
            <p class="font-semibold text-gray-800 text-sm">
                {{ auth()->user()->nama }}
            </p>
            <p class="text-xs text-gray-400 capitalize">
                {{ auth()->user()->role }}
            </p>
        </div>
    </div>

    <ul class="space-y-2 flex-1">

        @if (auth()->user()->role === 'admin')

        <li>
            <a href="/admin/dashboard"
                class="flex items-center gap-3 px-4 py-2.5 rounded-xl text-sm font-medium transition-all duration-200
                {{ request()->is('admin/dashboard')
                    ? 'bg-gradient-to-r from-[#3b5bdb] to-[#4c6ef5] text-white shadow-md'
                    : 'text-gray-600 hover:bg-gray-100 hover:text-gray-900' }}">
                Dashboard
            </a>
        </li>

        <li>
            <a href="/admin/aspirasi"
                class="flex items-center gap-3 px-4 py-2.5 rounded-xl text-sm font-medium transition-all duration-200
                {{ request()->is('admin/aspirasi*')
                    ? 'bg-gradient-to-r from-[#3b5bdb] to-[#4c6ef5] text-white shadow-md'
                    : 'text-gray-600 hover:bg-gray-100 hover:text-gray-900' }}">
                Manajemen Aspirasi
            </a>
        </li>

        <li>
            <a href="/admin/users"
                class="flex items-center gap-3 px-4 py-2.5 rounded-xl text-sm font-medium transition-all duration-200
                {{ request()->is('admin/users*')
                    ? 'bg-gradient-to-r from-[#3b5bdb] to-[#4c6ef5] text-white shadow-md'
                    : 'text-gray-600 hover:bg-gray-100 hover:text-gray-900' }}">
                Manajemen User
            </a>
        </li>

        <li>
            <a href="/admin/kategori"
                class="flex items-center gap-3 px-4 py-2.5 rounded-xl text-sm font-medium transition-all duration-200
                {{ request()->is('admin/kategori*')
                    ? 'bg-gradient-to-r from-[#3b5bdb] to-[#4c6ef5] text-white shadow-md'
                    : 'text-gray-600 hover:bg-gray-100 hover:text-gray-900' }}">
                Manajemen Kategori
            </a>
        </li>
        @else
        <li>
            <a href="/siswa/dashboard"
                class="flex items-center gap-3 px-4 py-2.5 rounded-xl text-sm font-medium transition-all duration-200
                {{ request()->is('siswa/dashboard*')
                    ? 'bg-gradient-to-r from-[#3b5bdb] to-[#4c6ef5] text-white shadow-md'
                    : 'text-gray-600 hover:bg-gray-100 hover:text-gray-900' }}">
                Dashboard
            </a>
        </li>

        <li>
            <a href="/siswa/aspirasi"
                class="flex items-center gap-3 px-4 py-2.5 rounded-xl text-sm font-medium transition-all duration-200
                {{ request()->is('siswa/aspirasi*')
                    ? 'bg-gradient-to-r from-[#3b5bdb] to-[#4c6ef5] text-white shadow-md'
                    : 'text-gray-600 hover:bg-gray-100 hover:text-gray-900' }}">
                Aspirasi
            </a>
        </li>

        <li>
            <a href="/siswa/histori-aspirasi"
                class="flex items-center gap-3 px-4 py-2.5 rounded-xl text-sm font-medium transition-all duration-200
                {{ request()->is('siswa/histori-aspirasi*')
                    ? 'bg-gradient-to-r from-[#3b5bdb] to-[#4c6ef5] text-white shadow-md'
                    : 'text-gray-600 hover:bg-gray-100 hover:text-gray-900' }}">
                History Aspirasi
            </a>
        </li>
        @endif

    </ul>

</aside>
