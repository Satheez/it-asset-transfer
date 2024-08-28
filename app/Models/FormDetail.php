<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FormDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'from_admin_name',
        'from_admin_mail_id',
        'from_signature',
        'from_site_in_charge_name',
        'from_site_in_charge_signature',
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

    public function itAssets()
    {
        return $this->hasMany(ItAssetDetail::class, 'form_id');
    }
}