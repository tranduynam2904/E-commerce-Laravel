<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class OrderPaymentMethod extends Model
{
    use HasFactory, SoftDeletes;
    const STATUS_PENDING = 'pending';
    const STATUS_SHIPPING = 'shipping';
    const STATUS_CANCEL = 'cancel';
    const STATUS_REFUND = 'refund';
    const STATUS_SUCCESS = 'success';
    const STATUS_FAILED = 'failed';
    protected $table = 'order_payment_methods';
    protected $fillable = [
        'order_id',
        'payment_provider',
        'status',
        'total',
        'note'
    ];
    public function order()
    {
        return $this->belongsTo(Order::class, 'order_id');
    }
}
