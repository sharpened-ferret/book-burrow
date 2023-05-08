<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Users') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <ul>
            @foreach ($users as $user)
            
                <li>
                    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg mt-4">
                        <div class="flex p-6 text-gray-900 dark:text-gray-100" style="flex-direction: row; place-content:space-between; flex-wrap:wrap;">
                            <div class="basis-full">
                                <p class="text-lg">{{$user->name}}</p>
                            </div>
                            <div class="flex basis-1">
                                <x-primary-button onclick="location.href='{{ route('users.show', ['id' => $user->id]) }}'">{{ __('View Profile') }}</x-primary-button>
                            </div>
                        </div>
                    </div>
                </li>
            
            @endforeach
        </ul>
        </div>
    </div>

    
</x-app-layout>