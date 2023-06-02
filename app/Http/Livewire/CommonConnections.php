<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;

class CommonConnections extends Component
{
    public $user_id;
    public function mount($user_id)
    {
        $this->user_id = $user_id;
    }
    public function render()
    {
        $user = User::find($this->user_id);
        $auth_user = auth()->user();
        $users = $auth_user->mutualConnections($user);
        return  view('components.connection_in_common')->with('users',$users)->layout('layouts.livewire');
    }
}
