@php
    $required = $required ?? false;
@endphp
<!-- Checkbox -->
<div class="relative flex items-start hover:text-silence-400 ml-2">
    <div class="flex items-center h-5 mt-1">
        <input id="hs-checkbox-{{ $name }}"
               name="{{ $name }}"
               type="checkbox"
               class="h-5 w-5 border-silence-200 rounded text-silence-600 focus:ring-silence-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 dark:border-neutral-700 dark:checked:bg-silence-500 dark:checked:border-silence-500 dark:focus:ring-offset-gray-800"
               aria-describedby="hs-checkbox-{{ $name }}-description"
               wire:model="formData.{{ $name }}"
               aria-describedby="hs-hint-{{$name}}"
            {{ $required ? 'required': ''}}
        >
    </div>
    <label for="hs-checkbox-{{ $name }}" class="ms-3 flex-grow">
        <span class="block dark:text-neutral-300">
            {{ $label }}
            @if($required)
                <span class="text-red-500">*</span>
            @endif
        </span>
        @if(isset($description))
            <div id="hs-hint-{{$name}}" class="text-silence-700 py-1 px-2 font-light tracking-wide text-s">{{ $description ?? '' }}</div>
        @endif
    </label>
    <x-error-message name="formData.{{ $name }}" />
</div>
<!-- End Checkbox -->
