<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{$user->name}}'s Profile
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <p class="text-xl">{{$user->name}}</p>
                    <p>{{$user->profile->bio}}</p>
                </div>
            </div>
            <h1 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight mt-6">Reviews:</h1>
            @foreach ($user->posts as $post)
            <div class="bg-white dark:bg-gray-700 overflow-hidden shadow-sm sm:rounded-lg text-sm mt-4">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <p>{{$post->content}}</p> 
                    <div class="mt-2 flex flex-row">
                        <div class="basis-11/12">
                            <a class="no-underline hover:underline" href="{{route('books.show', ['id' => $post->book->id])}}">{{$post->book->title}}</a> by {{$post->book->author}}</p>
                            <p>{{$post->post_date}}</p>
                        </div>
                        @auth
                        <livewire:post-like :post="$post"/>
                        @endauth
                    </div>
                </div>
            </div>
            @endforeach
            <h1 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight mt-6">Comments:</h1>
            @foreach ($user->comments as $comment)
            <div class="bg-white dark:bg-gray-700 overflow-hidden shadow-sm sm:rounded-lg text-sm mt-4">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <p>{{$comment->content}}</p> 
                
                    <div class="flex flex-row justify-start mt-2">
                        <div class="basis-11/12">
                            <a class="no-underline hover:underline" href="{{route('posts.show', ['post_id' => $comment->post->id])}}">{{$comment->post->content}}</a>
                            <p>{{$comment->post->post_date}}</p>
                        </div>
                        @auth
                        <livewire:comment-like :comment="$comment"/>
                        @endauth
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>

    
</x-app-layout>