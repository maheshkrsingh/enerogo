<?php

namespace Modules\Slider\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Slider extends Model
{
    use HasFactory;

    protected $fillable = ['title','description','img','status'];
    protected $table = 'sliders';
    public $timestamps =false;
    
    protected static function newFactory()
    {
        return \Modules\Slider\Database\factories\SliderFactory::new();
    }
}
