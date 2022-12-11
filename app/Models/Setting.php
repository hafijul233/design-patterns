<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{

    protected $casts = ['enabled' => 'boolean'];

    public function scopeEnabled(Builder $query)
    {
        return $query->where('enabled', '=', true);
    }
}
