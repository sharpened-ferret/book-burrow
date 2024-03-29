<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{$book->title}}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <p class="text-xl">{{$book->title}}</p>
                    <p>by {{$book->author}}</p>
                    <br>
                    <p>ISBN: {{$book->isbn}}</p>
                </div>
            </div>
            <h1 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight mt-6">Reviews:</h1>
            @foreach ($book->posts as $post)
            <div class="bg-white dark:bg-gray-700 overflow-hidden shadow-sm sm:rounded-lg text-sm mt-4">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <a class="no-underline hover:underline" href="{{route('posts.show', ['post_id' => $post->id])}}">{{$post->content}}</a>
                    <div class="mt-2 flex flex-row justify-start">
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
            @endforeach
                
        </div>
    </div>

    
</x-app-layout>