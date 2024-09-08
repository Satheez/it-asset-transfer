<?php

namespace App\Models\Base;

use Illuminate\Support\Str;

trait HasUuid
{
    /**
     * Boot function from Laravel to automatically assign a UUID to the model.
     */
    protected static function bootHasUuid()
    {
        static::creating(function ($model) {
            if (empty($model->uuid)) {
                $model->uuid = Str::uuid()->toString();
            }
        });
    }

    /**
     * Find by UUID instead of ID.
     *
     * @param  string $uuid
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public static function findByUuid(string $uuid)
    {
        return static::where('uuid', $uuid)->first();
    }

    /**
     * Find by UUID or fail.
     *
     * @param  string $uuid
     * @return \Illuminate\Database\Eloquent\Model
     */
    public static function findByUuidOrFail(string $uuid)
    {
        return static::where('uuid', $uuid)->firstOrFail();
    }

    /**
     * Scope to query by UUID.
     *
     * @param  \Illuminate\Database\Eloquent\Builder $query
     * @param  string $uuid
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeWhereUuid($query, string $uuid)
    {
        return $query->where('uuid', $uuid);
    }
}
