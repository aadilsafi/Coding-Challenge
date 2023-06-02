<?php

namespace App\Http\Controllers;

use App\Enums\RequestStatusEnum;
use App\Http\Requests\ChangeStatusRequest;
use App\Http\Requests\StoreRequest;

class RequestController extends Controller
{
    public function changeStatus(ChangeStatusRequest $request)
    {
        $data = $request->validated();
        $auth_user = auth()->user();
        //Accept request
        if ($request->status == RequestStatusEnum::Accepted->value) {
            $status = $auth_user->connectionRequestReceived()->updateExistingPivot($data['user_id'], ['status' => 1]);
        }
        //Delete Request
        elseif ($request->status == RequestStatusEnum::Rejected->value) {
            $status = $auth_user->connectionRequestSent()->detach($request->user_id);
        }
        return response()->json($status);
    }
    public function store(StoreRequest $request)
    {
        $data       = $request->validated();
        $auth_user  = auth()->user();
        $status     = $auth_user->connectionRequestSent()->attach($data['user_id']);
        return response()->json($status);

    }
}
