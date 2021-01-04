<?php

namespace App\Http\Livewire;

use App\Product;
use App\Category;
use Livewire\Component;
use Livewire\WithPagination;

class ProductCategory extends Component
{
    use WithPagination;

    public $search, $category;

    protected $updateQueryString = ['search'];

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function mount($id)
    {
        $categoryDetail = Category::find($id);

        if ($categoryDetail) {
            $this->category = $categoryDetail;
        }
    }

    public function render()
    {
        if ($this->search) {
            $products = Product::where('category_id', $this->category->id)->where('nama', 'like', '%'.$this->search.'%')->paginate(4);
        } else {
            $products = Product::where('category_id', $this->category->id)->paginate(4);
        }
        return view('livewire.product-index',[
            'products' => $products,
            'title' => 'List '.$this->category->jenis
        ]);
    }
}
