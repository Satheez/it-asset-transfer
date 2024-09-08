<?php

namespace App\Models;

use App\Models\Base\Model;
use App\Models\Base\HasUuid;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ItTransferAsset extends Model
{
    use HasUuid;
    use HasFactory;

    protected $fillable = [
        'it_transfer_id',
        'serial_number',
        'asset_tag',
        'item_description',
        'assigned_to',
    ];

    public function itTransfer(): BelongsTo
    {
        return $this->belongsTo(ItTransfer::class, 'it_transfer_id');
    }
}
