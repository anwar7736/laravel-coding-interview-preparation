<?php

namespace App\Modules\Product\Models;

use App\Enums\Status;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Size extends Model
{
    use SoftDeletes, HasFactory;
    protected $guarded = ['id'];

    public function products()
    {
        return $this->hasMany(ProductStock::class, 'size_id');
    }

    public function scopeActive($query, $status = Status::ACTIVE){
        return $query->where('status', $status);
    }
    public static function forDropdown(){
        return self::active()->pluck('name', 'id')->toArray();
    }

}
