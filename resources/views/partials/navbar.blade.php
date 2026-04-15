<header
    class="fixed top-0 left-0 w-full h-[60px] bg-[#5177ff] text-white flex items-center justify-between px-8 shadow-md z-50">

    <img src="{{ asset('images/SIKUSA.png') }}"
         alt="SIKUSA Logo"
         class="h-30 object-contain">

    <form action="{{ route('logout') }}" method="POST">
        @csrf
        <button type="submit"
            class="bg-white text-[#5177ff] px-5 py-1.5 rounded-full text-sm font-semibold hover:bg-gray-100 transition duration-200">
            Logout
        </button>
    </form>
</header>
