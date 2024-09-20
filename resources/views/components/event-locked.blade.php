<div
    class="flex-col mt-8 mx-2 md:mx-4 scale-100 p-1 bg-amber-300 dark:bg-gray-800/50 dark:bg-gradient-to-bl from-gray-700/50 via-transparent dark:ring-1 dark:ring-inset dark:ring-white/5 rounded-lg shadow-2xl shadow-gray-500/20 dark:shadow-none flex">

    <div class="rounded-md bg-amber-100 p-4">
        <div class="flex">
            <div class="flex-shrink-0">
                <div class="h-5 w-5 text-yellow-700" aria-hidden="true">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512" fill="currentColor">
                        <!--! Font Awesome Pro 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                        <path
                            d="M449.6 192c-9.4 9.2-17.1 20-22.8 32H96V352H352V272 256h32v16 15.7h0L384 512H368 80 64V496 224H32 0V192 176L96 0H544l96 176v16 32H629.2c-5.7-12-13.5-22.8-22.8-32H608v-7.8L525 32H115L32 184.2V192H64 96 449.6zM96 480H352V384H96v96zM528 224c-26.5 0-48 21.5-48 48v48h96V272c0-26.5-21.5-48-48-48zm-80 48c0-44.2 35.8-80 80-80s80 35.8 80 80v48h32v32V480v32H608 448 416V480 352 320h32V272zm0 80V480H608V352H448z"/>
                    </svg>
                </div>
            </div>
            <div class="ml-3">
                <h3 class="text-sm font-medium text-yellow-800">{{ $calendarEvent->publicname }}: Locked</h3>
                <div class="mt-2 text-sm text-yellow-700">
                    <p>{{$calendarEvent->is_locked_reason ?? 'De inschrijvingen voor dit event zijn afgelopen.'}}</p>
                </div>
            </div>
        </div>
    </div>
</div>
