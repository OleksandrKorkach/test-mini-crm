<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Company info') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __("Fill company information.") }}
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('companies.store') }}" class="mt-6 space-y-6" enctype="multipart/form-data">
        @csrf
        @method('post')

        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" name="name" type="text" class="mt-1 block w-4/12"/>
            <x-input-error class="mt-2" :messages="$errors->get('name')" />
        </div>

        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" name="email" type="email" class="mt-1 block w-4/12"/>
            <x-input-error class="mt-2" :messages="$errors->get('email')" />
        </div>

        <div>
            <x-input-label for="website" :value="__('Website URL (Unnecessary)')" />
            <x-text-input id="website" name="website" type="text" class="mt-1 block w-4/12"/>
            <x-input-error class="mt-2" :messages="$errors->get('website')" />
        </div>

        <div>
            <x-input-label for="logo" :value="__('Upload logo')" />
            <x-text-input id="logo" name="logo" type="file" class="mt-1 block w-3/12"/>
            <x-input-error class="mt-2" :messages="$errors->get('logo')" />
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Create') }}</x-primary-button>
        </div>
    </form>
</section>
