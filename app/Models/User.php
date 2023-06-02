<?php

namespace App\Models;

use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

   public function connectionRequestReceived()
   {
    return $this->belongsToMany(User::class,'connection_requests','receiver_id','sender_id')->where('status',0);
   }
   public function connectionRequestSent()
   {
    return $this->belongsToMany(User::class,'connection_requests','sender_id','receiver_id')->where('status',0);
   }
   public function allRequests()
   {
    return $this->connectionRequestSent->merge($this->connectionRequestReceived);
   }
    public function allConnections()
    {
     return $this->belongsToMany(User::class,'connection_requests','sender_id','receiver_id')->where('status',1)->get()->merge($this->belongsToMany(User::class,'connection_requests','receiver_id','sender_id')->where('status',1)->get());
    }
    public function mutualConnections($user)
    {
        $first_connections = $this->allConnections();
        $second_connections = $user->allConnections();
        return $first_connections->whereIn('id',$second_connections->pluck('id'));


    }

}
