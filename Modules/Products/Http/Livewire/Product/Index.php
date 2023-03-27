<?php

namespace Modules\Products\Http\Livewire\Product;


use Livewire\Component;
use Modules\Products\Entities\Product;
class Index extends Component
{
    public function render()
    {
        $products = Product::all();
      //  dd($products);
        return view('products::livewire.product.index',['products'=>$products]);
    }
}
