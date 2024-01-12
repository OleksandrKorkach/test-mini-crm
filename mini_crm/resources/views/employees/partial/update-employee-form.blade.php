<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Update employee info') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __("Fill employee information.") }}
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('employees.update', $employee->id) }}" class="mt-6 space-y-6">
        @csrf
        @method('patch')

        <div>
            <x-input-label for="first_name" :value="__('First name')" />
            <x-text-input id="first_name" name="first_name" type="text" class="mt-1 block w-4/12" :value="old('name', $employee->first_name)" required autocomplete="first_name"/>
            <x-input-error class="mt-2" :messages="$errors->get('first_name')" />
        </div>

        <div>
            <x-input-label for="last_name" :value="__('Last name')" />
            <x-text-input id="last_name" name="last_name" type="text" class="mt-1 block w-4/12" :value="old('last_name', $employee->last_name)" autocomplete="last_name"/>
            <x-input-error class="mt-2" :messages="$errors->get('last_name')" />
        </div>

        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" name="email" type="email" class="mt-1 block w-4/12" :value="old('email', $employee->email)" autocomplete="email"/>
            <x-input-error class="mt-2" :messages="$errors->get('email')" />
        </div>

        <div>
            <x-input-label for="phone" :value="__('Phone number')" />
            <x-text-input id="phone" name="phone" type="text" class="mt-1 block w-4/12" :value="old('phone', $employee->phone)" autocomplete="phone"/>
            <x-input-error class="mt-2" :messages="$errors->get('phone')" />
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Update') }}</x-primary-button>
        </div>
    </form>
</section>
