<?php

namespace App\Http\Livewire;

use App\Models\ConnectionRequest;
use App\Models\User;
use Livewire\Component;

class Networkconnections extends Component
{
    public $currentComponent = 'sentrequests';

    public function render()
    {
        $auth_user = auth()->user();
        $requests = $auth_user->allRequests()->pluck('id');
        $connections = $auth_user->allConnections()->pluck('id');
        $suggestions = User::whereNotIn('id',$connections)->whereNotIn('id',$requests)->where('id','!=',auth()->id())->count();
        $sent_requests = $auth_user->connectionRequestSent()->where('status',0)->count();
        $received_requests = $auth_user->connectionRequestReceived()->where('status',0)->count();
        $connections = $connections->count();
        return view('components.network_connections', compact('suggestions', 'connections', 'sent_requests', 'received_requests'))->layout('livewire');
    }
}
