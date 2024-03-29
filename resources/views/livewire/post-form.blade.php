
<div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg mt-4">
    <div class="p-6 text-gray-900 dark:text-gray-100">
        <form wire:submit.prevent="submit" class="bg-white dark:bg-gray-800 rounded px-8 pt-6 mb-4">
            <h1 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight pb-8">New Post</h1>
            @csrf
            <div>
                <x-input-label for="content" :value="__('Post Content')" />
                <textarea id="content" rows="4" wire:model="content" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-900 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Write your review here..."></textarea>
                <x-input-error :messages="$errors->get('content')" class="mt-2" />
            </div>
            <div class="mt-4 mb-2">
                <x-input-label for="book_id" :value="__('Book')" />
                <select id="book_id" wire:model="book_id" selected="" class="block appearance-none w-full focus:dark:bg-gray-600 dark:border-gray-700 dark:bg-gray-900 bg-gray-200 border border-gray-200 dark:text-white text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
                    <option value="" selected>Select a book</option>
                    @foreach ($books as $book)
                    <option value="{{ $book->id }}">
                        {{ $book->title }}
                    </option>
                    @endforeach
                </select>
                <x-input-error :messages="$errors->get('book_id')" class="mt-2" />
            </div>
            <div class="mt-4 mb-2">
                <x-input-label for="tag_ids" :value="__('Tags')" />
                <select multiple id="tag_ids" aria-multiselectable="true" wire:model="tag_ids" selected="" class="block appearance-none w-full focus:dark:bg-gray-600 dark:border-gray-700 dark:bg-gray-900 bg-gray-200 border border-gray-200 dark:text-white text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
                    <option value="" selected>{{__('Select Tags')}}</option>
                    @foreach ($tags as $tag)
                    <option value="{{ $tag->id }}">
                        {{ $tag->label }}
                    </option>
                    @endforeach
                </select>
                <x-input-error :messages="$errors->get('tag_ids')" class="mt-2" />
            </div>
            <div mb-4>
                <x-input-label for="image" :value="__('Upload Image')" />
                <input class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-900 dark:border-gray-600 dark:placeholder-gray-400" aria-describedby="file_input_help" id="upload_{{ $iteration }}" type="file" wire:model="image">
                <p class="mt-1 text-sm text-gray-500 dark:text-gray-300" id="file_input_help">SVG, PNG, JPG or GIF.</p>
                <x-input-error :messages="$errors->get('image')" class="mt-2" />
            </div>
            <x-primary-button type="submit">{{ __('Submit') }}</x-primary-button>
            <x-secondary-button onclick="location.href='{{ route('posts.index') }}'">{{ __('Cancel') }}</x-primary-button>
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