<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Posts') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        @include('posts.partials.post-form')
        <ul>
            @foreach ($posts as $post)
            
                <li>
                    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg mt-4">
                        <div class="p-6 text-gray-900 dark:text-gray-100">
                            <div class="flex basis-0 w-256">
                                <p class="text-lg">{{$post->content}}</p>
                            </div>
                            <div class="flex basis-1" style="flex-direction: row; direction:rtl">
                                <x-primary-button onclick="location.href='{{ route('posts.show', ['post_id' => $post->id]) }}'">{{ __('View Post') }}</x-primary-button>
                            </div>
                        </div>
                    </div>
                </li>
            
            @endforeach
        </ul>
        </div>
    </div>

    
</x-app-layout>