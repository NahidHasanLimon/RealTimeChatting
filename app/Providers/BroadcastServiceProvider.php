<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Broadcast;

class BroadcastServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Broadcast::routes();
        //   // require base_path('routes/channels.php');
        // Broadcast::routes(['middleware' => ['auth:web']]);
        // Broadcast::routes(['middleware' => 'auth']);
        // // Broadcast::channel('App.User.{id}', function ($user, $id) {
        // //     return (int) $user->id === (int) $id;
        // // });
        //
        // // require base_path('routes/channels.php');
        // Broadcast::routes(['middleware' => ['auth:api']]);
        Broadcast::channel('Chat.{user_id}.{friend_id}*', function ($user, $user_id, $friend_id) {
          // return true;
            return $user->id == $friend_id;
        });
      //   Broadcast::channel('App.User.*', function ($user, $userId) {
      //     return (int) $user->id === (int) $userId;
      // });


        require base_path('routes/channels.php');
    }
}
