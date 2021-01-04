<?php

namespace App\Http\Livewire;

use App\Category;
use App\Product;
use Livewire\Component;

class Home extends Component
{
    public function render()
    {
        return view('livewire.home', [
            'categories' => Category::all(),
            'products' => Product::take(3)->get()
        ]);
    }
}
