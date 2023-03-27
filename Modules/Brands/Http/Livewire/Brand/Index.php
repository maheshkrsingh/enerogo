<?php

namespace Modules\Brands\Http\Livewire\Brand;

use Livewire\Component;
use  Modules\Brands\Entities\Brand;

class Index extends Component
{
    public function render()
    {
         $brands = Brand::all();
        return view('brands::livewire.brand.index',['brands'=> $brands]);
    }
}
