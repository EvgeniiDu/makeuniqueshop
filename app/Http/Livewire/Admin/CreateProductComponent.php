<?php

namespace App\Http\Livewire\Admin;

use App\Models\Category;
use App\Models\Color;
use App\Models\Image;
use App\Models\Product;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithFileUploads;

class CreateProductComponent extends Component
{
    use WithFileUploads;

    public $title;
    public $slug;
    public $image;
    public $height;
    public $length;
    public $width;
    public $filling = null;
    public $coating;
    public $tabletop = null;
    public $material;
    public $description;
    public $regular_price;
    public $sale_price = null;
    public $SKU;
    public $stock_status = 'instock';
    public $quantity;
    public $top_sales = 0;
    public $new_product = 'new';
    public $category_id;
    public $color_id;
    public $images = [];

    public function updated($fields)
    {
        $this->validateOnly($fields, [
            'title' => 'required',
            'slug' => 'required|unique:products',
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'height' => 'required|numeric',
            'length' => 'required|numeric',
            'width' => 'required|numeric',
            'material' => 'required',
            'coating' => 'required',
            'description' => 'required',
            'regular_price' => 'required|numeric',
            'stock_status' => 'required',
            'quantity' => 'required|numeric',
            'top_sales' => 'numeric',
            'new_product' => 'required',
            'category_id' => 'required',
            'color_id' => 'required',
            'SKU' => ['required', 'numeric', 'unique:products'],
            'images' => 'required',
        ]);
    }

    public function store()
    {
        $this->validate([
            'title' => 'required',
            'slug' => 'required|unique:products',
            'image' => 'sometimes|required|image|mimes:jpeg,png,jpg|max:2048',
            'height' => 'required|numeric',
            'length' => 'required|numeric',
            'width' => 'required|numeric',
            'material' => 'required',
            'coating' => 'required',
            'description' => 'required',
            'regular_price' => 'required|numeric',
            'stock_status' => 'required',
            'quantity' => 'required|numeric',
            'top_sales' => 'numeric',
            'new_product' => 'required',
            'category_id' => 'required',
            'color_id' => 'required',
            'SKU' => ['required', 'numeric', 'unique:products'],
            'images' => 'required',
        ]);
        $product = new Product();
        $product->title = $this->title;
        $product->slug = $this->slug;
        $imageName = Carbon::now()->timestamp.'.'.$this->image->extension();
        $this->image->storeAs('products', $imageName);
        $product->image = $imageName;
        $product->height =$this->height;
        $product->length =$this->length;
        $product->width =$this->width;
        $product->filling = $this->filling;
        $product->material =$this->material;
        $product->coating =$this->coating;
        $product->tabletop = $this->tabletop;
        $product->description =$this->description;
        $product->regular_price = $this->regular_price;
        $product->SKU = $this->SKU;
        $product->stock_status = $this->stock_status;
        $product->quantity = $this->quantity;
        $product->top_sales = $this->top_sales;
        $product->sale_price = $this->sale_price;
        $product->new_product = $this->new_product;
        $product->category_id = $this->category_id;
        $product->color_id = $this->color_id;
        $product->save();

        foreach ($this->images as $key => $image_item){
            $images = new Image();
            $images->product_id = $product->id;
            $imageName = Carbon::now()->timestamp. $key . '.'.$this->images[$key]->extension();
            $this->images[$key]->storeAs('products', $imageName);
            $images->path = $imageName;
            $images->save();
        }

        session()->flash('success_message', 'Товар успішно додано');
        return redirect()->route('admin.products');
    }

    public function render()
    {
        //dd($this->images);
        $categories = Category::all();
        $colors = Color::all();
        return view('livewire.admin.create-product-component', ['categories' => $categories, 'colors' => $colors])->layout('layouts.admin_layout');
    }
}
