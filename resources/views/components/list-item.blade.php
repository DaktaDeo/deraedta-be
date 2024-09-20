<article class="flex flex-col items-start justify-between">
    <div class="relative w-full">
        @if($hasFeaturedImage())
            <div class="aspect-[16/9] w-full rounded-2xl bg-gray-100 object-cover sm:aspect-[2/1] lg:aspect-[3/2]">
                 x-data="{ imgWidth: 1904 }"
                 x-init="imgWidth = $refs.img.offsetWidth || 1904">

                <img x-ref="img"
                     :sizes="imgWidth + 'px'"
                     :srcset="'{{ $getOnlySrcset() }}'"
                     src="{{ $getFallbackImageUrl() }}"
                     alt="{{ $getDescriptiveAltText() }}"
                     style="width: 100%; height: auto;">
            </div>
        @endif
        <div class="absolute inset-0 rounded-2xl ring-1 ring-inset ring-gray-900/10"></div>
    </div>
    <div class="max-w-xl">
{{--        <div class="mt-8 flex items-center gap-x-4 text-xs">--}}
{{--            <time datetime="2020-03-16" class="text-gray-500">Mar 16, 2020</time>--}}
{{--            <a href="#" class="relative z-10 rounded-full bg-gray-50 px-3 py-1.5 font-medium text-gray-600 hover:bg-gray-100">Marketing</a>--}}
{{--        </div>--}}
        <div class="group relative">
            <h3 class="mt-3 text-lg font-semibold leading-6 text-gray-900 group-hover:text-gray-600">
                <a href="/{{$getSlug}}">
                    <span class="absolute inset-0"></span>
                    {{$content->title}}
                </a>
            </h3>
            <p class="mt-5 line-clamp-3 text-sm leading-6 text-gray-600">
                {!! $content->excerpt_html !!}
            </p>
        </div>
    </div>
</article>
