<?php
// find the first webmenu in the $websiteModel with as system_menu_type = 'top_menu'
$topMenu = $websiteModel->getTopMenu();
?>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}"
      class="h-full"
      x-cloak
      x-data="{darkMode: localStorage.getItem('dark') === 'true'}"
      x-init="$watch('darkMode', val => localStorage.setItem('dark', val))"
      x-bind:class="{'dark': darkMode}"
>
<head>
    @include('layouts.partials.html-head')

    <!-- Scripts -->
    <script src="https://kit.fontawesome.com/02cb5b511b.js" crossorigin="anonymous"></script>
    @vite(['resources/js/app.js'])

    <title>{{ $title }}</title>
    @stack('endHead')
    @livewireStyles
</head>
<body class="font-sans text-gray-600 antialiased bg-gray-100 dark:bg-gray-800 dark:text-gray-300">
<script>/**/</script><!-- Empty script to prevent FOUC in Firefox -->
<div class="flex flex-col h-full min-h-screen font-sans  antialiased">
    <header class="block relative inset-x-0 top-0 leading-7 text-neutral-800 md:pt-8" style="transition: none 0s ease 0s; z-index: 1030;">
        <div class="mx-auto w-full max-w-7xl px-4" style="min-height: 1px;">
            <div class="flex items-center justify-between w-full">
                <!-- Left (Logo) -->
                <div class="flex-none text-left">
                    <x-site-logo />
                </div>
                <!-- /Left -->

                <!-- Center (Nav menu) -->
                <div class="flex-grow text-center">
                    <x-nav-bar :menu="$topMenu" />
                </div>
                <!-- /Center -->

                <!-- Right (Optional Socials/Other) -->
                <div class="flex-none text-right hidden md:block">
                    <ul class="flex flex-wrap justify-end max-h-16 text-sm leading-5">
                        <x-socials />
                    </ul>
                </div>
                <!-- /Right -->
            </div>
        </div>
    </header>

    <main class="relative md:py-8 flex-grow">
        {{ $slot }}
    </main>
    <footer class="prose prose-indigo prose-lg mx-auto dark:prose-light">
        <div class="flex flex-col text-gray-400 text-sm dark:text-gray-600">
            <x-social-links/>
            <x-copyright-text/>
        </div>
    </footer>
</div>

@stack('modals')

@livewireScripts
</body>
</html>
