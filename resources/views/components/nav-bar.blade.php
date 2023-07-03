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


<nav class="border-b mb-12 md:border-0 dark:border-gray-700">
    <div class="flex container max-w-screen-lg mx-auto justify-between h-14">
        <div  class="container flex justify-between h-14 flex-grow md:flex-shrink">
            <!-- Nav Links-->
            <div class="flex flex-grow" x-data="{showMenu : false}">
                <!-- Brand-->
                <x-site-logo/>
                <!-- Navbar Toggle Button -->
                <button @click="showMenu = !showMenu"
                        class="block md:hidden text-gray-700 rounded w-10/12 dark:text-gray-200"
                        type="button"
                        aria-controls="navbar-main"
                        aria-expanded="false"
                        aria-label="Toggle navigation">
                    <div class="flex justify-end text-right p-2  py-2 pr-5">
                        <svg class="w-5 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                             xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M4 6h16M4 12h16M4 18h16"></path>
                        </svg>
                    </div>
                </button>

                <ul class="md:flex text-gray-700 dark:text-gray-200 text-base mr-3 md:mx-auto"
                    :class="showMenu ? 'drop-shadow-xl block absolute top-14 z-50 border-b dark:border-gray-700 md:border-0 bg-gray-100 dark:bg-gray-800 w-full p-2 pl-4' : 'hidden'"
                    id="navbar-main" x-cloak>
                    @foreach($menuItems as $item)
                        <li class="p-0 m-0">
                            <a href="{{$item['url']}}"
                               class="dark:border-neutral-300 border-neutral-300 pl-0 md:px-4 dark:border-gray-700 md:pt-12 border-t md:border-0 inline-block w-full py-2  hover:text-gray-900 dark:text-gray-400 dark:hover:text-gray-100 focus:outline-none focus:text-gray-900 dark:focus:text-gray-100 transition ease-in-out duration-150">
                                {{$item['title']}}
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
        <div class="md:flex md:items-center hidden md:block md:pt-10 w-0">
            <livewire:change-theme/>
        </div>
    </div>
</nav>
