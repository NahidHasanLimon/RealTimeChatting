    <?php
    use App\Events\testEvent;
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
    Route::get('/profile', function () {
        return view('profile');
    });

    Auth::routes();
    //profile Routes
    Route::get('/user-profile/{id}', 'ProfileController@index')->name('user.profile');
  //profile Routes
    Route::get('/home', 'HomeController@index')->name('home');

    Route::get('/userlist', 'FriendController@index')->name('userlist');


    Route::post('/friendRrequest', 'FriendController@friendRrequest')->middleware('auth');



//
    Route::post('/add-friend', 'FriendController@addFriend')->middleware('auth');

    Route::post('/friend/remove-friend', 'FriendController@removeFriend')->middleware('auth');

    Route::post('/friend/cancel-request', 'FriendController@cancelRequest')->middleware('auth');


    Route::get('/chat', 'ChatController@index')->middleware('auth')->name('chat.index');
    Route::get('/chat/{id}', 'ChatController@show')->middleware('auth')->name('chat.show');
    Route::post('/chat/getChat/{id}', 'ChatController@getChat')->middleware('auth');
    Route::post('/chat/sendChat', 'ChatController@sendChat')->middleware('auth');

    Route::get('/pusher', function() {
    event(new App\Events\BroadcastChat('Hi there Pusher!'));
    return "Event has been sent!";
    });
    // Route::get('/', 'ChatsController@index');
    // Route::get('messages', 'ChatsController@fetchMessages');
    // Route::post('messages', 'ChatsController@sendMessageTest');

    Route::get('event',function(){
      event(new testEvent('Hy please solve kora doooo'));
    });
    Route::get('listen',function(){
      return view('listenBroadcast');
    });
