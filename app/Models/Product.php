<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $table = 'table_products';
    protected $fillable = [
        'code',
        'product_name',
        'product_price',
        'user_id',
        'image',
        'product_category_code' 
    ];
    public function category()
    {
        return $this->belongsTo(ProductCategory::class, 'product_category_code');
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
