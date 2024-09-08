<?php

namespace App\Livewire\Forms;

use Carbon\Carbon;
use Livewire\Component;
use App\Models\ItTransfer;
use Livewire\WithFileUploads;
use App\Models\AssetReference;
use App\Events\ItTransferRecordCreated;

class ItTransferForm extends Component
{
    use WithFileUploads;

    public $formId;

    public array $form = [];
    public array $assets = [];
    public $newAsset = [
        'serial_number' => '',
        'asset_tag' => '',
        'item_description' => '',
        'assigned_to' => '',
    ];

    public $signatureFields = [
        'from_signature',
        'to_signature',
        'from_site_in_charge_signature',
        'to_site_in_charge_signature',
        'approved_by_signature',
    ];

    protected $rules = [
        'form.from_admin_name' => 'required|string|max:255',
        'form.from_admin_mail_id' => 'required|email|max:255',
        'form.to_admin_name' => 'required|string|max:255',
        'form.to_admin_mail_id' => 'required|email|max:255',
        'form.approved_by_name' => 'required|string|max:255',
        'assets.*.serial_number' => 'required|string|max:255',
        'assets.*.asset_tag' => 'required|string|max:255',
        'assets.*.item_description' => 'required|string|max:255',
        'assets.*.assigned_to' => 'required|string|max:255',
    ];

    protected $listeners = ['removeAsset'];

    public array $serialNumberSuggestions = [];
    public array $assetTagSuggestions = [];

    public string $serialNumberInput = '';
    public string $assetTagInput = '';

    public function mount($formId = null): void
    {
        if ($formId) {
            //$formModel = ItTransfer::findOrFail($formId);
            $formModel = ItTransfer::whereUuid($formId)->firstOrFail();
            $this->form = $formModel->toArray();  // Convert model to array for Livewire binding
            $this->formId = $formId;
            $this->assets = $formModel->itAssets->toArray();
        } else {
            $this->form = [
                'from_admin_name' => '',
                'from_admin_mail_id' => '',
                'from_signature' => '',

                'from_site_in_charge_name' => '',
                'from_site_in_charge_signature' => '',

                'to_admin_name' => '',
                'to_admin_mail_id' => '',
                'to_signature' => '',
                'to_site_in_charge_name' => '',

                'approved_by_name' => '',
                'approved_by_signature' => '',

                'reviewed_by' => '',
                'review_date' => '',
            ];

            $this->assets[] = $this->newAsset;
        }
    }

    public function index()
    {
        // Fetch paginated FormDetail records
        $records = ItTransfer::paginate(10); // Adjust pagination limit as needed

        // Return view with the paginated records
        return view('livewire.it_transfers.index', compact('records'))->layout('layouts.app');
    }

    public function addAsset()
    {
        $this->assets[] = $this->newAsset;
        $this->newAsset = [
            'serial_number' => '',
            'asset_tag' => '',
            'item_description' => '',
            'assigned_to' => '',
        ];
    }

    public function save(): \Illuminate\Http\RedirectResponse|\Livewire\Features\SupportRedirects\Redirector
    {
        $this->validate();

        if (!empty($this->form['review_date'] ?? null)) {
            $this->form['review_date'] = Carbon::parse($this->form['review_date'])->format('Y-m-d H:i:s');
        } else {
            $this->form['review_date'] = null;
        }

        // Ensure the signatures are captured and saved as base64
//        if ($this->form['from_signature']) {
//            $this->form['from_signature'] = $this->fromSignaturePad->toDataURL();
//        }

        dd($this->form);

        if ($this->form['to_signature']) {
            $this->form['to_signature'] = $this->toSignaturePad->toDataURL();
        }

        if ($this->form['approved_by_signature']) {
            $this->form['approved_by_signature'] = $this->approvedBySignaturePad->toDataURL();
        }

        if ($this->formId) {
            //$formModel = ItTransfer::findOrFail($this->formId);
            $formModel = ItTransfer::whereUuid($this->formId)->firstOrFail();
            $formModel->update($this->form);  // Sync array back to the model
        } else {
            $formModel = ItTransfer::create($this->form);  // Create new model with array data
        }

        // Handle existing assets
        $existingAssetIds = $formModel->itAssets->pluck('id')->toArray();
        $newAssetIds = [];

        foreach ($this->assets as $asset) {
            if (isset($asset['id'])) {
                // Update existing asset
//                $formModel->itAssets()->where('id', $asset['id'])->update($asset);
//                $newAssetIds[] = $asset['id'];
            } else {
                // Create new asset
                $newAsset = $formModel->itAssets()->create($asset);
                $newAssetIds[] = $newAsset->id;
            }
        }

        // Delete removed assets
        $assetsToDelete = array_diff($existingAssetIds, $newAssetIds);
        $formModel->itAssets()->whereIn('id', $assetsToDelete)->delete();

        // Handle signatures and directly store the Base64 strings
        foreach ($this->signatureFields as $field) {
            if (isset($this->form[$field]) && is_string($this->form[$field])) {
                $formModel->$field = $this->form[$field]; // Store Base64 signature directly
            }
        }

        $formModel->save();

        if (!$this->formId) {
            // Fire the ItTransferRecordCreated event
            event(new ItTransferRecordCreated($this->form));
        }

        return redirect()->route('it-transfers.index');
    }

    public function render()
    {
        return view('livewire.it_transfers.form')->layout('layouts.app'); // Use Breeze's app.blade.php layout;
    }

    public function removeAsset($index)
    {
        unset($this->assets[$index]);
        $this->assets = array_values($this->assets); // Reindex array
    }

    // Other existing properties like $form, $assets, etc.

    public function updatedSerialNumberInput(): void
    {
        // Fetch matching serial numbers from the database
        $this->serialNumberSuggestions = $this->getSuggestions(AssetReference::TYPE_SERIAL_NUMBER, $this->serialNumberInput);
    }

    public function updatedAssetTagInput(): void
    {
        // Fetch matching asset tags from the database
        $this->assetTagSuggestions = $this->getSuggestions(AssetReference::TYPE_ASSET_TAG, $this->assetTagInput);
    }

    /**
     * Update serial number suggestions as the user types.
     */
    public function updatedAssets($value, $key): void
    {
        // Determine which asset row and field is being updated
        [$index, $field] = explode('.', $key);

        if ($field === 'serial_number') {
            $this->serialNumberSuggestions[$index] = $this->getSuggestions('serial_number', $value);
        } elseif ($field === 'asset_tag') {
            $this->assetTagSuggestions[$index] = $this->getSuggestions('asset_tag', $value);
        }
    }

    private function getSuggestions(string $type, string $input)
    {
        return AssetReference::ofType($type)
            ->where('value', 'like', "%$input%")
            ->take(10)
            ->pluck('value')
            ->toArray();
    }

    public function selectSerialNumber($index, string $serialNumber): void
    {
        $this->assets[$index]['serial_number'] = $serialNumber;
        $this->serialNumberSuggestions[$index] = []; // Clear suggestions
    }

    public function selectAssetTag($index, string $assetTag): void
    {
        $this->assets[$index]['asset_tag'] = $assetTag;
        $this->assetTagSuggestions[$index] = []; // Clear suggestions
    }
}
