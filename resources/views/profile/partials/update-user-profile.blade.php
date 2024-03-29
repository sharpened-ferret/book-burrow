<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('User Profile') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            {{ __("Update your account's public profile.") }}
        </p>

        <form method="post" action="{{ route('userprofile.update', $user->profile->id) }}" enctype="multipart/form-data" class="mt-6 space-y-6">
            @csrf
            @method('put')

            <div>
                <x-input-label for="bio" :value="__('User Bio')" />
                <textarea id="bio" rows="4" name="bio" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-900 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-indigo-600 dark:focus:border-indigo-600" placeholder="Write your bio here...">{{$user->profile->bio}}</textarea>
                <x-input-error :messages="$errors->get('bio')" class="mt-2" />                
            </div>

            @isset($user->profile->image)
            <img src="{{ asset('storage/images/users/'.$user->profile->image) }}" class="h-auto max-w-full" alt="Current profile image"/>
            @endisset

            <div>
                <x-input-label for="image" :value="__('Upload Image')" />
                <input class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-900 dark:border-gray-600 dark:placeholder-gray-400" aria-describedby="file_input_help" type="file" name="image">
                <p class="mt-1 text-sm text-gray-500 dark:text-gray-300" id="file_input_help">SVG, PNG, JPG or GIF.</p>
                <x-input-error :messages="$errors->get('image')" class="mt-2" />               
            </div>

            <div class="flex items-center gap-4">
                <x-primary-button>{{ __('Save') }}</x-primary-button>
    
                @if (session('status') === 'user-profile-updated')
                    <p
                        x-data="{ show: true }"
                        x-show="show"
                        x-transition
                        x-init="setTimeout(() => show = false, 2000)"
                        class="text-sm text-gray-600 dark:text-gray-400"
                    >{{ __('Saved.') }}</p>
                @endif
            </div>
        </form>
    </header>
</section>