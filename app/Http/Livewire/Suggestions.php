<?php

namespace App\Http\Livewire;

use App\Models\User;
use Illuminate\Http\Request;
use Livewire\Component;

class Suggestions extends Component
{
    public function render(Request $request)
    {
        $auth_user      = auth()->user();
        $requests       = $auth_user->allRequests()->pluck('id');
        $connections    = $auth_user->allConnections()->pluck('id');
        $suggestions    = User::whereNotIn('id',$requests)
                            ->whereNotIn('id',$connections)
                            ->where('id','!=',auth()->id())
                            ->get();
        return view('components.suggestion',compact('suggestions'))->layout('layouts.livewire');
    }
}
