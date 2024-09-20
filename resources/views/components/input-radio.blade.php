@php
    $required = $required ?? false;
@endphp

    <!-- Radio group inline -->
<div>
    <div class="block text-silence-800 mb-2 dark:text-white">
        {{ $label }}
        @if($required)
            <span class="text-red-500">*</span>
        @endif
    </div>
    <div class="flex gap-x-6 justify-between">
        @foreach($options as $option)
            <div class="flex flex-1">
                <input type="radio"
                       name="{{ $name }}"
                       class="shrink-0 h-5 w-5  mt-1 border-silence-200 rounded-full text-silence-600 focus:ring-silence-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 dark:border-neutral-700 dark:checked:bg-silence-500 dark:checked:border-silence-500 dark:focus:ring-offset-gray-800"
                       id="{{ $name }}-{{ $loop->index }}"
                       value="{{ $option['value'] }}"
                    {{--                       @if($loop->first) checked @endif--}}
                       wire:model="formData.{{ $name }}"
                >
                <label for="{{ $name }}-{{ $loop->index }}"
                       class="text-jeans-900 ms-2 dark:text-neutral-400 w-full">{{ $option['label'] }}</label>
            </div>
        @endforeach

        @if(isset($description))
            <div id="hs-hint-{{$name}}"
                 class="text-silence-700 py-1 px-2 font-light tracking-wide text-s">{{ $description ?? '' }}</div>
        @endif
        <x-error-message name="formData.{{ $name }}" />
    </div>
</div>
<!-- End Radio -->

