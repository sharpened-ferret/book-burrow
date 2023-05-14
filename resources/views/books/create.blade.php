<div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg mt-4">
    <div class="p-6 text-gray-900 dark:text-gray-100">
        <form method="POST" action="{{ route('books.store') }}" class="bg-white dark:bg-gray-800 rounded px-8 pt-6 mb-4">
            <h1 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight pb-8">New Book</h1>
            @csrf
            <p>{{__('Please enter a valid ISBN to submit a new book to the system.')}}</p>
            <div class="mt-2 mb-4">
                <x-input-label for="content" :value="__('Book ISBN')" />
                <x-text-input id="isbn" name="isbn" type="text" class="mt-1 block w-full" required />
                <x-input-error :messages="$errors->get('isbn')" class="mt-2" />
            </div>
            <x-primary-button type="submit">{{ __('Submit') }}</x-primary-button>
            <x-secondary-button onclick="location.href='{{ route('books.index') }}'">{{ __('Cancel') }}</x-primary-button>
            @if (session('status') === 'success')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-lg text-gray-600 dark:text-gray-400 mt-2"
                >{{ __('Review Posted') }}</p>
            @endif
        </form>
    </div>
</div>