<div data-id="webform-{{$webformId}}" class="w-full max-h-full  flex flex-col">
    <form data-livewire-form-hack="true" class="w-full max-h-full  flex flex-col">
        @csrf

        @if(!$webform->hide_titles)
        <!-- Title Slot -->
        <div class="text-center px-6 py-4">

            <div class="text-3xl font-bold text-silence-900">
                {{ $webform->title }}
            </div>
            <div class="text-2xl text-silence-700 mt-2">
                {{ $webform->subtitle }}
            </div>
        </div>
        @endif

        <livewire:webform :webform-id="$webformId" :key="$webformId" :sections="$sections" :guid="$webform->guid" :redirectAfterSubmit="$redirectAfterSubmit" :inline="true"/>

        <!-- Buttons Slot -->
        <div class="mt-6 flex items-center justify-end gap-x-6">
            <button type="button"
                    @click="$dispatch('reset-webform.{{$webformId}}')"
                    class="text-lg text-jeans-900/50 leading-6">
                Reset Form
            </button>
            <div class="flex-grow"></div>
            <button type="submit" class="submit-button" @click="$dispatch('submit-webform.{{$webformId}}')">
                Submit
            </button>
        </div>
    </form>
</div>
