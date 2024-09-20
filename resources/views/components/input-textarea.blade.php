@php
    $required = $required ?? false;
@endphp
<!-- Textarea -->
<div>
    <label for="hs-textarea-{{$name}}" class="block text-silence-800 mb-2 dark:text-white">
        {{ $label }}
        @if($required)
            <span class="text-red-500">*</span>
        @endif
    </label>
    <textarea
        id="hs-textarea-{{$name}}"
        class="py-3 px-4 placeholder:text-silence-400 block w-full text-[1.1rem] text-jeans-900 border-silence-200 rounded-lg focus:border-silence-500 focus:ring-silence-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600"
        rows="3"
        placeholder="{{ $placeholder ?? '' }}"
        wire:model="formData.{{ $name }}"
        aria-describedby="hs-hint-{{$name}}"></textarea>
    <div class="text-silence-800 py-1 px-2 font-light tracking-wide text-sm " id="hs-hint-{{$name}}">{{ $description ?? '' }}</div>
    <x-error-message name="formData.{{ $name }}" />
</div>
<!-- End Textarea -->
