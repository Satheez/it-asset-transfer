<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

final class AssetReference extends Model
{
    use HasFactory;
    use SoftDeletes;

    public const TYPE_SERIAL_NUMBER = 'serial_number';
    public const TYPE_ASSET_TAG = 'asset_tag';

    protected $fillable = ['type', 'value'];

    public function scopeOfType($query, $type)
    {
        return $query->where('type', $type);
    }

    public function scopeSerialNumber($query)
    {
        return $this->scopeOfType($query, self::TYPE_SERIAL_NUMBER);
    }

    public function scopeAssetTag($query)
    {
        return $this->scopeOfType($query, self::TYPE_ASSET_TAG);
    }
}
