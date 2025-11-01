<?php

namespace App\Modules\Product\Models;

use Illuminate\Database\Eloquent\Model;

class Slug extends Model
{
    protected $guarded = ['id'];

    public function sluggable()
    {
        return $this->morphTo();
    }
}
