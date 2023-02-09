<?php

namespace App\Http\Livewire\Admin;

use App\Models\Category;
use Livewire\Component;

class CategoryComponent extends Component
{
    public $category_id;

    public function deleteCategory(){
        $category = Category::find($this->category_id);
        $category->delete();

        session()->flash('success_message', 'Категорію успішно видалено');
    }

    public function render()
    {
        $categories = Category::all();
        return view('livewire.admin.category-component', ['categories' => $categories])->layout('layouts.admin_layout');
    }
}
