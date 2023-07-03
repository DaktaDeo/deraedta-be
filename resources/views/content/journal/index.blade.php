<x-master-layout page-title="journal">

    <x-post-index page-title="journal"
                  page-link="/journal"
                  page-subtitle=""
                  read-more-text="Read this entry →"
                  :posts="app(\App\Repositories\PostsRepository::class)
                        ->findByCategory('journal')
                        ->sortByDesc('date')"
    >

    </x-post-index>

</x-master-layout>


