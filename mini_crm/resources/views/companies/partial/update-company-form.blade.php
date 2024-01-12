<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Update company info') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __("Fill company information.") }}
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('companies.update', $company->id) }}" class="mt-6 space-y-6">
        @csrf
        @method('patch')

        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" name="name" type="text" class="mt-1 block w-4/12" :value="old('name', $company->name)" required autocomplete="name"/>
            <x-input-error class="mt-2" :messages="$errors->get('name')" />
        </div>

        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" name="email" type="email" class="mt-1 block w-4/12" :value="old('email', $company->email)" autocomplete="email"/>
            <x-input-error class="mt-2" :messages="$errors->get('email')" />
        </div>

        <div>
            <x-input-label for="website" :value="__('Website URL (Unnecessary)')" />
            <x-text-input id="website" name="website" type="text" class="mt-1 block w-4/12" :value="old('website', $company->website)" autocomplete="website"/>
            <x-input-error class="mt-2" :messages="$errors->get('website')" />
        </div>

        <div>
            <x-input-label for="image" :value="__('Upload logo')" />
            <x-text-input id="logo" name="image" type="file" class="mt-1 block w-3/12"/>
            <x-input-error class="mt-2" :messages="$errors->get('image')" />
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Update') }}</x-primary-button>
        </div>
    </form>
</section>
