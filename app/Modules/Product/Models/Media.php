<?php

namespace App\Modules\Product\Models;

use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
    protected $guarded = ['id'];

    public function mediable()
    {
        return $this->morphTo();
    }
}
