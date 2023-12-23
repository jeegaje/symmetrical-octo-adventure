<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Product;

class Tables extends Component
{
    public $products;

    public function mount(){
        $this->products = Product::all();
    }
    public function render()
    {
        return view('livewire.tables');
    }
}
