<div>
    @if ($errors->has('api_error'))
        <div id="hs-error-modal-{{$webformId}}"
             class="hs-overlay hs-overlay-open:opacity-100 fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50">
            <div class="hs-overlay-open:scale-100 transform bg-white rounded-lg shadow-lg max-w-lg w-full p-6">
                <div class="text-xl font-semibold text-red-500">
                    Error
                </div>
                <div class="mt-4 text-gray-700">
                    {{ $errors->first('api_error') }}
                </div>
                <div class="mt-6 text-right">
                    <button type="button"
                            @click="$dispatch('clear-errors-webform.{{$webformId}}')"
                            class="hs-modal-close text-red-500 hover:text-red-600">
                        Close
                    </button>
                </div>
            </div>
        </div>
    @endif

        <div @class([
            'space-y-4',
            'p-8' => $inline === false
        ])>
        <!-- Sections -->
        <x-honeypot livewire-model="extraFields" />
        @foreach($sections as $section)
            <div class="pb-4">
                <div class="font-semibold leading-7 text-jeans-500/80 text-xl">{{ $section['title'] }}</div>
                <div class="leading-6 prose prose-lg prose-jeans p-4 max-w-full">{!! $section['description'] ?? '' !!}</div>

                <div class="grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6 ml-2">
                    @foreach($section['fields'] as $field)

                        <div class="{{data_get($field,'classes'),''}}">
                            @if($field['type'] === 'text' || $field['type'] === 'email' || $field['type'] === 'tel')
                                <x-input
                                    name="{{ $field['name'] }}"
                                    label="{{ $field['label'] }}"
                                    type="{{ $field['type'] }}"
                                    description="{{ $field['description'] ?? '' }}"
                                    required="{{ $field['required'] }}"
                                    placeholder="{{ $field['placeholder'] }}"
                                />
                            @elseif($field['type'] === 'textarea')
                                <x-input-textarea
                                    name="{{ $field['name'] }}"
                                    label="{{ $field['label'] }}"
                                    description="{{ $field['description'] ?? '' }}"
                                    required="{{ $field['required'] }}"
                                    placeholder="{{ $field['placeholder'] }}"
                                />
                            @elseif($field['type'] === 'radio')
                                <x-input-radio
                                    name="{{ $field['name'] }}"
                                    label="{{ $field['label'] }}"
                                    description="{{ $field['description'] ?? '' }}"
                                    required="{{ $field['required'] }}"
                                    :options="$field['options']"
                                />
                            @elseif($field['type'] === 'select')
                                <select
                                    id="{{ $field['name'] }}"
                                    name="{{ $field['name'] }}"
                                    wire:model.defer="formData.{{ $field['name'] }}"
                                    class="mt-1 block w-full text-lg rounded-md border-0 shadow-sm ring-1 ring-inset ring-silence-300 focus:ring-2 focus:ring-inset focus:ring-silence-600 sm:leading-6"
                                    @if($field['required']) required @endif
                                >
                                    <option value="">{{ $field['placeholder'] ?? '--Please choose--' }}</option>
                                    @foreach($field['options'] ?? [] as $option)
                                        <option value="{{ $option['value'] }}">{{ $option['label'] }}</option>
                                    @endforeach
                                </select>
                            @elseif($field['type'] === 'checkbox')
                                <x-input-checkbox
                                    name="{{ $field['name'] }}"
                                    label="{{ $field['label'] }}"
                                    description="{{ $field['description'] ?? '' }}"
                                    required="{{ $field['required'] }}"
                                />
                            @endif
                        </div>
                    @endforeach
                </div>
            </div>
        @endforeach
    </div>
</div>

