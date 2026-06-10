<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>{{ $title ?? config('app.name') }}</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    @livewireStyles
</head>

<body class="bg-gray-100">
    <div class="min-h-screen bg-gradient-to-br from-slate-100 to-slate-200 flex items-center justify-center px-4">
        <div class="w-full max-w-md">
            <div class="bg-white shadow-xl rounded-2xl overflow-hidden">
                <div class="bg-slate-900 px-8 py-8 text-center">
                    <h1 class="text-3xl font-bold text-white">
                        Admin Panel
                    </h1>

                    <p class="text-slate-300 mt-2">
                        Silakan masuk ke akun Anda
                    </p>
                </div>

                <div class="p-8">
                    <form method="POST" action="{{ route('login') }}" class="space-y-5">
                        @csrf

                        <div>
                            <label class="block text-sm font-medium text-slate-700 mb-2">
                                Email
                            </label>

                            <input
                                type="email"
                                name="email"
                                value="{{ old('email') }}"
                                required
                                autofocus
                                class="w-full rounded-xl border border-slate-300 px-4 py-3 focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500"
                                placeholder="nama@email.com">

                            @error('email')
                            <p class="text-red-500 text-sm mt-1">
                                {{ $message }}
                            </p>
                            @enderror
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-slate-700 mb-2">
                                Password
                            </label>

                            <input
                                type="password"
                                name="password"
                                required
                                class="w-full rounded-xl border border-slate-300 px-4 py-3 focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500"
                                placeholder="••••••••">

                            @error('password')
                            <p class="text-red-500 text-sm mt-1">
                                {{ $message }}
                            </p>
                            @enderror
                        </div>

                        <div class="flex items-center justify-between">
                            <label class="flex items-center gap-2 text-sm text-slate-600">
                                <input
                                    type="checkbox"
                                    name="remember"
                                    class="rounded border-slate-300">
                                <span>Remember me</span>
                            </label>
                        </div>

                        <button
                            type="submit"
                            class="w-full bg-indigo-600 hover:bg-indigo-700 text-white font-semibold py-3 rounded-xl transition">
                            Login
                        </button>
                    </form>
                    <div class="mt-6 text-center">
                    <p class="text-sm text-slate-600">
                        Belum punya akun?
                        <a
                            href="{{ route('register') }}"
                            class="text-indigo-600 hover:text-indigo-700 font-medium"
                        >
                            Register di sini
                        </a>
                    </p>
                </div>
                </div>
            </div>

            <p class="text-center text-sm text-slate-500 mt-6">
                © {{ date('Y') }} Admin Panel
            </p>
        </div>
    </div>
</body>
</html>