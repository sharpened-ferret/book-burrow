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
                    <p>{{$post->content}}<br>Author: {{$post->user->name}}<br>Book: {{$post->book->title}}<br>{{$post->post_date}}</p>
                    <div><p>Likes {{$post->likedBy->count()}}</p></div>
                </div>
            </div>
            <h1 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight mt-6">Comments:</h1>
            @foreach ($post->comments as $comment)
            <div class="bg-white dark:bg-gray-700 overflow-hidden shadow-sm sm:rounded-lg text-sm mt-4">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                <p>{{$comment->content}}<br>Author: <a class="no-underline hover:underline" href="{{route('users.show', ['id' => $comment->user->id])}}">{{$comment->user->name}}</a>
                <p>{{$comment->post_date}}</p>
                </div>
            </div>
            @endforeach
                
        </div>
    </div>

    
</x-app-layout>