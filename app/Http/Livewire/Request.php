<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Request extends Component
{
    public $mode;
    public function mount($mode)
    {
        $this->mode = $mode;
    }
    public function render()
    {
        $user = auth()->user();
        $mode = $this->mode;
        if ($mode == "sent") {
            $users = $user->connectionRequestSent()->get();
        } else {
            $users = $user->connectionRequestReceived()->get();
        }
        return  view('components.request',compact('mode','users'))->layout('layouts.livewire');
    }
}
