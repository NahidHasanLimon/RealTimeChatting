<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Friend extends Model
{
  protected $fillable = [
      'user_id', 'friend_id',
  ];
  // From Logged User Perspective user id  is his friend id
  public function friendDetails() {
          return $this->belongsTo('App\User', 'user_id');
      }
      
  public function userDetails () {
          return $this->belongsTo('App\User', 'friend_id');
      }

}
