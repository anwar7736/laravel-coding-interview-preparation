<?php

namespace App\Modules\Product\Models;

use App\Enums\Status;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes, HasFactory;
    protected $guarded = ['id'];

    public function varations()
    {
        return $this->hasMany(Brand::class);
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    public function unit()
    {
        return $this->belongsTo(Unit::class);
    }

    public function warranty()
    {
        return $this->belongsTo(Warranty::class);
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'category_product');
    }

    public function slug()
    {
        return $this->morphOne(Slug::class, 'sluggable');
    }

    public function primaryImage()
    {
        return $this->morphOne(Media::class, 'mediable')
                    ->where([
                        'file_type' => 'image',
                        'is_primary' => 1
                    ]);
    }

    public function scopeActive($query, $status = Status::ACTIVE){
        return $query->where('status', $status);
    }

    public static function forDropdown(){
        return self::active()->pluck('name', 'id')->toArray();
    }
}
