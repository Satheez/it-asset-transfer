<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ItTransferAsset extends Model
{
    use HasFactory;

    protected $fillable = [
        'it_transfer_id',
        'serial_number',
        'asset_tag',
        'item_description',
        'assigned_to',
    ];

    public function formDetail(): BelongsTo
    {
        return $this->belongsTo(ItTransfer::class, 'it_transfer_id');
    }
}
