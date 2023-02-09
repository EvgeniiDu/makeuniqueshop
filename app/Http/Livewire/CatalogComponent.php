<?php

namespace App\Http\Livewire;

use App\Models\Category;
use Livewire\Component;

class CatalogComponent extends Component
{



    public function render()
    {
        $categories = Category::all();
        return view('livewire.catalog-component', [
            'categories' => $categories
        ])->layout('layouts.base');
    }
}
