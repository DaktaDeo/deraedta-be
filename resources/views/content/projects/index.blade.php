<x-master-layout page-title="projects">

    <x-post-index page-title="projects"
                  page-link="/projects"
                  page-subtitle="I'm old enough to have a bunch of projects"
                  read-more-text="Read this entry →"
                  :posts="app(\App\Repositories\PostsRepository::class)
                        ->findByCategory('projects')
                        ->sortByDesc('date')"
    >

        <x-slot name="intro">
            I'm old enough to have a bunch of projects. But they are not yet here. You find them on my <a href="https://www.linkedin.com/in/deraedta/">LinkedIn</a>.
        </x-slot>

    </x-post-index>


</x-master-layout>
