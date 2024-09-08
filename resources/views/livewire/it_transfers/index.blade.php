<x-app-layout>

<div class="container">
    <h1>{{ __('IT Asset Transfer Forms') }}</h1>

    <!-- Button to create a new form -->
    <a href="{{ route('it-transfers.create') }}" class="btn btn-success mb-3 float-end">{{ __('Create New Form') }}</a>

    <!-- Display the paginated records in a table -->
    <table class="table table-bordered">
        <thead>
        <tr>
            <th>{{ __('Form ID') }}</th>
            <th>{{ __('From Admin Name') }}</th>
            <th>{{ __('To Admin Name') }}</th>
            <th>{{ __('Approved By') }}</th>
            <th>{{ __('Actions') }}</th>
        </tr>
        </thead>
        <tbody>
        @forelse ($records as $record)
            <tr>
                <td>{{ $record->id }}</td>
                <td>{{ $record->from_admin_name }}</td>
                <td>{{ $record->to_admin_name }}</td>
                <td>{{ $record->approved_by_name }}</td>
                <td>
                    <!-- Edit button -->
                    <a href="{{ route('it-transfers.edit', $record->id) }}" class="btn btn-primary">{{ __('Edit') }}</a>

                    <!-- You can add other action buttons here if needed -->
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="5">{{ __('No forms available') }}</td>
            </tr>
        @endforelse
        </tbody>
    </table>

    <!-- Pagination links -->
    <div class="d-flex justify-content-center">
        {{ $records->links() }}
    </div>
</div>
</x-app-layout>
