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
                        <div class="p-6 text-gray-900 dark:text-gray-100">
                            <p>{{$user->name}}</p>
                            <a href="{{route('users.show', ['id' => $user->id])}}">View Profile</a>
                        </div>
                    </div>
                </li>
            
            @endforeach
        </ul>
        </div>
    </div>

    
</x-app-layout>