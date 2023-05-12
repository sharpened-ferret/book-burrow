<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Posts') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <livewire:post-form :books="$books"/>

            <ul>
                @foreach ($posts as $post)
                
                    <livewire:post-list :postContent="$post->content" :postID="$post->id"/>
                
                @endforeach
            </ul>

            <div class="mt-4">
                {{ $posts->links() }}
            </div>
        </div>
    </div>

    
</x-app-layout>