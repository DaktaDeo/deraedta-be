<div class="border-b border-red-900/10 pb-12">
    <h2 class="text-base font-semibold leading-7 text-gray-900">{{$title}}</h2>
    <div class="mt-1 text-sm leading-6 text-gray-600">{{$blurb ?? ''}}</div>

    {{ $slot }}

</div>
