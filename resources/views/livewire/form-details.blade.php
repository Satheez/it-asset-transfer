@push('styles')
    <style>
        .signature-pad {
            position: relative;
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-orient: vertical;
            -webkit-box-direction: normal;
            -ms-flex-direction: column;
            flex-direction: column;
            font-size: 10px;
            width: 100%;
            height: 100%;
            max-width: 700px;
            max-height: 460px;
            border: 1px solid #e8e8e8;
            background-color: #fff;
            box-shadow: 0 1px 4px rgba(0, 0, 0, 0.27), 0 0 40px rgba(0, 0, 0, 0.08) inset;
            border-radius: 4px;
            /*padding: 16px;*/
        }
    </style>
@endpush

<div class="card">
    <div class="card-header">
        <h3>{{ $formId ? __('Edit IT Asset Transfer Form') : __('Create IT Asset Transfer Form') }}</h3>
    </div>
    <div class="card-body">
        <form wire:submit.prevent="save">

            <h4>{{ __('From') }}</h4>
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="from_admin_name" class="form-label">{{ __('Admin Name') }}</label>
                    <input type="text" wire:model="form.from_admin_name" class="form-control" required>
                </div>
                <div class="col-md-6">
                    <label for="from_admin_mail_id" class="form-label">{{ __('Admin Mail ID') }}</label>
                    <input type="email" wire:model="form.from_admin_mail_id" class="form-control" required>
                </div>
                <div class="col-md-6">
                    <label for="from_signature" class="form-label">{{ __('Signature') }}</label>
                    <div id="from_signature_pad" class="signature-pad"></div>
                    <input type="hidden" wire:model="form.from_signature" id="from_signature">
                </div>
                <div class="col-md-6">
                    <label for="from_site_in_charge_name" class="form-label">{{ __('Site in Charge Name') }}</label>
                    <input type="text" wire:model="form.from_site_in_charge_name" class="form-control" required>
                </div>
                <div class="col-md-6">
                    <label for="from_site_in_charge_signature" class="form-label">{{ __('Signature') }}</label>
{{--                    <div id="from_site_in_charge_signature_pad" class="signature-pad"></div>--}}
                    <input type="hidden" wire:model="form.from_site_in_charge_signature"
                           id="from_site_in_charge_signature">
                </div>
            </div>

            <h4>{{ __('To') }}</h4>
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="to_admin_name" class="form-label">{{ __('Admin Name') }}</label>
                    <input type="text" wire:model="form.to_admin_name" class="form-control" required>
                </div>
                <div class="col-md-6">
                    <label for="to_admin_mail_id" class="form-label">{{ __('Admin Mail ID') }}</label>
                    <input type="email" wire:model="form.to_admin_mail_id" class="form-control" required>
                </div>
                <div class="col-md-6">
                    <label for="to_signature" class="form-label">{{ __('Signature') }}</label>
                    <div id="to_signature_pad" class="signature-pad"></div>
                    <input type="hidden" wire:model="form.to_signature" id="to_signature">
                </div>
                <div class="col-md-6">
                    <label for="to_site_in_charge_name" class="form-label">{{ __('Site in Charge Name') }}</label>
                    <input type="text" wire:model="form.to_site_in_charge_name" class="form-control" required>
                </div>
                <div class="col-md-6">
                    <label for="to_site_in_charge_signature" class="form-label">{{ __('Signature') }}</label>
{{--                    <div id="to_site_in_charge_signature_pad" class="signature-pad"></div>--}}
                    <input type="hidden" wire:model="form.to_site_in_charge_signature"
                           id="to_site_in_charge_signature">
                </div>
            </div>

            <h4>{{ __('Approved By IT Department') }}</h4>
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="approved_by_name" class="form-label">{{ __('Admin Name') }}</label>
                    <input type="text" wire:model="form.approved_by_name" class="form-control" required>
                </div>
                <div class="col-md-6">
                    <label for="to_signature" class="form-label">{{ __('Signature') }}</label>
                    <div id="approved_by_signature" class="signature-pad"
                         style="border: 1px solid #000; width: 100%; height: 70px;">

                        <div id="signature-pad" class="signature-pad">
                            <div id="canvas-wrapper" class="signature-pad--body">
                                <canvas style="border: 1px solid #000; width: 100%; height: 70px;"></canvas>
                            </div>
                        </div>

                    </div>
                    <input type="hidden" wire:model="form.approved_by_signature" id="approved_by_signature">
                </div>
            </div>

            <h4>{{ __('IT Asset Details') }}</h4>
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>{{ __('Serial Number') }}</th>
                    <th>{{ __('Asset Tag') }}</th>
                    <th>{{ __('Detail Item Description') }}</th>
                    <th>{{ __('Assigned To') }}</th>
                    <th>{{ __('Action') }}</th>
                </tr>
                </thead>
                <tbody>
                @foreach($assets as $index => $asset)
                    <tr>
                        <input type="hidden" wire:model="assets.{{ $index }}.id">
                        <td>
                            <input type="text" wire:model="assets.{{ $index }}.serial_number"
                                   class="form-control" required placeholder="{{ __('Enter Serial Number') }}">
                        </td>
                        <td>
                            <input type="text" wire:model="assets.{{ $index }}.asset_tag"
                                   class="form-control" required placeholder="{{ __('Enter Asset Tag') }}">
                        </td>
                        <td>
                            <input type="text" wire:model="assets.{{ $index }}.item_description"
                                   class="form-control" required placeholder="{{ __('Enter Item Description') }}">
                        </td>
                        <td>
                            <input type="text" wire:model="assets.{{ $index }}.assigned_to"
                                   class="form-control" required placeholder="{{ __('Enter Assigned Person') }}">
                        </td>
                        <td>
                            <button type="button" wire:click="removeAsset({{ $index }})"
                                    class="btn btn-danger">{{ __('Remove') }}</button>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <button type="button" wire:click="addAsset" class="btn btn-secondary">{{ __('Add Asset') }}</button>

            <div class="mt-3">
                <button type="submit" class="btn btn-primary">{{ __('Save') }}</button>
            </div>
        </form>
    </div>
</div>

@push('scripts')
    <!-- Include Signature Pad JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/signature_pad@4.1.7/dist/signature_pad.umd.min.js"></script>

    <script>
        // document.addEventListener('livewire:load', function () {
        document.addEventListener('DOMContentLoaded', function () {
            const wrapper = document.getElementById("signature-pad");
            let undoData = [];
            const canvas = wrapper.querySelector("canvas");
            const signaturePad = new SignaturePad(canvas, {
                // It's Necessary to use an opaque color when saving image as JPEG;
                // this option can be omitted if only saving as PNG or SVG
                backgroundColor: 'rgb(255, 255, 255)'
            });


// Adjust canvas coordinate space taking into account pixel ratio,
// to make it look crisp on mobile devices.
// This also causes canvas to be cleared.
            function resizeCanvas() {
                // When zoomed out to less than 100%, for some very strange reason,
                // some browsers report devicePixelRatio as less than 1
                // and only part of the canvas is cleared then.
                const ratio = Math.max(window.devicePixelRatio || 1, 1);

                // This part causes the canvas to be cleared
                canvas.width = canvas.offsetWidth * ratio;
                canvas.height = canvas.offsetHeight * ratio;
                canvas.getContext("2d").scale(ratio, ratio);

                // This library does not listen for canvas changes, so after the canvas is automatically
                // cleared by the browser, SignaturePad#isEmpty might still return false, even though the
                // canvas looks empty, because the internal data of this library wasn't cleared. To make sure
                // that the state of this library is consistent with visual state of the canvas, you
                // have to clear it manually.
                //signaturePad.clear();

                // If you want to keep the drawing on resize instead of clearing it you can reset the data.
                signaturePad.fromData(signaturePad.toData());
            }

// On mobile devices it might make more sense to listen to orientation change,
// rather than window resize events.
            window.onresize = resizeCanvas;
            resizeCanvas();

            // window.addEventListener("keydown", (event) => {
            //     switch (true) {
            //         case event.key === "z" && event.ctrlKey:
            //             undoButton.click();
            //             break;
            //         case event.key === "y" && event.ctrlKey:
            //             redoButton.click();
            //             break;
            //     }
            // });


// One could simply use Canvas#toBlob method instead, but it's just to show
// that it can be done using result of SignaturePad#toDataURL.
            function dataURLToBlob(dataURL) {
                // Code taken from https://github.com/ebidel/filer.js
                const parts = dataURL.split(';base64,');
                const contentType = parts[0].split(":")[1];
                const raw = window.atob(parts[1]);
                const rawLength = raw.length;
                const uInt8Array = new Uint8Array(rawLength);

                for (let i = 0; i < rawLength; ++i) {
                    uInt8Array[i] = raw.charCodeAt(i);
                }

                return new Blob([uInt8Array], {type: contentType});
            }

            signaturePad.addEventListener("endStroke", () => {
                // clear undoData when new data is added
                undoData = [];
            });

            // clearButton.addEventListener("click", () => {
            //     signaturePad.clear();
            // });
            //
            // undoButton.addEventListener("click", () => {
            //     const data = signaturePad.toData();
            //
            //     if (data && data.length > 0) {
            //         // remove the last dot or line
            //         const removed = data.pop();
            //         undoData.push(removed);
            //         signaturePad.fromData(data);
            //     }
            // });
            //
            // redoButton.addEventListener("click", () => {
            //     if (undoData.length > 0) {
            //         const data = signaturePad.toData();
            //         data.push(undoData.pop());
            //         signaturePad.fromData(data);
            //     }
            // });

        });
    </script>
@endpush
