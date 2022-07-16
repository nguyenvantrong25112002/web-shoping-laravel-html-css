<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Admin;

class AdminLivewire extends Component
{
    public function render()
    {
        return view('backend.livewire.admin-livewire');
    }
}