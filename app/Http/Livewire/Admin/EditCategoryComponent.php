<?php

namespace App\Http\Livewire\Admin;

use App\Models\Category;
use Livewire\Component;

class EditCategoryComponent extends Component
{
    public $title;
    public $slug;

    public function mount($categorySlug){
        $category = Category::where('slug', $categorySlug)->first();
        $this->title = $category->title;
        $this->slug = $category->slug;
    }

    public function updated($fields)
    {
        $this->validateOnly($fields, [
            'title' => 'required',
            'slug' => 'required',
        ]);
    }

    public function updateCategory(){
        $this->validate([
            'title' => 'required',
            'slug' => 'required',
        ]);

        $category = new Category();
        $category->title = $this->title;
        $category->slug = $this->slug;
        $category->save();

        session()->flash('success_message', 'Категорію успішно оновлено');
        redirect()->route('admin.categories');
    }

    public function render()
    {
        return view('livewire.admin.edit-category-component')->layout('layouts.admin_layout');
    }
}
