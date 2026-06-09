<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Admin Login</title>

    <script src="https://cdn.tailwindcss.com"></script>

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Inter', sans-serif;
        }
    </style>
</head>

<body class="bg-gray-50">

<div class="min-h-screen flex">

    <!-- LEFT SIDE (visual) -->
    <div class="hidden lg:flex w-1/2 bg-gradient-to-br from-indigo-600 to-indigo-900 relative overflow-hidden">

        <div class="absolute inset-0 opacity-20">
            <div class="w-full h-full"
                 style="background-image: radial-gradient(circle at 1px 1px, white 1px, transparent 0);
                        background-size: 40px 40px;"></div>
        </div>

        <div class="m-auto text-center px-12">
            <h1 class="text-white text-4xl font-bold mb-4">Admin Panel</h1>
            <p class="text-indigo-100 text-sm leading-relaxed">
                Secure access to your dashboard, manage projects, courses, and system data efficiently.
            </p>
        </div>

    </div>

    <!-- RIGHT SIDE (form) -->
    <div class="w-full lg:w-1/2 flex items-center justify-center px-6">

        <div class="w-full max-w-md">

            <div class="mb-8">
                <h2 class="text-2xl font-bold text-gray-900">Welcome back</h2>
                <p class="text-sm text-gray-500 mt-1">Please sign in to continue</p>
            </div>

            @if(session('error'))
                <div class="mb-4 p-3 text-sm text-red-600 bg-red-50 border border-red-200 rounded-lg">
                    {{ session('error') }}
                </div>
            @endif

            <form action="{{ route('admin.auth.login.submit') }}" method="POST" class="space-y-5">
                @csrf

                <!-- Email -->
                <div>
                    <label class="text-sm font-medium text-gray-700">Email</label>
                    <input
                        type="email"
                        name="email"
                        value="{{ old('email') }}"
                        required
                        class="mt-1 w-full px-4 py-3 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-indigo-500 bg-white"
                        placeholder="admin@email.com"
                    />
                    @error('email')
                        <p class="text-xs text-red-500 mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Password -->
                <div>
                    <label class="text-sm font-medium text-gray-700">Password</label>
                    <input
                        type="password"
                        name="password"
                        required
                        class="mt-1 w-full px-4 py-3 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-indigo-500 bg-white"
                        placeholder="••••••••"
                    />
                    @error('password')
                        <p class="text-xs text-red-500 mt-1">{{ $message }}</p>
                    @enderror
                </div>

              

                <!-- Button -->
                <button
                    type="submit"
                    class="w-full bg-indigo-600 hover:bg-indigo-700 text-white font-medium py-3 rounded-xl transition"
                >
                    Sign in
                </button>
            </form>

            <p class="text-center text-xs text-gray-400 mt-6">
                © {{ date('Y') }} Admin Panel
            </p>

        </div>

    </div>

</div>

</body>
</html>