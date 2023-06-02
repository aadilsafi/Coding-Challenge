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
        $requests = $auth_user->allRequests();
        $connections = $auth_user->allConnections()->pluck('id');
        $connections = User::whereIn('id',$connections)->get();
        $suggestions = User::whereNotIn('id',$requests->pluck('id'))->where('id','!=',$auth_user->id)->get();
        $sent_requests = $auth_user->connectionRequestSent()->where('status',0)->get();
        $received_requests = $auth_user->connectionRequestReceived()->where('status',0)->get();
        return view('components.network_connections', compact('suggestions', 'connections', 'sent_requests', 'received_requests'))->layout('livewire');
    }
}
