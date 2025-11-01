<?php

namespace App\Modules\Product\Models;

use App\Enums\Status;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Warranty extends Model
{
    use SoftDeletes, HasFactory;
    protected $guarded = ['id'];

    public function getType($type)
    {
        return match($type){
            0 => 'Days',
            1 => 'Months',
            default => 'Days',
        };
    }

    public function products()
    {
        return $this->hasMany(Product::class, 'warranty_id');
    }

    public function scopeActive($query, $status = Status::ACTIVE){
        return $query->where('status', $status);
    }
    public static function forDropdown(){
        return self::active()->pluck('name', 'id')->toArray();
    }
}
