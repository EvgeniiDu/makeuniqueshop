<?php

namespace App\Http\Livewire\Admin;

use App\Models\Color;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithFileUploads;

class CreateColorProductComponent extends Component
{
    use WithFileUploads;

    public $title;
    public $image;

    public function updated($fields)
    {
        $this->validateOnly($fields, [
            'title' => 'required|unique:colors',
            'image' => 'required',
        ]);
    }

    public function store(){
        $this->validate([
            'title' => 'required|unique:colors',
            'image' => 'required',
        ]);

        $color = new Color();
        $color->title = $this->title;
        $imageName = Carbon::now()->timestamp. '.' .$this->image->extension();
        $this->image->storeAs('colors', $imageName);
        $color->image = $imageName;
        $color->save();

        session()->flash('success_message', 'Колір успішно додано');
        redirect()->route('admin.colors');
    }

    public function render()
    {
        return view('livewire.admin.create-color-product-component')->layout('layouts.admin_layout');
    }
}
