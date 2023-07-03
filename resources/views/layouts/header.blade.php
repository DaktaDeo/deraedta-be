<?php
$menuItems = [
    [
        'title' => 'Articles',
        'url' => '/articles',
    ],
    [
        'title' => 'Reviews',
        'url' => '/reviews',
    ],
    [
        'title' => 'Projects',
        'url' => '/projects',
    ],
    [
        'title' => 'Nantucket',
        'url' => '/nantucket',
    ],
    [
        'title' => 'Journal',
        'url' => '/journal',
    ],
];
?>

<header class="relative">
    <div class=" flex justify-between items-center px-4 py-6 sm:px-6 md:justify-start md:space-x-10 max-w-screen-xl mx-auto">
        <div class="lg:w-0 lg:flex-1">
           <x-site-logo />
        </div>
        <div class="-mr-2 -my-2 md:hidden">
            <button
                type="button"
                class=" inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out "
                @click.prevent="isMobile = true"
            >
                <!-- Heroicon name: menu -->
                <svg
                    class="h-6 w-6"
                    xmlns="http://www.w3.org/2000/svg"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke="currentColor"
                >
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M4 6h16M4 12h16M4 18h16"
                    />
                </svg>
            </button>
        </div>
        <nav class="md:flex space-x-10">
            @foreach($menuItems as $item)
                <a href="{{$item['url']}}"
                   class="text-base leading-6 font-medium text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-gray-100 focus:outline-none focus:text-gray-900 dark:focus:text-gray-100 transition ease-in-out duration-150">
                    {{$item['title']}}
                </a>
            @endforeach
        </nav>
        <div class=" hidden md:flex items-center justify-end space-x-8 md:flex-1 lg:w-0 ">

        </div>
        <livewire:change-theme />
    </div>

    <!-- mobile menu -->
    <div
        x-data="{ isMobile: false }"
        x-show="isMobile"
        x-transition:enter="transition ease-out duration-200"
        class="hidden absolute top-0 inset-x-0 p-2 transition transform origin-top-right md:hidden z-50 bg-gray-100"
    >
        <div class="rounded-lg shadow-lg">
            <div class=" rounded-lg shadow-xs bg-primary-color-dark divide-y-2 divide-gray-50">
                <div class="pt-5 pb-6 px-5 space-y-6">
                    <div class="flex items-center justify-between">
                        <img
                            class="h-10 w-10 md:h-12 md:w-12 lg:h-20 lg:w-20 rounded-full"
                            src="https://secure.gravatar.com/avatar/09251c08e3db9c6698f9fe621d4c1d6e?s=80&d=identicon"
                            alt=""
                        />

                        <div class="-mr-2">
                            <button
                                type="button"
                                class=" inline-flex items-center justify-center p-2 rounded-md text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 hover:bg-gray-100 dark:hover:bg-gray-900 focus:outline-none focus:bg-gray-100 dark:focus-gray-900 focus:text-gray-500 dark:focus:text-gray-500 transition duration-150 ease-in-out "
                            >
                                <!-- Heroicon name: x -->
                                <svg
                                    class="h-6 w-6"
                                    xmlns="http://www.w3.org/2000/svg"
                                    fill="none"
                                    viewBox="0 0 24 24"
                                    stroke="currentColor"
                                >
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M6 18L18 6M6 6l12 12"
                                    />
                                </svg>
                            </button>
                        </div>
                    </div>
                    <div>
                        <nav class="grid grid-cols-1 gap-7">
                            @foreach($menuItems as $item)
                                <a href="{{$item['url']}}"
                                    class="text-base leading-6 font-medium text-gray-600"
                                >
                                    {{ $item['title'] }}
                                </a>
                            @endforeach
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
