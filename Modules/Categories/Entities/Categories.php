<?php

namespace Modules\Categories\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use  Modules\Products\Entities\Product;

class Categories extends Model
{
    use HasFactory;
    protected $table = 'categories';
    protected $fillable = [
        'name',
        'slug',
        'meta_title',
        'description',
        'image',
        'meta_description',
        'meta_keyword',
        'status',

    ];
    public function products(){
        
        return $this->hasMany(Product::class,'category_id','id');
    }
    protected static function newFactory()
    {
        return \Modules\Categories\Database\factories\CategoriesFactory::new();
    }
}
