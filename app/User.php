<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','photo','about',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
*  First parameter is Class name/Model
* Second Parameter is Table names
*   Third Parameter is belongs id
* Fourth  Parameter is Foreign Key
     */
    public function friendsOfMine(){

       return $this->belongsToMany('App\User','friends','user_id','friend_id')->wherePivot('status', 1);

    }
    // this will return all the users requested me as a friend
    public function friendOf(){

       return $this->belongsToMany('App\User','friends','friend_id','user_id')->wherePivot('status', 1);

    }

    // Merge above two functions
    public function friends(){


       return $this->friendsOfMine->merge($this->friendOf);

    }
    // Request Checking
    public function friendsReqestFromMine(){


       return $this->belongsToMany('App\User','friends','user_id','friend_id')->wherePivot('status',0);

    }
    // this will return all the users requested me as a friend
    public function friendRequestToMine(){

       return $this->belongsToMany('App\User','friends','friend_id','user_id')->wherePivot('status', 0);

    }
    public function AllfriendsRequest(){


       return $this->friendsReqestFromMine->merge($this->friendRequestToMine);

    }
    // End of request checking

    // Navbar All Friend Request apc_fetch
    public function sentFriendRequestForMe(){

     // return $this->belongsToMany('App\User','friends','friend_id');
      // return $this->belongsToMany('App\User','friends','friend_id')->wherePivot('status', 0);
     return $this->hasMany('App\Friend','friend_id')->where('status', '0');

    }

    //Test Purpose
        public function messages()
    {
      return $this->hasMany(Message::class);
    }
//Test Purpose
}
