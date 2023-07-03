<html lang="{{ str_replace('_', '-', app()->getLocale()) }}"
      x-cloak
      x-data="{darkMode: localStorage.getItem('dark') === 'true'}"
      x-init="$watch('darkMode', val => localStorage.setItem('dark', val))"
      x-bind:class="{'dark': darkMode}"
>
<head>
    @include('layouts.partials.html-head')

    <!-- Scripts -->
    <script src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    @vite(['resources/css/app.scss', 'resources/js/app.js'])

    <title>Gompje.be - {{$pageTitle}}</title>
    @stack('endHead')
    @livewireStyles
</head>
<body class="font-sans text-gray-600 antialiased bg-gray-100 dark:bg-gray-800 dark:text-gray-300">
<script>/**/</script><!-- Empty script to prevent FOUC in Firefox -->
<div class="min-h-screen font-sans text-gray-600 antialiased bg-gray-100 dark:bg-slate-900 dark:text-gray-300">
    <header class="relative">
        <x-nav-bar/>
    </header>

    <main class="relative py-8">
        {{ $slot }}
    </main>
    <footer class="md:mt-2 prose prose-indigo prose-lg mx-auto dark:prose-light">
        <div class="flex flex-col text-gray-400 text-sm md:mt-4 dark:text-gray-600">
            <x-social-links/>
            <x-copyright-text/>
        </div>
    </footer>
</div>

@stack('modals')

@livewireScripts
</body>
</html>
