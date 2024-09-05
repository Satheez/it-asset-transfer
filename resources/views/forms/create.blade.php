{{--@extends('layouts.layout')--}}

{{--@section('content')--}}
{{--<div class="card">--}}
{{--    <div class="card-header">--}}
{{--        <h3>Create IT Asset Transfer Form</h3>--}}
{{--    </div>--}}
{{--    <div class="card-body">--}}
{{--        <form action="{{ route('forms.store') }}" method="POST" enctype="multipart/form-data">--}}
{{--            @csrf--}}

{{--            <h4>From</h4>--}}
{{--            <div class="row mb-3">--}}
{{--                <div class="col-md-6">--}}
{{--                    <label for="from_admin_name" class="form-label">Admin Name</label>--}}
{{--                    <input type="text" name="from_admin_name" class="form-control" required>--}}
{{--                </div>--}}
{{--                <div class="col-md-6">--}}
{{--                    <label for="from_admin_mail_id" class="form-label">Admin Mail ID</label>--}}
{{--                    <input type="email" name="from_admin_mail_id" class="form-control" required>--}}
{{--                </div>--}}
{{--                <div class="col-md-6">--}}
{{--                    <label for="from_signature" class="form-label">Signature</label>--}}
{{--                    <input type="file" name="from_signature" class="form-control">--}}
{{--                </div>--}}
{{--                <div class="col-md-6">--}}
{{--                    <label for="from_site_in_charge_name" class="form-label">Site in Charge Name</label>--}}
{{--                    <input type="text" name="from_site_in_charge_name" class="form-control" required>--}}
{{--                </div>--}}
{{--                <div class="col-md-6">--}}
{{--                    <label for="from_site_in_charge_signature" class="form-label">Site in Charge Signature</label>--}}
{{--                    <input type="file" name="from_site_in_charge_signature" class="form-control">--}}
{{--                </div>--}}
{{--            </div>--}}

{{--            <h4>To</h4>--}}
{{--            <div class="row mb-3">--}}
{{--                <div class="col-md-6">--}}
{{--                    <label for="to_admin_name" class="form-label">Admin Name</label>--}}
{{--                    <input type="text" name="to_admin_name" class="form-control" required>--}}
{{--                </div>--}}
{{--                <div class="col-md-6">--}}
{{--                    <label for="to_admin_mail_id" class="form-label">Admin Mail ID</label>--}}
{{--                    <input type="email" name="to_admin_mail_id" class="form-control" required>--}}
{{--                </div>--}}
{{--                <div class="col-md-6">--}}
{{--                    <label for="to_signature" class="form-label">Signature</label>--}}
{{--                    <input type="file" name="to_signature" class="form-control">--}}
{{--                </div>--}}
{{--                <div class="col-md-6">--}}
{{--                    <label for="to_site_in_charge_name" class="form-label">Site in Charge Name</label>--}}
{{--                    <input type="text" name="to_site_in_charge_name" class="form-control" required>--}}
{{--                </div>--}}
{{--                <div class="col-md-6">--}}
{{--                    <label for="to_site_in_charge_signature" class="form-label">Site in Charge Signature</label>--}}
{{--                    <input type="file" name="to_site_in_charge_signature" class="form-control">--}}
{{--                </div>--}}
{{--            </div>--}}

{{--            <h4>Approved By IT Department</h4>--}}
{{--            <div class="row mb-3">--}}
{{--                <div class="col-md-6">--}}
{{--                    <label for="approved_by_name" class="form-label">Name</label>--}}
{{--                    <input type="text" name="approved_by_name" class="form-control" required>--}}
{{--                </div>--}}
{{--                <div class="col-md-6">--}}
{{--                    <label for="approved_by_signature" class="form-label">Signature</label>--}}
{{--                    <input type="file" name="approved_by_signature" class="form-control">--}}
{{--                </div>--}}
{{--            </div>--}}

{{--            <h4>IT Asset Details</h4>--}}
{{--            <!-- You can add a table or dynamic fields here for IT asset details -->--}}
{{--            <table class="table table-bordered">--}}
{{--                <thead>--}}
{{--                    <tr>--}}
{{--                        <th>Serial Number</th>--}}
{{--                        <th>Katerra Asset Tag</th>--}}
{{--                        <th>Detail Item Description</th>--}}
{{--                        <th>Assigned To</th>--}}
{{--                        <th>Action</th>--}}
{{--                    </tr>--}}
{{--                </thead>--}}
{{--                <tbody id="asset-rows">--}}
{{--                    <tr>--}}
{{--                        <td><input type="text" name="assets[0][serial_number]" class="form-control" required></td>--}}
{{--                        <td><input type="text" name="assets[0][asset_tag]" class="form-control" required></td>--}}
{{--                        <td><input type="text" name="assets[0][item_description]" class="form-control" required></td>--}}
{{--                        <td><input type="text" name="assets[0][assigned_to]" class="form-control" required></td>--}}
{{--                        <td><button type="button" class="btn btn-danger remove-row">Remove</button></td>--}}
{{--                    </tr>--}}
{{--                </tbody>--}}
{{--            </table>--}}
{{--            <button type="button" id="add-row" class="btn btn-secondary">Add Asset</button>--}}

{{--            <div class="mb-3">--}}
{{--                <button type="submit" class="btn btn-primary">Submit</button>--}}
{{--            </div>--}}
{{--        </form>--}}
{{--    </div>--}}
{{--</div>--}}
{{--@endsection--}}

{{--@section('scripts')--}}
{{--<script>--}}
{{--    let rowIndex = 1;--}}
{{--    document.getElementById('add-row').addEventListener('click', function () {--}}
{{--        const table = document.getElementById('asset-rows');--}}
{{--        const newRow = `--}}
{{--            <tr>--}}
{{--                <td><input type="text" name="assets[${rowIndex}][serial_number]" class="form-control" required></td>--}}
{{--                <td><input type="text" name="assets[${rowIndex}][asset_tag]" class="form-control" required></td>--}}
{{--                <td><input type="text" name="assets[${rowIndex}][item_description]" class="form-control" required></td>--}}
{{--                <td><input type="text" name="assets[${rowIndex}][assigned_to]" class="form-control" required></td>--}}
{{--                <td><button type="button" class="btn btn-danger remove-row">Remove</button></td>--}}
{{--            </tr>`;--}}
{{--        table.insertAdjacentHTML('beforeend', newRow);--}}
{{--        rowIndex++;--}}
{{--    });--}}

{{--    document.addEventListener('click', function (e) {--}}
{{--        if (e.target.classList.contains('remove-row')) {--}}
{{--            e.target.closest('tr').remove();--}}
{{--        }--}}
{{--    });--}}
{{--</script>--}}
{{--@endsection--}}
