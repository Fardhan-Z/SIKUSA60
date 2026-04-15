<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard - SIKUSA</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    @vite('resources/css/app.css')
</head>
<body class="bg-[#f0f4ff] font-sans">

    <header class="fixed top-0 left-0 right-0 h-[60px] bg-[#5177ff] text-white flex items-center justify-between px-6 shadow-md z-50">
        @include('partials.navbar')
    </header>

    <aside class="fixed top-[60px] left-0 w-[220px] h-[calc(100vh-60px)] bg-blue-50 shadow-md">
        @include('partials.sidebar')
    </aside>

    <main class="pt-[80px] ml-[220px] px-6 pb-10 min-h-screen">
        @yield('content')
    </main>

    @stack('scripts')
</body>
</html>
