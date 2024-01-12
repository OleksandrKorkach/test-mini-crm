<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Company employees') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __("Information about company members") }}
        </p>
    </header>

    <div class="relative overflow-x-auto">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">First name</th>
                <th scope="col" class="px-6 py-3">Last name</th>
                <th scope="col" class="px-6 py-3">Email</th>
                <th scope="col" class="px-6 py-3">Phone</th>
                <th scope="col" class="px-6 py-3">Company</th>
            </tr>
            </thead>
            <tbody>
            @foreach($company->employees as $employee)
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                    <td class="px-6 py-4">{{$employee->first_name}}</td>
                    <td class="px-6 py-4">{{$employee->last_name}}</td>
                    <td class="px-6 py-4">{{$employee->email}}</td>
                    <td class="px-6 py-4">{{$employee->phone}}</td>
                    <td class="px-6 py-4">{{$employee->company->name}}</td>
                    <td>
                        <form action="{{ route('employees.edit', $employee->id) }}" method="POST">
                            @csrf
                            @method('GET')

                            <x-primary-button type="submit">
                                {{ __('Update') }}
                            </x-primary-button>
                        </form >
                    </td>
                    <td>
                        <form action="{{ route('employees.destroy', $employee->id) }}" method="POST">
                            @csrf
                            @method('DELETE')

                            <x-primary-button type="submit" onclick="return confirm('Are you sure you want to delete this employee?')">
                                {{ __('Delete') }}
                            </x-primary-button>
                        </form >
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>


</section>
