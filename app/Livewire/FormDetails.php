<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\FormDetail;
use App\Models\ItAssetDetail;
use Livewire\WithFileUploads;

class FormDetails extends Component
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
        'from_signature', 'to_signature',
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

    public function mount($formId = null)
    {
        if ($formId) {
            $formModel = FormDetail::findOrFail($formId);
            $this->form = $formModel->toArray();  // Convert model to array for Livewire binding
            $this->formId = $formId;
            $this->assets = $formModel->itAssets->toArray();
        } else {
            $this->form = [
                'from_admin_name' => '',
                'from_admin_mail_id' => '',
                'to_admin_name' => '',
                'to_admin_mail_id' => '',
                'approved_by_name' => '',
                // Initialize other fields if necessary
            ];

            $this->assets[] = $this->newAsset;
        }
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

//    public function save()
//    {
//        $this->validate();
//
//        if ($this->formId) {
//            $formModel = FormDetail::findOrFail($this->formId);
//            $formModel->update($this->form);  // Sync array back to the model
//        } else {
//            $formModel = FormDetail::create($this->form);  // Create new model with array data
//        }
//
//        // Sync assets with the form
//        $formModel->itAssets()->delete();  // Clear old assets
//        foreach ($this->assets as $asset) {
//            $formModel->itAssets()->create($asset);
//        }
//
//        // Handle signatures
//        foreach ($this->signatureFields as $field) {
//            if (isset($this->form[$field]) && is_string($this->form[$field])) {
//                $formModel->$field = $this->saveSignature($this->form[$field], $field);
//            }
//        }
//
//        $formModel->save();
//
//        return redirect()->route('forms.index');
//    }

    public function save()
    {
        $this->validate();

        if ($this->formId) {
            $formModel = FormDetail::findOrFail($this->formId);
            $formModel->update($this->form);  // Sync array back to the model
        } else {
            $formModel = FormDetail::create($this->form);  // Create new model with array data
        }

        // Handle existing assets
        $existingAssetIds = $formModel->itAssets->pluck('id')->toArray();
        $newAssetIds = [];

        foreach ($this->assets as $asset) {
            if (isset($asset['id'])) {
                // Update existing asset
                $formModel->itAssets()->where('id', $asset['id'])->update($asset);
                $newAssetIds[] = $asset['id'];
            } else {
                // Create new asset
                $newAsset = $formModel->itAssets()->create($asset);
                $newAssetIds[] = $newAsset->id;
            }
        }

        // Delete removed assets
        $assetsToDelete = array_diff($existingAssetIds, $newAssetIds);
        $formModel->itAssets()->whereIn('id', $assetsToDelete)->delete();

        // Handle signatures
        foreach ($this->signatureFields as $field) {
            if (isset($this->form[$field]) && is_string($this->form[$field])) {
                $formModel->$field = $this->saveSignature($this->form[$field], $field);
            }
        }

        $formModel->save();

        return redirect()->route('forms.index');
    }

    private function saveSignature($signatureData, $fieldName)
    {
        $signatureImage = explode(",", $signatureData)[1];
        $signaturePath = 'signatures/'.uniqid().'.png';
        \Storage::disk('public')->put($signaturePath, base64_decode($signatureImage));

        return $signaturePath;
    }

    public function render()
    {
        return view('livewire.form-details');
    }

    public function removeAsset($index)
    {
        unset($this->assets[$index]);
        $this->assets = array_values($this->assets); // Reindex array
    }
}
