<?php

use App\Http\Controllers\ConnectionController;
use App\Http\Controllers\RequestController;
use App\Http\Livewire\CommonConnections;
use App\Http\Livewire\Connections;
use App\Http\Livewire\Request as LivewireRequest;
use App\Http\Livewire\Suggestions;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('requests/{mode}',LivewireRequest::class)->name('get.requests');
Route::post('requests', [RequestController::class,'store'])->name('send.request');

Route::get('suggestions', Suggestions::class)->name('get.suggestions');
Route::get('connections', Connections::class)->name('get.connections');
Route::get('mutuals/{user_id}', CommonConnections::class)->name('get.mutuals');

Route::delete('connections/{user_id}', [ConnectionController::class,'destroy'])->name('remove.connection');
Route::post('change/status', [RequestController::class,'changeStatus'])->name('change.status');



