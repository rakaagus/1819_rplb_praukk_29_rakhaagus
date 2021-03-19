<?php

namespace App\Http\Livewire;

use App\Category;
use App\Liga;
use Livewire\Component;
use App\Product;
use Livewire\WithPagination;

class ProductCategory extends Component
{
    use WithPagination;

    public $search, $category;

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function mount($id){
        $categoryDetail = Category::find($id);

        if($categoryDetail){
            $this->category = $categoryDetail;
        }
    }

    protected $updateQueryString = ['search'];

    public function render()
    {
        if($this->search) {
            $products = Product::where('category_id', $this->category->id)->where('nama', 'like', '%'.$this->search.'%')->paginate(8);
        }else {
            $products = Product::where('category_id', $this->category->id)->paginate(8);
        }
        return view('livewire.product-index',[
            'products' => $products,
            'title' => 'Menu '.$this->category->nama
        ]);
    }
}
