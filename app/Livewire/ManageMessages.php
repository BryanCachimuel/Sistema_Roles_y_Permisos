<?php

namespace App\Livewire;

use App\Models\Message;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class ManageMessages extends Component
{   
    public $content = ''; 

    public function save() {
        $this->validate([
            'content' => 'required|min:5'
        ]);

        Message::create([
            'contend' => $this->content,
            'user_id' => Auth::user()->id
        ]);

        $this->content = '';
    }

    public function render()
    {
        return view('livewire.manage-messages');
    }
}
