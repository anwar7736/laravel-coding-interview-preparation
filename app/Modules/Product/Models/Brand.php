<?php

namespace App\Modules\Product\Models;

use App\Enums\Status;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Brand extends Model
{
    use SoftDeletes, HasFactory;
    protected $guarded = ['id'];

    public function slug()
    {
        return $this->morphOne(Slug::class, 'sluggable');
    }

    public function products()
    {
        return $this->hasMany(Product::class, 'brand_id');
    }

    public function scopeActive($query, $status = Status::ACTIVE){
        return $query->where('status', $status);
    }

    public static function forDropdown(){
        return self::active()->pluck('name', 'id')->toArray();
    }
    
}
