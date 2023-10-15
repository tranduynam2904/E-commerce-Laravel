<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderPaymentMethod extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'order_payment_methods';

    public function order(){
        return $this->belongsTo(Order::class,'order_id');
    }
}
