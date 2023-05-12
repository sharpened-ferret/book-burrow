<div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg mt-4">
    <div class="p-6 text-gray-900 dark:text-gray-100">
        {{-- <form method="POST" action="{{ route('comments.store') }}" class="bg-white dark:bg-gray-800 rounded px-8 pt-6 mb-4"> --}}
        <form method="POST" action="{{ route('comments.store') }}" class="bg-white dark:bg-gray-800 rounded px-8 pt-6 mb-4">
            <h1 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight pb-8">New Comment</h1>
            @csrf
            <div class="mb-4">
                <x-input-label for="content" :value="__('Comment Content')" />
                <textarea id="content" rows="4" name="content" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-900 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Write your review here..."></textarea>
                <x-input-error :messages="$errors->get('content')" class="mt-2" />
                <input type="hidden" id="post_id" name="post_id" value="{{ $postID }}">
            </div>
            <x-primary-button type="submit">{{ __('Submit') }}</x-primary-button>
            @if (session('status') === 'success')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-lg text-gray-600 dark:text-gray-400 mt-2"
                >{{ __('Comment Posted') }}</p>
            @endif
        </form>
    </div>
</div>

<script>
    $(document).on('submit', 'form', function(e) {
    e.preventDefault();

    // your ajax or whatever put here
});
</script>