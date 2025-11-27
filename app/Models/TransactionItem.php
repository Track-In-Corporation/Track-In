<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TransactionItem extends Model
{
    //

    protected $fillable = ['product_code', 'trasaction_id'];

    public function transaction(){
      return $this->belongsTo(Transaction::class, 'transaction_id', 'id');
    }

    public function products(){
      return $this->belongsTo(Product::class, 'product_code', 'id');
    }
}
