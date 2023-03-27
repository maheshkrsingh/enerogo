<?php

namespace Modules\Products\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Products\Entities\Product;
use Modules\Colors\Entities\Color;

class ProductColor extends Model
{
    use HasFactory;
    protected $table = 'product_colors';
    protected $with = [
        'color'
    ];
    protected $fillable = ['product_id','color_id','quantity'];
    public function products()
    {
        return $this->belongsTo(Product::class,'product_id','id');
    }
    public function color()
    {
        return $this->belongsTo(Color::class,'color_id','id');
    }
    protected static function newFactory()
    {
        return \Modules\Products\Database\factories\ProductColorFactory::new();
    }
}
