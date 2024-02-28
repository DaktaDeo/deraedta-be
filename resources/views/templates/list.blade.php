<x-master-layout :page-title="$content->title">
    <div class="relative px-4 sm:px-6 lg:px-8">
        <div class="text-lg max-w-prose mx-auto">
            <h1 class="pb-7">
            <span
                class=" block text-base text-center text-indigo-600 font-semibold tracking-wide uppercase dark:text-indigo-400">{{ $content->title }}</span>
                <span
                    class=" mt-2 block text-3xl text-center leading-8 font-extrabold tracking-tight sm:text-4xl ">{{ $content->subtitle }}</span>
            </h1>

            @if(!empty($messages))
                {!! $messages !!}
            @endif

            @if(!empty($intro))
                <div class="text-sm text-slate-500 my-7 py-0 px-3 dark:border-indigo-800 dark:text-slate-500 border-l-2 italic border-indigo-600">
                    {!! $content->content_html !!}
                </div>
            @endif



            <div class="mt-4">
                @foreach($items as $item)

                    <div class="mt-2 spaced-y-10 mb-10">
                        <div>
                            <div class="flex mt-1 text-gray-500 text-xs mb-2 gap-2">
                                <x-relative-time :date-time="$item->publish_date" prefix="Published →"/>

                                    <div>
                                        {{$item->reading_time}} min read
                                    </div>
                            </div>

                                <a href="/{{$item->slug}}"
                                   class=" text-gray-900 dark:text-gray-200 text-xl font-bold no-underline hover:underline hover:text-indigo-400 dark:hover:text-indigo-400 ">
                                    {{ $item->title }}
                                </a>
                        </div>

                            <div class="text-base leading-normal mt-1">
                                {!! $item->excerpt_html !!}
                            </div>

                            <div class="text-base leading-normal mt-2">
                                <a href="/{{$item->slug}}"
                                   class=" text-gray-900 dark:text-gray-200 hover:text-indigo-400 dark:hover:text-indigo-400 text-sm no-underline hover:underline "
                                   style="outline-width: 0px !important; user-select: auto !important;"
                                >
                                    Read this entry →
                                </a>
                            </div>
                    </div>


                @endforeach
            </div>
        </div>
    </div>
</x-master-layout>
