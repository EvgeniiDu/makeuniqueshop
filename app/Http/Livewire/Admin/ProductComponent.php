<?php

namespace App\Http\Livewire\Admin;

use App\Models\Category;
use App\Models\Image;
use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;

class ProductComponent extends Component
{
    use WithPagination;

    public $search;
    public $category_id;
    public $sorting;

    public $product_id;

    public function deleteProduct(){
        $product_images = Image::where('product_id', $this->product_id)->get();
        $product = Product::find($this->product_id);
        unlink('assets/images/products/'.$product->image);
        $product->delete();
        foreach ($product_images as $key => $image){
            unlink('assets/images/products/'.$image->path);
            $image->delete();
        }

        session()->flash('success_message', 'Товар успішно видалено');
    }

    public function render()
    {
        $products = Product::when($this->search, function ($s) {
            $s->where('title', 'like', '%' . $this->search . '%');
        })->when($this->category_id, function ($c) {
            $c->where('category_id', $this->category_id);
        })->when($this->sorting == 'price-desc', function ($d) {
            $d->orderBy('regular_price', 'desc');
        })->when($this->sorting == 'created_at-desc', function ($create_at) {
            $create_at->orderBy('created_at', 'desc');
        })->sortable($this->sorting)->paginate(6);
        $categories = Category::all();
        return view('livewire.admin.product-component', ['products' => $products, 'categories' => $categories])->layout('layouts.admin_layout');
    }
}
