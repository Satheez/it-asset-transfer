<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ItTransfer extends Model
{
    use HasFactory;

    protected $fillable = [
        'admin_name',
        'admin_mail_id',
        'signature',
        'site_in_charge_name',
        'site_in_charge_signature',
        'to_admin_name',
        'to_admin_mail_id',
        'to_signature',
        'to_site_in_charge_name',
        'to_site_in_charge_signature',
        'approved_by_name',
        'approved_by_signature',
        'reviewed_by',
        'review_date',
    ];

    public function itAssets(): HasMany
    {
        return $this->hasMany(ItTransferAsset::class, 'it_transfer_id');
    }
}
