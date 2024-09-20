@php
    $required = $required ?? false;
@endphp


    <!-- Floating Input -->
<div class="relative">
    <input type="{{$type ?? 'text'}}"
           name="{{$name}}"
           autocomplete="{{$name}}"
           {{ $required ? 'required': ''}}
           wire:model="formData.{{ $name }}"
           id="hs-input-{{$name}}"
           aria-describedby="hs-hint-{{$name}}"
           class="peer text-[1.1rem] p-4 block w-full bg-white border-silence-200 rounded-md text-jeans-900 placeholder:text-transparent focus:border-silence-500 focus:ring-silence-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:focus:ring-neutral-600
    focus:pt-8
    focus:pb-3
    [&:not(:placeholder-shown)]:pt-8
    [&:not(:placeholder-shown)]:pb-3
    autofill:pt-8
    autofill:pb-3"
           placeholder="{{ $placeholder ?? '' }}"
    >
    <label for="hs-input-{{$name}}" class="absolute top-0 start-0 p-4 h-full text-silence-800 truncate pointer-events-none transition ease-in-out duration-100 border border-transparent  origin-[0_0] dark:text-white peer-disabled:opacity-50 peer-disabled:pointer-events-none
      peer-focus:scale-90
      peer-focus:translate-x-0.5
      peer-focus:-translate-y-2.5
      peer-focus:text-7ilence-500 dark:peer-focus:text-neutral-500
      peer-[:not(:placeholder-shown)]:scale-90
      peer-[:not(:placeholder-shown)]:translate-x-0.5
      peer-[:not(:placeholder-shown)]:-translate-y-2.5
      peer-[:not(:placeholder-shown)]:text-silence-800 dark:peer-[:not(:placeholder-shown)]:text-silence-800 dark:text-neutral-500">
        {{ $label }}
        @if($required)
            <span class="text-red-500">*</span>
        @endif
    </label>
    <div class="text-silence-800 py-1 px-2 font-light tracking-wide text-sm " id="hs-hint-{{$name}}">{{ $description ?? '' }}</div>
    <x-error-message name="formData.{{ $name }}" />
</div>

<!-- End Floating Input -->
