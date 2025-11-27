<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    //

    protected $fillable = ['created_at', 'transaction_id'];

    public function transaction(){
      return $this->belongsTo(Transaction::class, 'transaction_id', 'id');
    }
}
