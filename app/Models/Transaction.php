<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = ['recipient_name', 'recipient_address', 'user_id'];

    // Handles multi column search
    private $SEARCH_COLUMNS = ["id", "recipient_name", "status"];
    public function scopeSearch($query, $term) {
        $query->where(function($q) use ($term) {
            foreach($this->SEARCH_COLUMNS as $column) {
                $q->orWhere($column, "like", "%$term%");
            };
        });
    }

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