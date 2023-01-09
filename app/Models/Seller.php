<?php

namespace App\Models;

use App\Models\Product;
use App\Models\Checkout;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Seller extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'password',
        'no_whatsapp'
    ];

    /**
     * Get all of the product for the Seller
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function product()
    {
        return $this->hasMany(Product::class);
    }

    /**
     * Get the checkout that owns the Seller
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function checkout()
    {
        return $this->belongsTo(Checkout::class);
    }
}
