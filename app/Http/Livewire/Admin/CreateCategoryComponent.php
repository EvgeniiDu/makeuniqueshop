<?php

namespace App\Http\Livewire\Admin;

use App\Models\Category;
use Livewire\Component;

class CreateCategoryComponent extends Component
{
    public $title;
    public $slug;

    public function updated($fields)
    {
        $this->validateOnly($fields, [
            'title' => 'required',
            'slug' => 'required',
        ]);
    }

    public function store(){
        $this->validate([
            'title' => 'required|unique:categories',
            'slug' => 'required|unique:categories',
        ]);

        $category = new Category();
        $category->title = $this->title;
        $category->slug = $this->slug;
        $category->save();

        session()->flash('success_message', 'Категорію успішно додано');
        redirect()->route('admin.categories');
    }


    public function render()
    {
        return view('livewire.admin.create-category-component')->layout('layouts.admin_layout');
    }
}
