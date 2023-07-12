<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            Avatar
        </h2>
        <img class="w-20 h-20 rounded-full" src="{{ "/storage/$user->avatar" }}" alt="user avatar" />
        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">Add or edit your avatar</p>
    </header>
    <form method="post" action="{{ route('profile.avatar') }}" enctype="multipart/form-data">
        @method('patch')
        @csrf
        <div>
            <x-input-label for="avatar" value="avatar" />
            <x-text-input id="avatar" name="avatar" type="file" 
            class="mt-1 block w-full " :value="old('avatar', $user->avatar)" required autofocus autocomplete="avatar"/>
            <x-input-error class="mt-2" :messages="$errors->get('avatar')" />

        </div>
        <div class="flex items-center gap-4 mt-4">
            <x-primary-button>{{ __('Save') }}</x-primary-button>
        </div>
    </form>
</section>