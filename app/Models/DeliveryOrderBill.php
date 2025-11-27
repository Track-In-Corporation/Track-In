<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DeliveryOrderBill extends Model
{
    //

    protected $fillable = ['created_at', 'delivery_address', 'transaction_id'];

    public function transactions(){
      return $this->belongsTo(Transaction::class, 'transaction_id', 'id');
    }
}
