<?php

namespace Modules\Colors\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Color extends Model
{
    use HasFactory;
    protected $table ='colors';
    protected $fillable = ['color_name','color_code','status'];
   protected static function newFactory()
    {
        return \Modules\Colors\Database\factories\ColorFactory::new();
    }
}
