<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    protected $primaryKey = 'id'; // LLave primaria
    protected $fillable = ['amount_products', 'total', 'client_id', 'product_id'];
    
    /**
     * Get the user that owns the Sale
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function client()
    {
        return $this->belongsTo(Client::class, 'client_id', 'id');
    }
    /**
     * Get the user that owns the Sale
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function product() 
    {
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }


}
