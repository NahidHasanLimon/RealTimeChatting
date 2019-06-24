<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
      protected $fillable = ['message'];
      // Test Purpose

      public function user()
        {
          return $this->belongsTo(User::class);
        }

        // Test Purpose



}
