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
            @foreach ($book->posts as $post)
            <div class="bg-white dark:bg-gray-700 overflow-hidden shadow-sm sm:rounded-lg text-sm mt-4">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                <p>{{$post->content}}<br>{{$post->post_date}}</p>
                </div>
            </div>
            @endforeach
                
        </div>
    </div>

    
</x-app-layout>