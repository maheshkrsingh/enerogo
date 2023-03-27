<?php

namespace Modules\Brands\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Brand extends Model
{   
    use HasFactory;
    protected $table = 'brands';
    protected $fillable = ['name','slug','status'];
    
    protected static function newFactory()
    {
        return \Modules\Brands\Database\factories\BrandFactory::new();
    }
}
