<?php

namespace App\Http\Livewire;

use App\Models\ArchitectDesigner;
use Livewire\Component;

class ArchitectDesignerComponent extends Component
{
    public $name;
    public $phone;
    public $email;
    public $message;

    public function updated($fields)
    {
        $this->validateOnly($fields, [
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required|numeric',
            'message' => 'required',
        ]);
    }

    public function store(){
        $this->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required|numeric',
            'message' => 'required',
        ]);

        $architectDesigner = new ArchitectDesigner();
        $architectDesigner->name = $this->name;
        $architectDesigner->phone = $this->phone;
        $architectDesigner->email = $this->email;
        $architectDesigner->message = $this->message;
        $architectDesigner->save();
        $this->resetForm();
    }

    public function resetForm()
    {
        $this->name = null;
        $this->phone = null;
        $this->email = null;
        $this->message = null;
    }

    public function render()
    {
        return view('livewire.architect-designer-component')->layout('layouts.base');
    }
}
