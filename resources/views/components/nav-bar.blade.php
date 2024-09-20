@if($menu)
    <nav class="relative"
         x-data="{ open: null, mobileOpen: false, isTouch: 'ontouchstart' in window || navigator.maxTouchPoints > 0 || navigator.msMaxTouchPoints > 0 }">
        <!-- Mobile Toggle Button -->
        <div class="lg:hidden flex flex-grow justify-end items-center w-full" @click="mobileOpen = !mobileOpen">
            <div class="text-lg font-semibold pr-2">Menu</div>
            <button  class="focus:outline-none">
                <svg class="w-6 h-6"
                     fill="none"
                     stroke="currentColor"
                     viewBox="0 0 24 24"
                     xmlns="http://www.w3.org/2000/svg">
                    <path x-show="!mobileOpen"
                          stroke-linecap="round"
                          stroke-linejoin="round"
                          stroke-width="2"
                          d="M4 6h16M4 12h16M4 18h16"></path>
                    <path x-show="mobileOpen"
                          stroke-linecap="round"
                          stroke-linejoin="round"
                          stroke-width="2"
                          d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </button>
        </div>
        <!-- Desktop Menu -->
        <ul class="hidden lg:flex flex-col lg:flex-row justify-center lg:justify-center pl-0 my-0 w-full text-gray-800 leading-7 text-left space-x-2">
            @foreach ($sortedItems as $key => $item)
                <li class="group">
                    <a @mouseenter="!isTouch && (open = {{ $key }})"
                       @mouseleave="!isTouch && (open = null)"
                       @click="if (isTouch && {{ count($item->children) }} > 0) { open = open === {{ $key }} ? null : {{ $key }}; event.preventDefault(); }"
                       :class="{'border-b-3 border-silence-600': open === {{ $key }}}"
                       class="inline-block py-6 px-4 lg:px-2 cursor-pointer transition-all duration-200 tracking-wide text-lg font-medium"
                       href="{{ $item->url ?? "/".$item->slug }}">
                        {{ $item->publicname }}
                        <span class="block h-1 bg-silence-600 scale-x-0 group-hover:scale-x-100 transition-transform origin-left duration-200"></span>
                    </a>
                    @if (count($item->children) > 0)
                        <div x-show="open === {{ $key }}"
                             @mouseenter="!isTouch && (open = {{ $key }})"
                             @mouseleave="!isTouch && (open = null)"
                             class="lg:absolute left-0 lg:left-0 lg:right-0 top-full bg-silence-10 shadow-md hidden lg:block w-full max-w-5xl"
                             x-transition:enter="transition ease-out duration-200"
                             x-transition:enter-start="opacity-0 transform scale-95"
                             x-transition:enter-end="opacity-100 transform scale-100"
                             x-transition:leave="transition ease-in duration-150"
                             x-transition:leave-start="opacity-100 transform scale-100"
                             x-transition:leave-end="opacity-0 transform scale-95">
                            <div class="p-4 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
                                @foreach ($item->children as $child)
                                    <a href="{{ $item->url ?? "/".$item->slug }}">
                                       class="block p-4 hover:bg-silence-200/20 hover:text-silence-900 transition-colors duration-200">
                                        <div class="uppercase tracking-wide text-lg font-medium">{{ $child->publicname }}</div>
                                        <p class="text-md text-gray-500">{{ $child->description ?? '' }}</p>
                                    </a>
                                @endforeach
                            </div>
                        </div>
                    @endif
                </li>
            @endforeach
        </ul>
        <!-- Mobile Menu Overlay -->
        <div x-show="mobileOpen"
             class="fixed inset-0 bg-silence-10 flex flex-col justify-center items-center lg:hidden z-50 bg-white">
            <button @click="mobileOpen = false" class="absolute top-4 right-4 text-silence-900">
                <svg class="w-8 h-8"
                     fill="none"
                     stroke="currentColor"
                     viewBox="0 0 24 24"
                     xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round"
                          stroke-linejoin="round"
                          stroke-width="2"
                          d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </button>
            <div class="pb-16">
                <x-site-logo/>
            </div>
            <ul class="space-y-4 text-silence-900 mx-auto">
                @foreach ($sortedItems as $key => $item)
                    <li>
                        <a href="{{ $item->url ?? "/".$item->slug }}"
                           class="block cursor-pointer text-2xl font-semibold">
                            {{ $item->publicname }}
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>
    </nav>
@endif
