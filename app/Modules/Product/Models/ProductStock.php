<?php

namespace App\Modules\Product\Models;

use App\Enums\Status;
use Illuminate\Database\Eloquent\Model;

class ProductStock extends Model
{
    protected $guarded = ['id'];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function storage()
    {
        return $this->belongsTo(Storage::class);
    }

    public function size()
    {
        return $this->belongsTo(Size::class);
    }

    public function color()
    {
        return $this->belongsTo(Color::class);
    }

    public function image()
    {
        return $this->morphOne(Media::class, 'mediable');
    }

    public function scopeActive($query, $status = Status::ACTIVE){
        return $query->where('status', $status);
    }
}
