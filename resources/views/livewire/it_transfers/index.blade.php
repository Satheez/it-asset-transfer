<x-app-layout>

    <div class="container mx-auto py-4">
        <h1 class="text-2xl font-bold mb-4 text-gray-900 dark:text-white">{{ __('IT Asset Transfer Forms') }}</h1>


        <!-- Flex container to align button to the right -->
        <div class="flex justify-end mb-8">
            <!-- Button to create a new form -->
            <a href="{{ route('it-transfers.create') }}"
               class="inline-block bg-blue-500 text-white font-semibold px-4 py-2 rounded-lg shadow-md hover:bg-blue-600 dark:bg-blue-400 dark:hover:bg-blue-500">
                {{ __('Create New Form') }}
            </a>
        </div>

        <!-- Display the paginated records in a table -->
        <table class="w-full table-auto bg-white shadow-md rounded-lg border-collapse mt-4">
            <thead>
            <tr class="bg-gray-100">
                <th class="border px-4 py-2">{{ __('Form ID') }}</th>
                <th class="border px-4 py-2">{{ __('From Admin Name') }}</th>
                <th class="border px-4 py-2">{{ __('To Admin Name') }}</th>
                <th class="border px-4 py-2">{{ __('Approved By') }}</th>
                <th class="border px-4 py-2 text-center">{{ __('Actions') }}</th>
            </tr>
            </thead>
            <tbody>
            @forelse ($records as $record)
                <tr class="border-t">
                    <td class="border px-4 py-2">{{ $record->id }}</td>
                    <td class="border px-4 py-2">{{ $record->from_admin_name }}</td>
                    <td class="border px-4 py-2">{{ $record->to_admin_name }}</td>
                    <td class="border px-4 py-2">{{ $record->approved_by_name }}</td>
                    <td class="border px-4 py-2 text-center">
                        <!-- Edit button -->
                        <a href="{{ route('it-transfers.edit', $record->id) }}"
                           class="bg-blue-700 text-white text-sm px-2 py-1 rounded-md hover:bg-blue-800 dark:bg-black dark:hover:bg-gray-800">
                            {{ __('Edit') }}
                        </a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="border px-4 py-2 text-center">{{ __('No forms available') }}</td>
                </tr>
            @endforelse
            </tbody>
        </table>

        <!-- Pagination links -->
        <div class="mt-4 flex justify-center">
            {{ $records->links() }}
        </div>
    </div>


</x-app-layout>
