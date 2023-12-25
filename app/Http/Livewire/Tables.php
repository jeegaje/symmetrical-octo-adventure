<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Product;

class Tables extends Component
{
    public $products;
    public $showUpdate;
    public $showAllProduct;
    public $productName;
    public $productDescription;
    public $productPrice;
    public $productStatus;
    public $productStock;

    public function clearFieldForm(){
        $this->productName = null;
        $this->productDescription = null;
        $this->productPrice = null;
        $this->productStatus = null;
        $this->productStock = null;
    }

    public function addProduct(){
        $product = new Product;
        $product->name = $this->productName;
        $product->description = $this->productDescription;
        $product->price = $this->productPrice;
        $product->status = $this->productStatus;
        $product->stock = $this->productStock;
        $product->save();

        $this->clearFieldForm();
    }

    public function showUpdateModal($id){
        $product = Product::findOrFail($id);
        $this->productName = $product->name;
        $this->productDescription = $product->description;
        $this->productPrice = $product->price;
        $this->productStatus = $product->status;
        $this->productStock = $product->stock;

    }

    public function updateProduct($id){
        $product = Product::findOrFail($id);
        $product->name = $this->productName;
        $product->description = $this->productDescription;
        $product->price = $this->productPrice;
        $product->status = $this->productStatus;
        $product->stock = $this->productStock;
        $product->save();
    }

    public function deleteProduct($id){
        $product = Product::findOrFail($id);
        $product->delete();
    }

    public function mount(){
        $this->showAllProduct = true;
    }
    public function render()
    {
        $this->products = Product::all();
        return view('livewire.tables');
    }
}
