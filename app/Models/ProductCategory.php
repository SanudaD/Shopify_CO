<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductCategory extends Model
{
    use HasFactory;

    protected $table = 'table_categories';

    protected $primaryKey = 'id';

    protected $fillable = ['category_name', 'product_category_code'];
    
    public function products()
    {
        return $this->hasMany(Product::class, 'product_category_code');
    }
    
}
