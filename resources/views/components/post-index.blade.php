<div class="relative px-4 sm:px-6 lg:px-8">
    <div class="text-lg max-w-prose mx-auto">
        <h1 class="pb-7">
            <span
                class=" block text-base text-center text-indigo-600 font-semibold tracking-wide uppercase dark:text-indigo-400">{{ $pageTitle }}</span>
            <span
                class=" mt-2 block text-3xl text-center leading-8 font-extrabold tracking-tight sm:text-4xl ">{{ $pageSubtitle }}</span>
        </h1>

        @if(!empty($messages))
            {!! $messages !!}
        @endif

        @if(!empty($intro))
            <div class="text-sm text-slate-500 my-7 py-0 px-3 dark:border-indigo-800 dark:text-slate-500 border-l-2 italic border-indigo-600">
                {!! $intro !!}
            </div>
        @endif

        {!! $slot !!}

        <div class="mt-4">
            @foreach($posts as $post)
                <x-post-preview :post="$post" :read-more-text="$readMoreText" :show-excerpt="$showExcerpt"/>
            @endforeach
        </div>
    </div>
</div>
