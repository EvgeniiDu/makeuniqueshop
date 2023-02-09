<?php

namespace App\Http\Livewire;

use Livewire\Component;

class VacanciesComponent extends Component
{
    public function render()
    {
        return view('livewire.vacancies-component')->layout('layouts.base');
    }
}
