<?php

namespace App\Models;

use App\Models\Base\Model;
use App\Models\Base\HasUuid;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ItTransfer extends Model
{
    use HasUuid;
    use HasFactory;

    protected $fillable = [
        'from_admin_name',
        'from_admin_mail_id',
        'from_signature', // Base64 signature
        'from_site_in_charge_name',
        'from_site_in_charge_signature', // Base64 signature

        'to_admin_name',
        'to_admin_mail_id',
        'to_signature', // Base64 signature
        'to_site_in_charge_name',
        'to_site_in_charge_signature',

        'approved_by_name',
        'approved_by_signature', // Base64 signature

        'reviewed_by',
        'review_date',
    ];

    public function itAssets(): HasMany
    {
        return $this->hasMany(ItTransferAsset::class, 'it_transfer_id');
    }

    public function getRouteKeyName()
    {
        return 'uuid';
    }
}
