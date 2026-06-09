<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Dashboard')</title>

    <script src="https://cdn.tailwindcss.com"></script>

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <style>
        body { font-family: 'Inter', sans-serif; }
    </style>
</head>

<body class="bg-gray-50 text-gray-900">

<!-- NAVBAR -->
<header class="bg-white border-b border-gray-200 sticky top-0 z-50">

    <div class="max-w-7xl mx-auto px-4">

        <div class="flex items-center justify-between h-16">

            <!-- LEFT -->
            <div class="flex items-center gap-3">

                <div class="w-8 h-8 bg-indigo-600 rounded-lg"></div>

                <span class="font-semibold text-lg">Admin</span>

            </div>

            <!-- DESKTOP MENU -->
            <nav class="hidden md:flex items-center gap-2">

                <a href="{{ route('admin.index') }}"
                   class="px-4 py-2 rounded-lg hover:bg-indigo-50 hover:text-indigo-600">
                    Dashboard
                </a>

                <a href="{{ route('admin.projects.index') }}"
                   class="px-4 py-2 rounded-lg hover:bg-indigo-50 hover:text-indigo-600">
                    Projects
                </a>

                <a href="{{ route('admin.courses.index') }}"
                   class="px-4 py-2 rounded-lg hover:bg-indigo-50 hover:text-indigo-600">
                    Courses
                </a>

                <a href="{{ route('admin.contacts.index') }}"
                   class="px-4 py-2 rounded-lg hover:bg-indigo-50 hover:text-indigo-600">
                    Contacts
                </a>

                <form action="{{ route('admin.auth.logout') }}" method="POST">
                    @csrf
                    <button class="px-4 py-2 text-red-600 hover:bg-red-50 rounded-lg">
                        Logout
                    </button>
                </form>

            </nav>

            <!-- MOBILE BUTTON -->
            <button onclick="toggleMenu()" class="md:hidden text-2xl">
                ☰
            </button>

        </div>
    </div>

    <!-- MOBILE MENU -->
    <div id="mobileMenu" class="hidden md:hidden border-t border-gray-100 bg-white">

        <div class="px-4 py-3 space-y-2">

            <a href="{{ route('admin.index') }}" class="block px-3 py-2 rounded-lg hover:bg-gray-100">Dashboard</a>

            <a href="{{ route('admin.projects.index') }}" class="block px-3 py-2 rounded-lg hover:bg-gray-100">Projects</a>

            <a href="{{ route('admin.courses.index') }}" class="block px-3 py-2 rounded-lg hover:bg-gray-100">Courses</a>

            <a href="{{ route('admin.contacts.index') }}" class="block px-3 py-2 rounded-lg hover:bg-gray-100">Contacts</a>

            <form action="{{ route('admin.auth.logout') }}" method="POST">
                @csrf
                <button class="w-full text-left px-3 py-2 text-red-600 hover:bg-red-50 rounded-lg">
                    Logout
                </button>
            </form>

        </div>

    </div>

</header>

<!-- MAIN CONTENT -->
<main class="max-w-7xl mx-auto p-6">

    <div class="flex items-center justify-between mb-6">
        <h1 class="text-xl font-semibold">@yield('title')</h1>
        <span class="text-sm text-gray-500">Admin Panel</span>
    </div>

    @yield('content')

</main>

<script>
    function toggleMenu() {
        const menu = document.getElementById('mobileMenu');
        menu.classList.toggle('hidden');
    }
</script>

</body>
</html>