<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Connections extends Component
{
    public function render()
    {
        $auth_user = auth()->user();
        $users = $auth_user->allConnections();
        return  view('components.connection',compact('users'))->layout('layouts.livewire');
    }
}
