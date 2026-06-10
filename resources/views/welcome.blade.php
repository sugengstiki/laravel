```blade
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name') }}</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-white">

    <!-- Navbar -->
    <nav class="fixed top-0 w-full bg-white/80 backdrop-blur border-b z-50">
        <div class="max-w-7xl mx-auto px-6 h-16 flex items-center justify-between">
            <div class="font-bold text-xl text-slate-900">
                {{ config('app.name') }}
            </div>

            <div class="flex items-center gap-3">
                @auth
                    <a href="{{ route('dashboard') }}"
                       class="px-4 py-2 rounded-lg bg-indigo-600 text-white hover:bg-indigo-700">
                        Dashboard
                    </a>
                @else
                    <a href="{{ route('login') }}"
                       class="px-4 py-2 rounded-lg text-slate-700 hover:bg-slate-100">
                        Login
                    </a>

                    <a href="{{ route('register') }}"
                       class="px-4 py-2 rounded-lg bg-indigo-600 text-white hover:bg-indigo-700">
                        Register
                    </a>
                @endauth
            </div>
        </div>
    </nav>

    <!-- Hero -->
    <section class="pt-32 pb-24">
        <div class="max-w-7xl mx-auto px-6">
            <div class="grid lg:grid-cols-2 gap-12 items-center">

                <div>
                    <span class="inline-flex px-3 py-1 rounded-full bg-indigo-100 text-indigo-700 text-sm font-medium">
                        Modern Admin Platform
                    </span>

                    <h1 class="mt-6 text-5xl lg:text-6xl font-bold text-slate-900 leading-tight">
                        Kelola Data dan Feedback
                        dengan Lebih Mudah
                    </h1>

                    <p class="mt-6 text-lg text-slate-600">
                        Platform modern untuk mengelola feedback,
                        kontak pengguna, dan aktivitas sistem dalam
                        satu dashboard yang sederhana dan cepat.
                    </p>

                    <div class="mt-8 flex flex-wrap gap-4">
                        <a href="{{ route('login') }}"
                           class="px-6 py-3 bg-indigo-600 text-white rounded-xl hover:bg-indigo-700 transition">
                            Mulai Sekarang
                        </a>

                        <a href="#features"
                           class="px-6 py-3 border rounded-xl hover:bg-slate-50 transition">
                            Pelajari Lebih Lanjut
                        </a>
                    </div>
                </div>

                <div>
                    <div class="bg-slate-900 rounded-3xl p-8 shadow-2xl">
                        <div class="grid grid-cols-2 gap-4">

                            <div class="bg-slate-800 rounded-2xl p-5">
                                <p class="text-slate-400 text-sm">Feedback</p>
                                <h3 class="text-3xl font-bold text-white mt-2">
                                    1.250+
                                </h3>
                            </div>

                            <div class="bg-slate-800 rounded-2xl p-5">
                                <p class="text-slate-400 text-sm">Pengguna</p>
                                <h3 class="text-3xl font-bold text-white mt-2">
                                    500+
                                </h3>
                            </div>

                            <div class="bg-slate-800 rounded-2xl p-5">
                                <p class="text-slate-400 text-sm">Respon</p>
                                <h3 class="text-3xl font-bold text-white mt-2">
                                    95%
                                </h3>
                            </div>

                            <div class="bg-slate-800 rounded-2xl p-5">
                                <p class="text-slate-400 text-sm">Aktif</p>
                                <h3 class="text-3xl font-bold text-white mt-2">
                                    24/7
                                </h3>
                            </div>

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- Features -->
    <section id="features" class="py-24 bg-slate-50">
        <div class="max-w-7xl mx-auto px-6">

            <div class="text-center mb-16">
                <h2 class="text-4xl font-bold text-slate-900">
                    Fitur Utama
                </h2>

                <p class="mt-4 text-slate-600">
                    Semua yang dibutuhkan untuk mengelola sistem Anda.
                </p>
            </div>

            <div class="grid md:grid-cols-3 gap-8">

                <div class="bg-white rounded-2xl p-8 shadow-sm">
                    <h3 class="text-xl font-semibold">
                        Dashboard
                    </h3>

                    <p class="mt-3 text-slate-600">
                        Ringkasan data dan statistik secara real-time.
                    </p>
                </div>

                <div class="bg-white rounded-2xl p-8 shadow-sm">
                    <h3 class="text-xl font-semibold">
                        Feedback Management
                    </h3>

                    <p class="mt-3 text-slate-600">
                        Kelola seluruh feedback pengguna dengan mudah.
                    </p>
                </div>

                <div class="bg-white rounded-2xl p-8 shadow-sm">
                    <h3 class="text-xl font-semibold">
                        Contact Center
                    </h3>

                    <p class="mt-3 text-slate-600">
                        Kelola komunikasi dengan pengguna secara terpusat.
                    </p>
                </div>

            </div>

        </div>
    </section>

    <!-- CTA -->
    <section class="py-24">
        <div class="max-w-4xl mx-auto px-6">
            <div class="bg-slate-900 rounded-3xl p-12 text-center">

                <h2 class="text-4xl font-bold text-white">
                    Siap Memulai?
                </h2>

                <p class="text-slate-300 mt-4">
                    Masuk ke dashboard dan mulai mengelola sistem Anda.
                </p>

                <div class="mt-8">
                    <a href="{{ route('login') }}"
                       class="inline-flex px-8 py-3 bg-indigo-600 text-white rounded-xl hover:bg-indigo-700">
                        Login Sekarang
                    </a>
                </div>

            </div>
        </div>
    </section>

    <footer class="border-t py-8">
        <div class="max-w-7xl mx-auto px-6 text-center text-slate-500">
            © {{ date('Y') }} {{ config('app.name') }}. All rights reserved.
        </div>
    </footer>

</body>
</html>
```
