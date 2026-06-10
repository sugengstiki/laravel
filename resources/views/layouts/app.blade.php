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
    <div class="flex min-h-screen">
        <!-- Sidebar -->
        <aside class="w-64 bg-slate-900 text-white">
            <div class="px-6 py-5 border-b border-slate-800">
                <h1 class="text-xl font-bold">
                    Admin Panel
                </h1>
            </div>

            <nav class="p-4 space-y-2">
                <!-- Dashboard -->
                <a wire:navigate
                    wire:current.exact="bg-blue-600 text-white"
                    href="{{ route('dashboard') }}"
                    class="flex items-center gap-3 px-4 py-3 rounded-lg transition text-slate-300 hover:bg-slate-800 hover:text-white">
                    <!-- Heroicon Home -->
                    <svg xmlns="http://www.w3.org/2000/svg"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke-width="1.5"
                        stroke="currentColor"
                        class="w-5 h-5">
                        <path stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M2.25 12 11.204 3.046a1.125 1.125 0 0 1 1.592 0L21.75 12M4.5 9.75V19.5A1.5 1.5 0 0 0 6 21h3.75v-5.25A1.5 1.5 0 0 1 11.25 14.25h1.5a1.5 1.5 0 0 1 1.5 1.5V21H18a1.5 1.5 0 0 0 1.5-1.5V9.75" />
                    </svg>

                    <span>Dashboard</span>
                </a>

                <!-- Feedback -->
                <a wire:navigate
                    wire:current.exact="bg-blue-600 text-white"
                    href="{{ route('feedback') }}"
                    class="flex items-center gap-3 px-4 py-3 rounded-lg transition
                    text-slate-300 hover:bg-slate-800 hover:text-white">
                    <!-- Heroicon Chat Bubble -->
                    <svg xmlns="http://www.w3.org/2000/svg"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke-width="1.5"
                        stroke="currentColor"
                        class="w-5 h-5">
                        <path stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M8.625 9.75a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm0 0h.008v.008h-.008V9.75Zm3.75 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm0 0h.008v.008h-.008V9.75Zm3.75 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm0 0h.008v.008h-.008V9.75ZM21 12c0 4.97-4.03 9-9 9a9.97 9.97 0 0 1-4.255-.949L3 21l.949-4.745A9.97 9.97 0 0 1 3 12c0-4.97 4.03-9 9-9s9 4.03 9 9Z" />
                    </svg>

                    <span>Feedback</span>
                </a>

                <!-- Contact -->
                <a
                    wire:navigate
                    wire:current.exact="bg-blue-600 text-white"
                    href="/contact"
                    class="flex items-center gap-3 px-4 py-3 rounded-lg text-slate-300 hover:bg-slate-800 hover:text-white transition">
                    <!-- Heroicon Envelope -->
                    <svg xmlns="http://www.w3.org/2000/svg"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke-width="1.5"
                        stroke="currentColor"
                        class="w-5 h-5">
                        <path stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M21.75 6.75v10.5A2.25 2.25 0 0 1 19.5 19.5h-15a2.25 2.25 0 0 1-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0 0 19.5 4.5h-15A2.25 2.25 0 0 0 2.25 6.75m19.5 0v.243a2.25 2.25 0 0 1-1.07 1.916l-7.5 4.615a2.25 2.25 0 0 1-2.36 0l-7.5-4.615A2.25 2.25 0 0 1 2.25 6.993V6.75" />
                    </svg>

                    <span>Contact</span>
                </a>
            </nav>
        </aside>

        <!-- Content -->
        <main class="flex-1">
            <header class="bg-white border-b px-6 py-4">
                <h2 class="text-xl font-semibold">
                    {{ $title ?? 'Dashboard' }}
                </h2>
            </header>

            <div class="p-6">
                {{ $slot }}
            </div>
        </main>
    </div>

    @livewireScripts
</body>

</html>