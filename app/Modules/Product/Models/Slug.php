<?php

namespace App\Modules\Product\Models;

use Illuminate\Database\Eloquent\Model;

class Slug extends Model
{
    protected $guarded = ['id'];

    public static function generateSlug($string)
    {
        $slug = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $string)));
        return $slug;
    }

    public function sluggable()
    {
        return $this->morphTo();
    }
}
