<?php

namespace App\Http\Livewire\Admin;

use App\Models\Color;
use Livewire\Component;
use Livewire\WithPagination;

class ColorProductComponent extends Component
{
    use WithPagination;

    public $color_id;

    public function deleteColor(){
        $color = Color::find($this->color_id);
        unlink('assets/images/colors/'.$color->image);
        $color->delete();

        session()->flash('success_message', 'Колір успішно видалено');
    }

    public function render()
    {
        $colors = Color::orderBy('created_at', 'DESC')->paginate(4);
        return view('livewire.admin.color-product-component', ['colors'=>$colors])->layout('layouts.admin_layout');;
    }
}
