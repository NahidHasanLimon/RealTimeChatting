@extends('layouts.app')
@section('content')

@php
$friendCount=0;
$userFriends = array();
foreach ($usersFriends as $usersFriend) {
    $userFriends[] = $usersFriend->id;
    $friendCount++;
}

$U_friendsRequest = array();
foreach ($UsersfriendsRequests as $UsersfriendsRequest) {
      $U_friendsRequest[] = $UsersfriendsRequest->id;

}
$RcRequest = array();
foreach ($sent_Friend_Request_For_Me_c as $sentFriend_Request_For_Me) {
      $RcRequest[] = $sentFriend_Request_For_Me->friendDetails->id;
}





@endphp
<div class='columns'>
<div class='container profile'>

<div class='section profile-heading'>
 <div class='columns is-mobile is-multiline'>
   <div class='column is-3'>
     <span class='header-icon user-profile-image'>
       <img alt='Profile Photo' src="{{ asset('img/profilePhoto/'.$details->photo) }}">
     </span>
   </div>
   <div class='column is-4-tablet is-10-mobile name'>
     <p>
       <span class='title is-bold'>{{$details->name}}</span>
       <br>

           @if(in_array(Auth::user()->id,$userFriends))
          <a class="button is-primary is-outlined remove-friend" type="button" id="{{$id}}" name="button" style='margin: 5px 0'><i class="fal fa-user-friends"></i>Remove Friend </a>
         @elseif(in_array(Auth::user()->id,$RcRequest))

         @foreach ($sent_Friend_Request_For_Me_c as $RecvFrequest)
         print_r($RecvFrequest)
         @if($RecvFrequest->friendDetails->id == $id)
         <div  data-userid="{{ $RecvFrequest->friendDetails->id }}" >
                 <a class="button is-primary is-outlined is-info friendRrequest">Confirm</a>
               <a class="button is-primary is-outlined is-danger friendRrequest">Delete</a>
           </div>
         @endif

         @endforeach

          @else
          <a class="button is-primary is-outlined  add-friend" type="button" id="{{$id}}" name="button" style='margin: 5px 0'><i class="fa fa-user-plus"></i>Add Friend </a>
         @endif
       </a>
       <br>
     </p>
     <p class='tagline'>
       {{$details->about}}
     </p>
   </div>
   <div class='column is-2-tablet is-4-mobile has-text-centered'>
     <p class='stat-val'>30</p>
     <p class='stat-key'>Friends</p>
   </div>


 </div>
</div>
<div class='profile-options is-fullwidth'>
 <div class='tabs is-fullwidth is-medium'>
   <ul>
     <li class='link -active'>
       <a>
         <span class='icon'>
           <i class='fa fa-list'></i>
         </span>
         <span>Friend Lists</span>
       </a>
     </li>


   </ul>
 </div>
</div>
<div class='box' style='border-radius: 0px;'>
 <!-- Main container -->
</div>

<div class='columns is-mobile'>
  @if($friendCount>0)
    @foreach($usersFriends as $usersFriend)

 <div class='column is-2'>
   <div class="card card-equal-height">
     <div class="card-image">
       <figure class="image is-4by3">
           <img src="{{ asset('img/profilePhoto/'.$usersFriend->photo) }}" alt="Placeholder image">
       </figure>
     </div>
     <div class="card-content" >
       <onlineuser v-bind:friend="{{ $usersFriend }}" v-bind:onlineusers="onlineUsers"></onlineuser>
<a href="{{route('user.profile',$usersFriend->id)}}">{{ $usersFriend->name}}</a>

     </div>
  <div class="card-footer" >

    </div>
    </div>

 </div>

 @endforeach

 <!-- Card End -->
 @else
 <span class="tag is-info">No Friends Available</span>
 @endif


</div>
<!-- Card Full  Column -->
</div>
</div>

@endsection
