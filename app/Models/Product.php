<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    //
    protected $fillable = ['price', 'quantity', 'brand', 'description', 'size', 'sch', 'hs_code', 'country_origin', 'material_family', 'sni_required', 'size_category', 'lartas_required', 'type'];

    public function transactionItems()
    {
        return $this->hasMany(TransactionItem::class, 'product_code', 'code');
    }
}
