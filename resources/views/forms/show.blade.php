@extends('layouts.layout')

@section('content')
<div class="card">
    <div class="card-header">
        <h3>IT Asset Transfer Form Details</h3>
    </div>
    <div class="card-body">
        <h4>From</h4>
        <div class="row mb-3">
            <div class="col-md-6">
                <strong>Admin Name:</strong> {{ $form->from_admin_name }}
            </div>
            <div class="col-md-6">
                <strong>Admin Mail ID:</strong> {{ $form->from_admin_mail_id }}
            </div>
            <div class="col-md-6">
                <strong>Site in Charge Name:</strong> {{ $form->from_site_in_charge_name }}
            </div>
        </div>

        <h4>To</h4>
        <div class="row mb-3">
            <div class="col-md-6">
                <strong>Admin Name:</strong> {{ $form->to_admin_name }}
            </div>
            <div class="col-md-6">
                <strong>Admin Mail ID:</strong> {{ $form->to_admin_mail_id }}
            </div>
            <div class="col-md-6">
                <strong>Site in Charge Name:</strong> {{ $form->to_site_in_charge_name }}
            </div>
        </div>

        <h4>Approved By IT Department</h4>
        <div class="row mb-3">
            <div class="col-md-6">
                <strong>Name:</strong> {{ $form->approved_by_name }}
            </div>
        </div>

        <h4>IT Asset Details</h4>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Serial Number</th>
                    <th>Katerra Asset Tag</th>
                    <th>Detail Item Description</th>
                    <th>Assigned to</th>
                </tr>
            </thead>
            <tbody>
                @foreach($form->itAssets as $asset)
                <tr>
                    <td>{{ $asset->serial_number }}</td>
                    <td>{{ $asset->asset_tag }}</td>
                    <td>{{ $asset->item_description }}</td>
                    <td>{{ $asset->assigned_to }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <div class="mt-3">
            <a href="{{ route('forms.index') }}" class="btn btn-secondary">Back</a>
        </div>
    </div>
</div>
@endsection