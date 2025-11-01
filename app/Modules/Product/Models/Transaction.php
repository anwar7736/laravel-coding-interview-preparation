<?php

namespace App\Modules\Product\Models;

use App\Enums\Status;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Transaction extends Model
{
    use SoftDeletes, HasFactory;
    protected $guarded = ['id'];

    public function contact()
    {
        return $this->belongsTo(Contact::class);
    }

    public function payments()
    {
        return $this->hasMany(TransactionPayment::class);
    }

    public function details()
    {
        return $this->hasMany(TransactionLine::class);
    }

    public function scopeActive($query, $status = Status::ACTIVE)
    {
        return $query->where('status', $status);
    }

    public static function forDropdown()
    {
        return self::active()->pluck('name', 'id')->toArray();
    }
}
