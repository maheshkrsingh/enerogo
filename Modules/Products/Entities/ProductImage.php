<?php

namespace Modules\Products\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Products\Entities\Product;

class ProductImage extends Model
{
    use HasFactory;
    protected $table = 'product_images';
    protected $fillable = ['product_id','image'];
    
    public function product(){
        
      return $this->belongsTo(Product::class,'product_id','id');
    }
    protected static function newFactory()
    {
        return \Modules\Products\Database\factories\ProductImageFactory::new();
    }
}
