<div class="container mx-auto mt-4">
    <div class="bg-white shadow-md rounded-lg">
        <div class="bg-gray-100 px-4 py-2 border-b border-gray-300">
            <h3 class="text-lg font-semibold">{{ $formId ? __('Edit IT Asset Transfer Form') : __('Create IT Asset Transfer Form') }}</h3>
        </div>
        <div class="px-4 py-6">
            <form wire:submit.prevent="save">

                <!-- Box for "From" Section -->
                <div class="border border-gray-300 p-4 rounded-lg mb-6">
                    <h4 class="text-lg font-bold mb-4">{{ __('From') }}</h4>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
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
                        <div class="relative">
                            <label for="from_signature"
                                   class="block text-sm font-medium text-gray-700">{{ __('Signature') }}</label>
                            <canvas id="from_signature_canvas" class="border border-gray-300 rounded-md"></canvas>
                            <input type="hidden" wire:model="form.from_signature" id="from_signature">
                            <!-- Floating Reset Button -->
                            <button type="button" onclick="clearSignaturePad('from_signature_canvas', 'from_signature')"
                                    class="absolute bottom-1 right-1 bg-red-500 text-white px-2 py-1 rounded-md text-xs">
                                {{ __('Reset') }}
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Box for "To" Section -->
                <div class="border border-gray-300 p-4 rounded-lg mb-6">
                    <h4 class="text-lg font-bold mb-4">{{ __('To') }}</h4>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
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
                        <div class="relative">
                            <label for="to_signature"
                                   class="block text-sm font-medium text-gray-700">{{ __('Signature') }}</label>
                            <canvas id="to_signature_canvas" class="border border-gray-300 rounded-md"></canvas>
                            <input type="hidden" wire:model="form.to_signature" id="to_signature">
                            <!-- Floating Reset Button -->
                            <button type="button" onclick="clearSignaturePad('to_signature_canvas', 'to_signature')"
                                    class="absolute bottom-1 right-1 bg-red-500 text-white px-2 py-1 rounded-md text-xs">
                                {{ __('Reset') }}
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Box for "Approved By IT" Section -->
                <div class="border border-gray-300 p-4 rounded-lg mb-6">
                    <h4 class="text-lg font-bold mb-4">{{ __('Approved By IT Department') }}</h4>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label for="approved_by_name"
                                   class="block text-sm font-medium text-gray-700">{{ __('Admin Name') }}</label>
                            <input type="text" wire:model="form.approved_by_name"
                                   class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
                                   required>
                        </div>
                        <div class="relative">
                            <label for="approved_by_signature"
                                   class="block text-sm font-medium text-gray-700">{{ __('Signature') }}</label>
                            <canvas id="approved_by_signature_canvas"
                                    class="border border-gray-300 rounded-md"></canvas>
                            <input type="hidden" wire:model="form.approved_by_signature" id="approved_by_signature">
                            <!-- Floating Reset Button -->
                            <button type="button"
                                    onclick="clearSignaturePad('approved_by_signature_canvas', 'approved_by_signature')"
                                    class="absolute bottom-1 right-1 bg-red-500 text-white px-2 py-1 rounded-md text-xs">
                                {{ __('Reset') }}
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Box for "IT Asset Details" Section -->
                <div class="border border-gray-300 p-4 rounded-lg">
                    <h4 class="text-lg font-bold mb-4">{{ __('IT Asset Details') }}</h4>
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
                                </td>

                                <!-- Asset Tag Input with Suggestions -->
                                <td class="px-4 py-2 border border-gray-300">
                                    <input type="text" wire:model="assets.{{ $index }}.asset_tag"
                                           class="block w-full border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
                                           required placeholder="{{ __('Enter Asset Tag') }}">
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
    {{--    <style>--}}
    {{--        .signature-pad {--}}
    {{--            position: relative;--}}
    {{--            display: -webkit-box;--}}
    {{--            display: -ms-flexbox;--}}
    {{--            display: flex;--}}
    {{--            -webkit-box-orient: vertical;--}}
    {{--            -webkit-box-direction: normal;--}}
    {{--            -ms-flex-direction: column;--}}
    {{--            flex-direction: column;--}}
    {{--            font-size: 10px;--}}
    {{--            width: 100%;--}}
    {{--            height: 100%;--}}
    {{--            max-width: 700px;--}}
    {{--            max-height: 460px;--}}
    {{--            border: 1px solid #e8e8e8;--}}
    {{--            background-color: #fff;--}}
    {{--            box-shadow: 0 1px 4px rgba(0, 0, 0, 0.27), 0 0 40px rgba(0, 0, 0, 0.08) inset;--}}
    {{--            border-radius: 4px;--}}
    {{--            /*padding: 16px;*/--}}
    {{--        }--}}
    {{--    </style>--}}
@endpush
@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/signature_pad@4.1.7/dist/signature_pad.umd.min.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Initialize signature pads
            const fromSignaturePad = new SignaturePad(document.getElementById('from_signature_canvas'));
            const toSignaturePad = new SignaturePad(document.getElementById('to_signature_canvas'));
            const approvedBySignaturePad = new SignaturePad(document.getElementById('approved_by_signature_canvas'));

            // Function to set canvas size properly (small)
            function resizeCanvas(canvas) {
                canvas.width = 300;  // Adjust width here (300px)
                canvas.height = 100; // Adjust height here (100px)
                const ctx = canvas.getContext("2d");
                ctx.scale(1, 1);
            }

            // Resize canvases for all signature pads
            resizeCanvas(document.getElementById('from_signature_canvas'));
            resizeCanvas(document.getElementById('to_signature_canvas'));
            resizeCanvas(document.getElementById('approved_by_signature_canvas'));

            // Load existing signatures from DB if available
            if (@json($form['from_signature'])) {
                fromSignaturePad.fromDataURL(@json($form['from_signature']));
            }
            if (@json($form['to_signature'])) {
                toSignaturePad.fromDataURL(@json($form['to_signature']));
            }
            if (@json($form['approved_by_signature'])) {
                approvedBySignaturePad.fromDataURL(@json($form['approved_by_signature']));
            }

            // Save signatures when submitting form
            document.querySelector('form').addEventListener('submit', function () {
                document.getElementById('from_signature').value = fromSignaturePad.toDataURL();
                document.getElementById('to_signature').value = toSignaturePad.toDataURL();
                document.getElementById('approved_by_signature').value = approvedBySignaturePad.toDataURL();
            });

            // Function to clear signature pad and reset hidden input
            window.clearSignaturePad = function (canvasId, inputId) {
                const signaturePad = new SignaturePad(document.getElementById(canvasId));
                signaturePad.clear();
                document.getElementById(inputId).value = ''; // Clear the hidden input as well
            }
        });
    </script>
@endpush
