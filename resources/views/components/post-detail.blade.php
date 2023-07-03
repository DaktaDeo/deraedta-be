<article class="prose prose-indigo p-2 mx-auto dark:prose-light md:p-0">

    <h1>
        <a href="{{$post->permaLink}}"
           class="permalink" aria-hidden="true" title="Permalink">
            #
        </a>
        {{$post->title}}
    </h1>


    <div class="flex mt-8 text-gray-500 text-xs mb-6 gap-2">
        <x-relative-time :date-time="$post->release_date" prefix="Published →" />
        <div>
            {{$post->readingTime}} min read
        </div>
    </div>

    <div class="mt-4">
        {!! $post->content !!}
    </div>
</article>
