<section class="block leading-7 text-left bg-silence-50/10 text-jeans-800 fade-up-animation pb-5">
    <a id="{{ $content->slug }}"></a>
    @if($hasFeaturedImage())
        <div class="mx-auto text-center flex justify-center"
             x-data="{ imgWidth: 1904 }"
            x-init="imgWidth = $refs.img.offsetWidth || 1904">

        <img x-ref="img"
             :sizes="imgWidth + 'px'"
             :srcset="'{{ $getOnlySrcset() }}'"
             src="{{ $getFallbackImageUrl() }}"
             alt="{{ $getDescriptiveAltText() }}"
             style="max-height:500px; width: auto; height: auto;">
        </div>
    @endif
    <div class="px-12 mx-auto w-full text-left py-2">
        <div class="flex flex-wrap -mx-4 text-jeans-800">
            <!-- a name with slug -->
            <a
                id="{{ $content->slug }}"
                class="relative flex-grow-0 flex-shrink-0 px-4 w-full max-w-full basis-full"
                style="min-height: 1px;"
            ></a>
            <div
                class="relative flex-grow-0 flex-shrink-0 order-3 px-4 mx-auto mt-8 w-full xl:mt-0 xl:flex-shrink-0 xl:flex-grow-0 xl:basis-1/4 md:order-2 md:flex-shrink-0 md:flex-grow-0"
                style="min-height: 1px; max-width: 91.6667%; flex-basis: 91.6667%;"
            >
                <!--Title-->
                @if(!$content->hide_titles)
                    <div class="flex flex-wrap -mx-4">
                        <div
                            class="relative flex-grow-0 flex-shrink-0 px-4 w-full max-w-full text-center basis-full"
                            style="min-height: 1px;"
                        >
                            <h1
                                class="mt-9 mb-2 font-sans text-4xl font-extrabold leading-normal text-silence-900"
                                style="transition: none 0s ease 0s;"
                            >
                                {{$content->title}}
                            </h1>
                            @if($content->subtitle)
                                <h2
                                    class="mt-0 mb-4 font-sans text-2xl font-medium leading-normal text-silence-700"
                                    style="transition: none 0s ease 0s;"
                                >
                                    {{$content->subtitle}}
                                </h2>
                            @endif
                        </div>
                    </div>
                @endif
                <!--/Title-->
                <!--Text-->
                <div class="flex flex-wrap -mx-4 mt-4">
                    <div class="relative flex-grow-0 flex-shrink-0 px-4 w-full max-w-full basis-full" style="min-height: 1px;">
                        <div class="prose prose-lg prose-jeans mx-auto">
                            {!! $content->getContent() !!}
                        </div>
                    </div>
                </div>
                <!--/Text-->
            </div>
        </div>
    </div>
</section>
