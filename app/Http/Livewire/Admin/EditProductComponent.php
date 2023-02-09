<?php

namespace App\Http\Livewire\Admin;

use App\Models\Category;
use App\Models\Color;
use App\Models\Image;
use App\Models\Product;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithFileUploads;

class EditProductComponent extends Component
{
    use WithFileUploads;

    public $title;
    public $slug;
    public $image;
    public $height;
    public $length;
    public $width;
    public $filling;
    public $coating;
    public $tabletop;
    public $material;
    public $description;
    public $regular_price;
    public $sale_price;
    public $SKU;
    public $stock_status;
    public $quantity;
    public $top_sales;
    public $new_product;
    public $category_id;
    public $color_id;
    public $newImage;
    public $images = [];
    public $product_id;

    public function mount($productSlug){
        $product = Product::where('slug', $productSlug)->first();
        $this->title = $product->title;
        $this->slug = $product->slug;
        $this->image = $product->image;
        $this->height = $product->height;
        $this->length = $product->length;
        $this->width = $product->width;
        $this->filling = $product->filling;
        $this->coating = $product->coating;
        $this->tabletop = $product->tabletop;
        $this->material = $product->material;
        $this->description = $product->description;
        $this->regular_price = $product->regular_price;
        $this->sale_price = $product->sale_price;
        $this->SKU = $product->SKU;
        $this->stock_status = $product->stock_status;
        $this->quantity = $product->quantity;
        $this->top_sales = $product->top_sales;
        $this->new_product = $product->new_product;
        $this->category_id = $product->category_id;
        $this->color_id = $product->color_id;
        $this->product_id = $product->id;
    }

    public function updated($fields)
    {
        $this->validateOnly($fields, [
            'title' => 'required',
            'slug' => 'required',
            'image' => 'required',
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
            'SKU' => 'required|numeric',
        ]);
    }


    public function deleteImage($id)
    {
       $image = Image::find($id);
       $image->delete();
       session()->flash('success_message', 'фото успішно видалено');
    }

    public function updateProduct(){
        $this->validate([
            'title' => 'required',
            'slug' => 'required',
            'image' => 'sometimes|required',
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
            'SKU' => 'required|numeric',
        ]);

        $product = Product::find($this->product_id);
        $product->title = $this->title;
        $product->slug = $this->slug;
        if($this->newImage){
            $imageName = Carbon::now()->timestamp.'.'.$this->newImage->extension();
            $this->newImage->storeAs('products', $imageName);
            $product->image = $imageName;
        }
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

        if($this->images != ''){
            foreach ($this->images as $key => $image_item){
                $image = new Image();
                $image->product_id = $product->id;
                $imageName = Carbon::now()->timestamp. $key . '.'.$this->images[$key]->extension();
                $this->images[$key]->storeAs('products', $imageName);
                $image->path = $imageName;
                $image->save();
            }
        }
        $this->images = '';

        session()->flash('success_message', 'Товар успішно оновлено');
        return redirect()->route('admin.products');
    }

    public function render()
    {
        $productImages = Image::where('product_id', $this->product_id)->get();
        //dd($productImages);
        $categories = Category::all();
        $colors = Color::all();
        return view('livewire.admin.edit-product-component',  ['categories' => $categories, 'colors' => $colors, 'productImages' => $productImages])->layout('layouts.admin_layout');
    }
}
