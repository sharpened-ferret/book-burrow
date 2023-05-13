<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Edit Comment') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg mt-4">
            <div class="p-6 text-gray-900 dark:text-gray-100">
                <form method="POST" action="{{ route('comments.update', $comment->id) }}" class="bg-white dark:bg-gray-800 rounded px-8 pt-6 mb-4">
                    @method('PUT')
                    @csrf
                    <h1 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight pb-8">{{ __('Edit Comment on post: ') }}{{$comment->post->content}}</h1>
                    <input type="hidden" name="user_id" value="{{ Auth::id() }}">
                    <div class="mb-4">
                        <x-input-label for="content" :value="__('Comment Content')" />
                        <textarea id="content" rows="4" name="content" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-900 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">{{$comment->content}}</textarea>
                        <x-input-error :messages="$errors->get('content')" class="mt-2" />
                    </div>
                    <x-input-error :messages="$errors->get('user_id')" class="mt-2" />
                    <x-primary-button type="submit">{{ __('Submit') }}</x-primary-button>
                    <x-secondary-button onclick="location.href='{{ route('posts.show', $comment->post->id) }}'">{{ __('Cancel') }}</x-primary-button>
                    @if (session('status') === 'success')
                        <p
                            x-data="{ show: true }"
                            x-show="show"
                            x-transition
                            x-init="setTimeout(() => show = false, 2000)"
                            class="text-lg text-gray-600 dark:text-gray-400 mt-2"
                        >{{ __('Comment Updated') }}</p>
                    @endif
                </form>
            </div>
        </div>
        </div>
    </div>

</x-app-layout>