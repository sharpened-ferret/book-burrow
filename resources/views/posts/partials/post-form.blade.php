<div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg mt-4">
    <div class="p-6 text-gray-900 dark:text-gray-100">
        
        <form method="POST" action="{{ route('posts.store') }}" class="bg-white dark:bg-gray-800 rounded px-8 pt-6 pb-8 mb-4">
            <h1 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight pb-8">New Post</h1>
            @csrf
            <div>
                <x-input-label for="content" :value="__('Post Content')" />
                <x-text-input type="text" name="content"/>
                <x-input-error :messages="$errors->get('content')" class="mt-2" />
            </div>
            <div class="mt-4 mb-4">
                <x-input-label for="book_id" :value="__('Book')" />
                <select name="book_id" class="block appearance-none w-full focus:dark:bg-gray-600 dark:border-gray-700 dark:bg-gray-900 bg-gray-200 border border-gray-200 dark:text-white text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
                    @foreach (\App\Models\Book::all() as $book)
                    <option value="{{ $book->id }}">
                        {{ $book->title }}
                    </option>
                    @endforeach
                </select>
                <x-input-error :messages="$errors->get('book_id')" class="mt-2" />
            </div>
            <x-primary-button type="submit">{{ __('Submit') }}</x-primary-button>
            <x-secondary-button onclick="location.href='{{ route('posts.index') }}'">{{ __('Cancel') }}</x-primary-button>
        </form>
    </div>
</div>