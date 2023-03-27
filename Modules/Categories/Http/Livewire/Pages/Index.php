<?php

namespace Modules\Categories\Http\Livewire\Pages;
use Livewire\Component;
use Modules\Categories\Entities\Categories;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public function render()
    {
        $category =  Categories::orderBy('id','DESC')->paginate(0);  
        return view('categories::livewire.pages.index',['categories'=> $category]);
    }
  
}
