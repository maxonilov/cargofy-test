<?php

namespace App\Modules\Route\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Route extends Model
{
    protected $fillable = ['from', 'to', 'date', 'load_id'];

    /**
     * @return HasOne
     */
    public function selectedLoad(): HasOne
    {
        return $this->hasOne(Load::class, 'id', 'load_id');
    }
}
