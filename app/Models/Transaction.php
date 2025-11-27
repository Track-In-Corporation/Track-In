<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    //

    protected $fillable = ['recipient_name', 'recipient_address', 'user_id'];

    public function invoice()
    {
        return $this->hasOne(Invoice::class, 'transaction_id', 'id');
    }

    public function deliveryOrderBill()
    {
        return $this->hasOne(DeliveryOrderBill::class, 'transaction_id', 'id');
    }

    public function items()
    {
        return $this->hasMany(TransactionItem::class, 'transaction_id', 'id');
    }

    public function user(){
      return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
