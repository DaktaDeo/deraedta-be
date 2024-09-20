<div class="{{$classes ?? '' }}">
    <div class="mt-4 flex grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
        <div class="sm:col-span-2 sm:col-start-1">
            <label for="social_{{ $name }}_type" class="sr-only">Selecteer een type social account</label>
            <select id="social_{{ $name }}_type"
                    name="social_{{ $name }}_type"
                    autocomplete="social_{{ $name }}_type"
                    wire:model="data.social_{{ $name }}_type"
                    class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-red-600 sm:max-w-xs sm:text-sm sm:leading-6"
            >
                <option {{ $selected === 'Mastodon' ? 'selected': ''}}>Mastodon</option>
                <option {{ $selected === 'Twitter' ? 'selected': ''}}>Twitter</option>
                <option {{ $selected === 'Facebook' ? 'selected': ''}}>Facebook</option>
                <option {{ $selected === 'Instagram' ? 'selected': ''}}>Instagram</option>
                <option {{ $selected === 'WhatsApp' ? 'selected': ''}}>WhatsApp</option>
            </select>
            <x-error-message name="social_{{ $name }}_type" />
        </div>
        <div class="sm:col-span-4">
            <label for="social_{{ $name }}_link"
                   class="block text-sm font-medium leading-6 text-gray-900 sr-only">{{ $label }}</label>
            <input type="url"
                   name="social_{{ $name }}_link"
                   id="social_{{ $name }}_link"
                   autocomplete="social_{{ $name }}_link"
                   wire:model="data.social_{{ $name }}_link"
                   placeholder="https://..."
                   class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-red-600 sm:text-sm sm:leading-6"/>
        </div>
        <x-error-message name="social_{{ $name }}_link" />
    </div>
</div>
