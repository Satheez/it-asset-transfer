@extends('emails.layouts.base')

@section('title')
    {{ __('New IT Asset Transfer Form Created') }}
@endsection

@section('content')
    <h1>{{ __('New IT Asset Transfer Form Created') }}</h1>
    <p>
        {{ __('A new IT Asset Transfer Form has been created. Below are the details of the transfer:') }}
    </p>

    <table class="table">
        <tr>
            <th>{{ __('From Admin Name') }}</th>
            <td>{{ $fromAdminName }}</td>
        </tr>
        <tr>
            <th>{{ __('To Admin Name') }}</th>
            <td>{{ $toAdminName }}</td>
        </tr>
        <tr>
            <th>{{ __('Approved By') }}</th>
            <td>{{ $approvedBy }}</td>
        </tr>
    </table>

    <p>
        {{ __('Please review the form for further details or take action as necessary.') }}
    </p>

    <a href="{{ route('forms.index') }}" class="button">{{ __('View Forms') }}</a>

    <div class="footer">
        <p>
            {{ __('If you have any questions, feel free to contact us at :email.', ['email' => config('app.email', 'support@example.com')]) }}<br>
            {{ __(':app_name Team', ['app_name' => config('app.name')]) }}
        </p>
    </div>
@endsection
