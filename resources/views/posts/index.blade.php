<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Posts') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @auth
            <livewire:post-form :books="$books" :tags="$tags"/>
            @endauth

            <livewire:post-list :posts="$posts"/>
        </div>
    </div>

    
</x-app-layout>