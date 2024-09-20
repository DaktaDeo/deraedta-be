<div data-id="webform-{{$webformId}}">
    <div class="flex justify-center">
        <button type="button"
                class="action-button"
                aria-haspopup="dialog"
                aria-expanded="false"
                aria-controls="hs-modal-{{$webformId}}"
                data-hs-overlay="#hs-modal-{{$webformId}}">
            {{$buttonText}}
        </button>
    </div>

    <div id="hs-modal-{{$webformId}}"
         x-data="{ isSubmitting: false }"
         data-move-to-body="true"
         class="hs-overlay hidden size-full fixed top-0 start-0 z-[2000] overflow-x-hidden overflow-y-auto pointer-events-none"
         role="dialog"
         tabindex="-1"
         aria-labelledby="hs-modal-{{$webformId}}-label">
        <div class="hs-overlay-open:mt-7 hs-overlay-open:opacity-100 hs-overlay-open:duration-500 mt-0 opacity-0 ease-out transition-all md:max-w-6xl w-fullg sm:w-full m-3 sm:mx-auto h-[calc(100%-3.5rem)] min-h-[calc(100%-3.5rem)] flex items-center">
            <div class="w-full max-h-full overflow-hidden flex flex-col bg-silence-10 border shadow-sm rounded-xl pointer-events-auto dark:bg-neutral-800 dark:border-neutral-700 dark:shadow-neutral-700/70">

                <div data-id="webform-{{$webformId}}"
                     class="w-full max-h-full  flex flex-col overflow-hidden">
                    <form class="w-full max-h-full  flex flex-col overflow-hidden" x-ref="form">
                        @csrf

                        <!-- Title Slot -->
                        <div class="flex justify-between items-center py-3 px-4 pt-6 border-b  border-silence-50/75 bg-silence-50/10 dark:border-neutral-700">
                            <div class="flex flex-col items-center mx-auto">
                                <h3 id="hs-modal-{{$webformId}}-label"
                                    class="font-bold  text-silence-900 text-3xl dark:text-white">
                                    {{ $webform->title }}
                                </h3>
                                @if($webform->subtitle)
                                    <h4 class="text-silence-700 text-xl dark:text-neutral-400">
                                        {{ $webform->subtitle }}
                                    </h4>
                                @endif
                            </div>

                            <button type="button"
                                    class="size-8 inline-flex justify-center items-center gap-x-2 rounded-full border border-transparent  bg-silence-50/10 text-silence-900 hover:bg-silence-50 focus:outline-none focus:bg-silence-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-700 dark:hover:bg-neutral-600 dark:text-neutral-400 dark:focus:bg-neutral-600"
                                    aria-label="Close"
                                    data-hs-overlay="#hs-modal-{{$webformId}}">
                                <span class="sr-only">Close</span>
                                <svg class="shrink-0 size-4"
                                     xmlns="http://www.w3.org/2000/svg"
                                     width="24"
                                     height="24"
                                     viewBox="0 0 24 24"
                                     fill="none"
                                     stroke="currentColor"
                                     stroke-width="2"
                                     stroke-linecap="round"
                                     stroke-linejoin="round">
                                    <path d="M18 6 6 18"></path>
                                    <path d="m6 6 12 12"></path>
                                </svg>
                            </button>
                        </div>

                        <!-- Scrollable Content -->
                        <div class="overflow-y-auto">
                            <livewire:webform :webform-id="$webformId"
                                              :key="$webformId"
                                              :sections="$sections"
                                              :guid="$webform->guid"
                                              :redirectAfterSubmit="$redirectAfterSubmit"
                                              :inline="false"
                            />
                        </div>

                        <!-- Buttons Slot -->
                        <div class="flex justify-end items-center gap-x-2 py-3 px-4 border-t dark:border-neutral-700  border-silence-50/75 bg-silence-50/10">
                            <button type="button"
                                    @click="$dispatch('reset-webform.{{$webformId}}')"
                                    class="text-[1rem] text-jeans-900/50 leading-6 hover:border-silence-50 hover:border py-2 px-3 rounded-lg">
                                Reset Form
                            </button>
                            <div class="flex-grow"></div>
                            <button type="button"
                                    class="text-[1rem] text-jeans-900/50 leading-6 hover:border-silence-50 hover:border py-2 px-3 rounded-lg"
                                    data-hs-overlay="#hs-modal-{{$webformId}}">
                                Close
                            </button>
                            <button type="button" class="submit-button" @click="isSubmitting = true; $dispatch('submit-webform.{{$webformId}}')" :disabled="isSubmitting">
                                <span x-show="!isSubmitting">Submit</span>
                                <span x-show="isSubmitting">
                                    <i class="fas fa-spinner fa-spin"></i> Submitting...
                                </span>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
