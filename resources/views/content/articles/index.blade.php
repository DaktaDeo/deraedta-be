<x-master-layout page-title="Articles">

<x-post-index page-title="Articles"
              page-link="/articles"
              page-subtitle="A collection of articles I've written"
                read-more-text="Read this article →"
              :posts="app(\App\Repositories\PostsRepository::class)
                        ->findByCategory('articles')
                        ->sortByDesc('date')"
/>

</x-master-layout>


