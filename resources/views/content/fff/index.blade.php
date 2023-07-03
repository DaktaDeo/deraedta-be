<x-master-layout page-title="If the wine is in the man, the wisdom is in the pitcher.">

    <x-post-index page-title="If the wine is in the man, the wisdom is in the pitcher."
                  page-link="/fff"
                  page-subtitle="Ah! Office Mistress, the romantic side of me"
                  read-more-text="Read this entry →"
                  :posts="app(\App\Repositories\PostsRepository::class)
                        ->findByCategory('fff')
                        ->sortByDesc('date')"
    >
        <x-slot name="intro">

            <p>
                I'm not the woman with much humor. I'm too serious. But onces in a while, the other side of me is coming up. The result are scribbles you can read hear.
            </p>

        </x-slot>

        <div class="rounded-md bg-yellow-200 p-4 shadow-md">
            <div class="flex">
                <div class="flex-shrink-0">
                    <i class="h-5 w-5 text-yellow-800 fal fa-warning" aria-hidden="true"></i>
                </div>
                <div class="ml-3">
                    <h3 class="text-sm font-medium text-yellow-800">In vino veritas.</h3>
                </div>
            </div>
        </div>
    </x-post-index>

</x-master-layout>
