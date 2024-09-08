<div class="container mx-auto mt-4">
    <div class="bg-white shadow-md rounded-lg">
        <div class="bg-gray-100 px-4 py-2 border-b border-gray-300">
            <h3 class="text-lg font-semibold">{{ $formId ? __('Edit IT Asset Transfer Form') : __('Create IT Asset Transfer Form') }}</h3>
        </div>
        <div class="px-4 py-6">
            <form wire:submit.prevent="save">
                <h4 class="text-lg font-bold mb-2">{{ __('From') }}</h4>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-6">
                    <div>
                        <label for="from_admin_name"
                               class="block text-sm font-medium text-gray-700">{{ __('Admin Name') }}</label>
                        <input type="text" wire:model="form.from_admin_name"
                               class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
                               required>
                    </div>
                    <div>
                        <label for="from_admin_mail_id"
                               class="block text-sm font-medium text-gray-700">{{ __('Admin Mail ID') }}</label>
                        <input type="email" wire:model="form.from_admin_mail_id"
                               class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
                               required>
                    </div>
                    <div>
                        <label for="from_signature"
                               class="block text-sm font-medium text-gray-700">{{ __('Signature') }}</label>
                        <div id="from_signature_pad" class="signature-pad border border-gray-300 h-20"></div>
                        <input type="hidden" wire:model="form.from_signature" id="from_signature">
                    </div>
                    <div>
                        <label for="from_site_in_charge_name"
                               class="block text-sm font-medium text-gray-700">{{ __('Site in Charge Name') }}</label>
                        <input type="text" wire:model="form.from_site_in_charge_name"
                               class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
                               required>
                    </div>
                    <div>
                        <label for="from_site_in_charge_signature"
                               class="block text-sm font-medium text-gray-700">{{ __('Signature') }}</label>
                        <input type="hidden" wire:model="form.from_site_in_charge_signature"
                               id="from_site_in_charge_signature">
                    </div>
                </div>

                <h4 class="text-lg font-bold mb-2">{{ __('To') }}</h4>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-6">
                    <div>
                        <label for="to_admin_name"
                               class="block text-sm font-medium text-gray-700">{{ __('Admin Name') }}</label>
                        <input type="text" wire:model="form.to_admin_name"
                               class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
                               required>
                    </div>
                    <div>
                        <label for="to_admin_mail_id"
                               class="block text-sm font-medium text-gray-700">{{ __('Admin Mail ID') }}</label>
                        <input type="email" wire:model="form.to_admin_mail_id"
                               class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
                               required>
                    </div>
                    <div>
                        <label for="to_signature"
                               class="block text-sm font-medium text-gray-700">{{ __('Signature') }}</label>
                        <div id="to_signature_pad" class="signature-pad border border-gray-300 h-20"></div>
                        <input type="hidden" wire:model="form.to_signature" id="to_signature">
                    </div>
                    <div>
                        <label for="to_site_in_charge_name"
                               class="block text-sm font-medium text-gray-700">{{ __('Site in Charge Name') }}</label>
                        <input type="text" wire:model="form.to_site_in_charge_name"
                               class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
                               required>
                    </div>
                    <div>
                        <label for="to_site_in_charge_signature"
                               class="block text-sm font-medium text-gray-700">{{ __('Signature') }}</label>
                        <input type="hidden" wire:model="form.to_site_in_charge_signature"
                               id="to_site_in_charge_signature">
                    </div>
                </div>

                <h4 class="text-lg font-bold mb-2">{{ __('Approved By IT Department') }}</h4>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-6">
                    <div>
                        <label for="approved_by_name"
                               class="block text-sm font-medium text-gray-700">{{ __('Admin Name') }}</label>
                        <input type="text" wire:model="form.approved_by_name"
                               class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
                               required>
                    </div>
                    <div>
                        <label for="approved_by_signature"
                               class="block text-sm font-medium text-gray-700">{{ __('Signature') }}</label>
                        <div id="approved_by_signature" class="signature-pad border border-gray-300 h-20"></div>
                        <input type="hidden" wire:model="form.approved_by_signature" id="approved_by_signature">
                    </div>
                </div>

                <div class="mt-8 mb-8">
                    <div class="mt-8 mb-8">
                        <hr>
                    </div>
                    <!-- IT Asset Details -->
                    <h4 class="text-lg font-bold mt-4 mb-4">{{ __('IT Asset Details') }}</h4>
                    <table class="w-full table-auto bg-white shadow-md rounded-lg border-collapse mt-4">

                        <thead class="bg-gray-50">
                        <tr>
                            <th class="px-4 py-2 border border-gray-300">{{ __('Serial Number') }}</th>
                            <th class="px-4 py-2 border border-gray-300">{{ __('Asset Tag') }}</th>
                            <th class="px-4 py-2 border border-gray-300">{{ __('Detail Item Description') }}</th>
                            <th class="px-4 py-2 border border-gray-300">{{ __('Assigned To') }}</th>
                            <th class="px-4 py-2 border border-gray-300">{{ __('Action') }}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($assets as $index => $asset)
                            <tr>
                                <input type="hidden" wire:model="assets.{{ $index }}.id">

                                <!-- Serial Number Input with Suggestions -->
                                <td class="px-4 py-2 border border-gray-300">
                                    <input type="text" wire:model="assets.{{ $index }}.serial_number"
                                           class="block w-full border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
                                           required placeholder="{{ __('Enter Serial Number') }}">
                                    @if(!empty($serialNumberSuggestions[$index]))
                                        <ul class="bg-white shadow-lg max-h-40 overflow-y-auto rounded-md mt-1">
                                            @foreach($serialNumberSuggestions[$index] as $suggestion)
                                                <li class="px-4 py-2 cursor-pointer hover:bg-gray-200"
                                                    wire:click="selectSerialNumber({{ $index }}, '{{ $suggestion }}')">
                                                    {{ $suggestion }}
                                                </li>
                                            @endforeach
                                        </ul>
                                    @endif
                                </td>

                                <!-- Asset Tag Input with Suggestions -->
                                <td class="px-4 py-2 border border-gray-300">
                                    <input type="text" wire:model="assets.{{ $index }}.asset_tag"
                                           class="block w-full border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
                                           required placeholder="{{ __('Enter Asset Tag') }}">
                                    @if(!empty($assetTagSuggestions[$index]))
                                        <ul class="bg-white shadow-lg max-h-40 overflow-y-auto rounded-md mt-1">
                                            @foreach($assetTagSuggestions[$index] as $suggestion)
                                                <li class="px-4 py-2 cursor-pointer hover:bg-gray-200"
                                                    wire:click="selectAssetTag({{ $index }}, '{{ $suggestion }}')">
                                                    {{ $suggestion }}
                                                </li>
                                            @endforeach
                                        </ul>
                                    @endif
                                </td>

                                <!-- Item Description -->
                                <td class="px-4 py-2 border border-gray-300">
                                    <input type="text" wire:model="assets.{{ $index }}.item_description"
                                           class="block w-full border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
                                           required placeholder="{{ __('Enter Item Description') }}">
                                </td>

                                <!-- Assigned To -->
                                <td class="px-4 py-2 border border-gray-300">
                                    <input type="text" wire:model="assets.{{ $index }}.assigned_to"
                                           class="block w-full border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
                                           required placeholder="{{ __('Enter Assigned Person') }}">
                                </td>

                                <!-- Remove Button -->
                                <td class="px-4 py-2 border border-gray-300">
                                    <div style="display: flex; justify-content: center;">
                                        <button type="button" wire:click="removeAsset({{ $index }})"
                                                style="background-color: #EF4444 !important; color: white !important; font-size: 0.875rem; padding: 0.25rem 0.75rem; border-radius: 0.375rem; border: none;">
                                            {{ __('Remove') }}
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>

                    <!-- Add Asset Button -->
                    <div class="mt-4 flex justify-end">
                        <button type="button" wire:click="addAsset"
                                class="bg-gray-500 text-white text-sm px-3 py-1 rounded-md hover:bg-gray-600">
                            {{ __('Add Asset') }}
                        </button>
                    </div>

                    <div class="mt-8 mb-8">
                        <hr>
                    </div>
                </div>

                <!-- Save Button without Parent Opacity -->
                <div class="mt-6 flex justify-end">
                    <button type="submit"
                            class="bg-blue-700 text-white px-6 py-2 rounded-md hover:bg-blue-800 dark:bg-blue-500 dark:hover:bg-blue-600"
                            style="background-color: #1D4ED8 !important;">
                        {{ __('Save') }}
                    </button>
                </div>


            </form>
        </div>
    </div>
</div>


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
        });
    </script>
@endpush

