<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = ['code', 'price', 'quantity', 'brand', 'description', 'size', 'sch', 'hs_code', 'country_origin', 'material_family', 'sni_required', 'unit', 'lartas_required', 'type'];
    protected $primaryKey = 'code';
    public $incrementing = false;
    protected $keyType = 'string';

    // Handles multi column search
    private $SEARCH_COLUMNS = ["code", "brand", "description"];
    public function scopeSearch($query, $term) {
        $query->where(function($q) use ($term) {
            foreach($this->SEARCH_COLUMNS as $column) {
                $q->orWhere($column, "like", "%$term%");
            };
        });
    }

    public function transactionItems()
    {
        return $this->hasMany(TransactionItem::class, 'product_code', 'code');
    }
}
