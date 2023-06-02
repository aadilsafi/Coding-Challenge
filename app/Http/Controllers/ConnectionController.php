<?php

namespace App\Http\Controllers;

use App\Models\ConnectionRequest;

class ConnectionController extends Controller
{
    public function destroy($user_id)
    {
        $auth_id = auth()->id();
        $request = ConnectionRequest::where(function($q) use($auth_id,$user_id){
            $q->where('sender_id',$auth_id)->where('receiver_id',$user_id);
        })->orWhere(function($q) use($auth_id,$user_id){
            $q->where('sender_id',$user_id)->where('receiver_id',$auth_id);
        })->first();
        return response()->json($request->delete());
    }
}
