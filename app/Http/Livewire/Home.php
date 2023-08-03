<?php

namespace App\Http\Livewire;

use App\Models\Emoji;
use Livewire\Component;

class Home extends Component
{
    public $search = '';

    public function render()
    {
        return view('livewire.home', [
            'emojis' => Emoji::where('unicode_name', 'like', '%' . $this->search . '%')->get()
        ])->layout('layouts.guest');
    }
}
