<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{$post->user->name}}'s Review of {{$post->book->title}}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="flex flex-row">
                        <div class="basis-11/12">
                            <p>{{$post->content}}</p>
                            <p>Book: <a class="no-underline hover:underline" href="{{route('books.show', ['id' => $post->book->id])}}">{{$post->book->title}}</a></p>
                            @isset ($post->image) 
                            <img src="{{ asset('storage/images/posts/'.$post->image) }}" class="h-auto max-w-full" alt="Post Image"/>
                            @endisset
                        </div>
                        @include('posts.partials.modify')
                    </div>
                    <div class="mt-2 flex flex-row">
                        <div class="basis-11/12">
                            <a class="no-underline hover:underline" href="{{route('users.show', ['id' => $post->user->id])}}">{{$post->user->name}}</a>
                            <p>{{$post->post_date}}</p>
                        </div>
                        @auth
                        <livewire:post-like :post="$post"/>
                        @endauth
                    </div>
                </div>
            </div>
            <h1 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight mt-6">Comments:</h1>
            @auth
            <livewire:comment-form :post="$post" />
            @endauth
            <livewire:comment-list :comments="$comments" :post_id="$post->id">
                
        </div>
    </div>

    
</x-app-layout>