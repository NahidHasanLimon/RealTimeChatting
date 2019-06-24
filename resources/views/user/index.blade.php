@extends('layouts.app')
@section('content')

     <div class="container">
       <p class="card-header-title">
      Users
      </p>
                 @php
                 $myFriends = array();
                 foreach ($friends as $friend) {
                 $myFriends[] = $friend->id;

            }

                 $myFriendsRequest = array();
                 foreach ($friendsRequest as $friendRequest) {
                 $myFriendsRequest[] = $friendRequest->id;


            }


            @endphp
            <div class='columns is-multiline'>
            @foreach($users as $user)
            <a href="#{{ $user->id}}">
              <div class="column is-2">
              <div class="card card-equal-height">
                <div class="card-image">
                  <figure class="image is-4by3">
                    <img src="{{ asset('img/profilePhoto/'.$user->photo) }}" alt="Placeholder image">
                  </figure>
                </div>
                <div class="card-content" >

               <onlineuser v-bind:friend="{{ $user }}" v-bind:onlineusers="onlineUsers"></onlineuser>
               <a href="{{route('user.profile',$user->id)}}">{{ $user->name}}</a>

                </div>
             <div class="card-footer" >

              @if(in_array($user->id,$myFriends))
              <a class="card-footer-item button is-success remove-friend" type="button" id="{{$user->id}}" name="button"><i class="fal fa-user-friends"></i>Remove Friend </a>
               @elseif(in_array($user->id,$myFriendsRequest))
                 <a class="card-footer-item button is-danger cancel-request" type="button" name="button" id="{{$user->id}}"><i class="fal fa-user-friends"></i>Cancel Request</a>

             @else
              <a class="card-footer-item button is-info add-friend" type="button" id="{{$user->id}}" name="button"><i class="fa fa-user-plus"></i>Add Friend </a>
            @endif

          </div>
        </div>
          </div>
        </a>

  @endforeach


   </div>
 </div>




@endsection
