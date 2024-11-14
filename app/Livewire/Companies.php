<?php

namespace App\Livewire;

use App\Models\Company;
use Livewire\Component;

class Companies extends Component
{
    public function render()
    {
        return view('livewire.companies', [
            'companies' => Company::with('nomorsks')->get(),
        ]);
    }
}
