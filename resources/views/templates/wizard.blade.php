<x-master-layout :page-title="$content->title ?? ''">

    @if(!$onlyBlocks)
        <section class="block my-24 leading-7 text-left text-jeans-800">
            <div class="px-12 mx-auto w-full text-left">
                <div class="flex flex-wrap -mx-4 text-jeans-800">
                    <div class="relative flex-grow-0 flex-shrink-0 px-4 w-full max-w-full text-center basis-full"
                         style="min-height: 1px;"
                    >
                        @if(!$content->hide_titles)
                            <h1 class="mt-0 mb-4 font-sans text-4xl font-extrabold leading-normal text-center text-silence-900"
                                style="transition: none 0s ease 0s;">
                                {{$content->title}}
                            </h1>
                        @endif
                    </div>
                    <!-- content -->
                    <div class="relative flex-grow-0 flex-shrink-0 px-4 w-full max-w-full basis-full"
                         style="min-height: 1px;">
                        <div class="prose prose-lg prose-jeans mx-auto">
                            {!! $content->content_html !!}
                        </div>
                    </div>
                    <!-- /content -->
                </div>
            </div>
        </section>
    @endif

    <!-- blocks -->
    <div class="flex flex-col">
        @foreach($blocks as $block)
            <x-block :block="$block" />
        @endforeach
    </div>
    <!-- /blocks -->
</x-master-layout>
