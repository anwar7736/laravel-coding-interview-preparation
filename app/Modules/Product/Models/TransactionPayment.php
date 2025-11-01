<?php

namespace App\Modules\Product\Models;

use App\Enums\Status;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TransactionPayment extends Model
{
    use SoftDeletes, HasFactory;
    protected $guarded = ['id'];

    public function transaction()
    {
        return $this->belongsTo(Transaction::class);
    }

    public function paymentMethod()
    {
        return $this->belongsTo(PaymentMethod::class);
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
