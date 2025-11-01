<?php

namespace App\Modules\Product\Models;

use App\Enums\Status;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use SoftDeletes, HasFactory;
    protected $guarded = ['id'];

    public function slug()
    {
        return $this->morphOne(Slug::class, 'sluggable');
    }

    public function products()
    {
        return $this->belongsToMany(Product::class, 'category_product');
    }

    public function parent()
    {
        return $this->belongsTo(Category::class, 'parent_id');
    }

    public function scopeActive($query, $status = Status::ACTIVE){
        return $query->where('status', $status);
    }

    public static function forDropdown(){
        return self::active()->pluck('name', 'id')->toArray();
    }
}
