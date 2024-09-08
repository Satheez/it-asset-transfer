<?php

namespace App\Models\Base;

use Illuminate\Support\Facades\Auth;

class Model extends \Illuminate\Database\Eloquent\Model
{
    // Automatically add created_by and updated_by fields during save events
    protected static function boot()
    {
        parent::boot();

        // Set created_by when a new model is created
        static::creating(function ($model) {
            if (Auth::check()) {
                $model->created_by = Auth::id();
                $model->updated_by = Auth::id();
            }
        });

        // Set updated_by when a model is updated
        static::updating(function ($model) {
            if (Auth::check()) {
                $model->updated_by = Auth::id();
            }
        });
    }
}
