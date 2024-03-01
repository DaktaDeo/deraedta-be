<x-master-layout :page-title="$content->title ?? ''">
    <article class="prose prose-indigo p-2 mx-auto dark:prose-light md:p-0">

        @if($content->hide_titles)
            <h1 class="sr-only">
                {{$content->title}}
            </h1>
        @else
        <h1>
            <a href="{{$content->permaLink}}"
               class="permalink" aria-hidden="true" title="Permalink">
                #
            </a>
            {{$content->title}}
        </h1>
        @endif


        <div class="flex mt-8 text-gray-500 text-xs mb-6 gap-2">
            <x-relative-time :date-time="$content->release_date" prefix="Published →" />
            @if($content->reading_time > 0)
                <div>
                    {{$content->reading_time}} min read
                </div>
            @endif
        </div>

        <div class="mt-4">
            {!! $content->content_html !!}
        </div>
    </article>
</x-master-layout>
