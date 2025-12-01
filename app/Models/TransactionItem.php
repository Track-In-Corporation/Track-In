<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransactionItem extends Model
{
    use HasFactory;
    protected $fillable = ['product_code', 'transaction_id', 'quantity', 'price'];

    public function transaction(){
      return $this->belongsTo(Transaction::class, 'transaction_id', 'id');
    }

    public function product(){
      return $this->belongsTo(Product::class, 'product_code', 'code');
    }
}
