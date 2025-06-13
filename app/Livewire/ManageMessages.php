<?php

namespace App\Livewire;

use App\Events\MessageSend;
use App\Models\Message;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class ManageMessages extends Component
{   
    public $content; 
    public $mensajes;

     public function mount() {
        $this->getMensajes();
    } 

    public function save() {
       $this->validate([
        'content'=>'required|min:5'
       ]);

       Message::create([
        'content'=>$this->content,
        'user_id'=> Auth::user()->id
       ]);

       $this->content = '';

       $this->getMensajes();

       MessageSend::dispatch();
    }

    public function getMensajes() {
        $this->mensajes = Message::with('user')->latest()->get();
    }

    public function render()
    {
        return view('livewire.manage-messages');
    }
}
