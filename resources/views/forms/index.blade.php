{{--@extends('layouts.layout')--}}

{{--@section('content')--}}
{{--<div class="card">--}}
{{--    <div class="card-header d-flex justify-content-between align-items-center">--}}
{{--        <h3>IT Asset Transfer Forms</h3>--}}
{{--        <a href="{{ route('forms.create') }}" class="btn btn-primary">Create New Form</a>--}}
{{--    </div>--}}
{{--    <div class="card-body">--}}
{{--        @if ($forms->count())--}}
{{--            <table class="table table-bordered">--}}
{{--                <thead>--}}
{{--                    <tr>--}}
{{--                        <th>ID</th>--}}
{{--                        <th>From Admin Name</th>--}}
{{--                        <th>To Admin Name</th>--}}
{{--                        <th>Approved By</th>--}}
{{--                        <th>Created At</th>--}}
{{--                        <th>Actions</th>--}}
{{--                    </tr>--}}
{{--                </thead>--}}
{{--                <tbody>--}}
{{--                    @foreach ($forms as $form)--}}
{{--                    <tr>--}}
{{--                        <td>{{ $form->id }}</td>--}}
{{--                        <td>{{ $form->from_admin_name }}</td>--}}
{{--                        <td>{{ $form->to_admin_name }}</td>--}}
{{--                        <td>{{ $form->approved_by_name }}</td>--}}
{{--                        <td>{{ $form->created_at->format('d-m-Y') }}</td>--}}
{{--                        <td>--}}
{{--                            <a href="{{ route('forms.show', $form->id) }}" class="btn btn-info btn-sm">View</a>--}}
{{--                        </td>--}}
{{--                    </tr>--}}
{{--                    @endforeach--}}
{{--                </tbody>--}}
{{--            </table>--}}

{{--            <!-- Pagination Links -->--}}
{{--            <div class="d-flex justify-content-center">--}}
{{--                {{ $forms->links() }}--}}
{{--            </div>--}}
{{--        @else--}}
{{--            <p>No forms available.</p>--}}
{{--        @endif--}}
{{--    </div>--}}
{{--</div>--}}
{{--@endsection--}}
