<?php

namespace App\Http\Controllers;
use Auth;
use App\Friend;
use App\User;
use Illuminate\Http\Request;

class FriendController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $users = User::all()->except(Auth::id());
      $friends=Auth::user()->friends();

      $friendsRequest=Auth::user()->AllfriendsRequest();

      return view('user.index')->with('friends',$friends)->with('users',$users)->with('friendsRequest',$friendsRequest);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $friend= new Friend;
        $friend->user_id=Auth::user()->id;
        $friend->friend_id=$request->friend_id;
        $friend->save();
        Session::flash('success','Friend Has Been Added');
        return redirect()->back();
    }
    public function addFriend(Request $request)
    {
        //
          $friend= new Friend;
          $fid=$request->friend_id;
          $uid=Auth::user()->id;
          // dd($fid);
          // dd($request->friend_id);
          // dd($uid);


        $friendCount=Friend::where('user_id', '=',$uid)
                      ->where('friend_id','=',$fid)
                      ->where(function ($query) {
                        $query->where('status', '=',1)
                              ->orWhere('status', '=',0);
                    })

            ->orWhere(function($query) use ($fid,$uid)
            {
                $query->where('user_id', '=',$fid)
                              ->where('friend_id','=',$uid)
                              ->where(function ($query) {
                                $query->where('status', '=',1)
                                      ->orWhere('status', '=',0);
                            });
            })->get()->count();
            // dd($friendCount);

      if($friendCount>0){
        return [
          'message'=>"allready added"
        ];

      }
  elseif($friendCount==0){
    $friend->user_id=Auth::user()->id;
    $friend->friend_id=$request->friend_id;

    $friend->save();
    // Session::flash('success','Friend Request has been Sent');
    return [
      'friend_id'=>$request->friend_id
    ];

  }


    }
// Start Freind Request App.blade
public function friendRrequest(Request $request) {
    $user = Friend::all()->where('friend_id', '=',Auth::user()->id)->where('user_id', '=', $request->user_id)->first();
      if ($request->isRequest) {
          $user->status = 1;
          $user->save();
          return [
              'user_id' => $request->user_id,
              'true' => true
          ];
      }
      $user->delete();
      return [
          'user_id' => $request->user_id,
          'true' => false
      ];
  }
// End of Freind Request App.blade

//Start Remove Friend
public function removeFriend(Request $request) {
    $uid=Auth::user()->id;
    $fid=$request->friend_id;


      $user=Friend::first()->where('user_id', '=',$uid)
                ->where('friend_id','=',$fid)
                ->where('status','=',1)
                ->orWhere(function($query) use ($fid,$uid)
                  {
                    $query->where('user_id', '=',$fid)
                          ->where('friend_id','=',$uid)
                          ->where('status','=',1);
                    });
                    // dd($fid);
      $user->delete();
      return [
          'friend_id' => $fid,
          'true' => false
      ];
  }
// End of  Remove Friend

//Start Cancel Request
public function cancelRequest(Request $request) {
    $uid=Auth::user()->id;
    $fid=$request->friend_id;


      $user=Friend::first()->where('user_id', '=',$uid)
                ->where('friend_id','=',$fid)
                ->where('status','=',0)
                ->orWhere(function($query) use ($fid,$uid)
                  {
                    $query->where('user_id', '=',$fid)
                          ->where('friend_id','=',$uid)
                          ->where('status','=',0);
                    });
                    // dd($fid);
      $user->delete();
      return [
          'friend_id' => $fid,
          'true' => false
      ];
  }
// End of  Cancel Request
    /**
     * Display the specified resource.
     *
     * @param  \App\Friend  $friend
     * @return \Illuminate\Http\Response
     */
    public function show(Friend $friend)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Friend  $friend
     * @return \Illuminate\Http\Response
     */
    public function edit(Friend $friend)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Friend  $friend
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Friend $friend)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Friend  $friend
     * @return \Illuminate\Http\Response
     */
    public function destroy(Friend $friend)
    {
        //
    }
}
