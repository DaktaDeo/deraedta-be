<x-layout>
    <x-slot name="hero"></x-slot>

    <div class="max-w-6xl mx-auto p-0 lg:p-4 mt-32">
        <div
            class="flex-col mt-8 mx-2 md:mx-4 scale-100 p-6 bg-white dark:bg-gray-800/50 dark:bg-gradient-to-bl from-gray-700/50 via-transparent dark:ring-1 dark:ring-inset dark:ring-white/5 rounded-lg shadow-2xl shadow-gray-500/20 dark:shadow-none flex">

            <h1 class="mt-6 text-xl font-semibold text-gray-900 dark:text-white">
                {{ $calendarEvent->publicname }}
            </h1>
            <div class="mt-0 prose-sm">
                {!!  $calendarEvent->content_html !!}
            </div>

            @if($calendarEvent->is_locked)
                <x-event-locked :calendarEvent="$calendarEvent"/>
            @else
                <div class="py-4 text-center font-bigger">
                    <a class="rounded-md bg-red-600 px-3.5 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-red-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-red-600"
                       href="{{route('event.register',["id" => $calendarEvent->id, "slug" => $calendarEvent->slug])}}">
                        Inschrijven
                    </a>
                </div>
            @endif
        </div>
    </div>
</x-layout>
