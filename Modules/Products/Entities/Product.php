<?php

namespace Modules\Products\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Products\Entities\ProductImage;
use Modules\Products\Entities\ProductColor;
use Modules\Categories\Entities\Categories;
class Product extends Model
{
    use HasFactory;
    protected $table ='products';
    protected $fillable = [
        
               'category_id',
               'name',
               'slug',
               'brand',
               'small_description',
               'description',
               'original_price',
               'selling_price',
               'quantity',
               'trending',
               'status',
               'meta_title',
               'meta_description',
               'meta_keyword',

            ];
     public function productImages(){

        return $this->hasMany(ProductImage::class,'product_id','id');
     }
     public function ProductColors(){
      return $this->hasMany(ProductColor::class,'product_id','id');
     }
     public function category(){
        return $this->belongsTo(Categories::class,'category_id','id');
     }
    protected static function newFactory()
    {
        return \Modules\Products\Database\factories\ProductFactory::new();
    }
}
