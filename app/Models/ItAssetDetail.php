<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ItAssetDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'form_id',
        'serial_number',
        'asset_tag',
        'item_description',
        'assigned_to',
    ];

    public function formDetail()
    {
        return $this->belongsTo(FormDetail::class, 'form_id');
    }
}