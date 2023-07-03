<x-master-layout page-title="reviews">

    <x-post-index page-title="reviews"
                  page-link="/reviews"
                  page-subtitle=""
                  read-more-text="Read this entry →"
                  :posts="app(\App\Repositories\PostsRepository::class)
                        ->findByCategory('reviews')
                        ->sortByDesc('date')"
    >

    </x-post-index>

</x-master-layout>
