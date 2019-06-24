@extends('layouts.app')
@section('content')


   <section class="section">
     <div class="container">
       <div class="columns">
         <div class="column is-3">

         </div>
         <div class="column is-9">
           <div class="content is-medium">
         <h3 class="title is-3">Friend List ¯\_(ツ)_/¯</h3>
             <div class="panel">

                @forelse($friends as $friend)

                  <a class="panel-block" href="{{route('chat.show',$friend->id)}}">
                      <div class="">

                        <onlineuser v-bind:friend="{{ $friend }}" v-bind:onlineusers="onlineUsers"></onlineuser>
                            {{$friend->name}}
                      </div>
                  </a>

                @empty

               <article class="message is-info">
                 <span class="icon has-text-info">
                 <i class="fab fa-js"></i>
                 </span>
                 <div class="message-body">
                    No Friend Available
                 </div>
               </article>
                @endforelse
                </article>
           </div>


     </div>
   </div>
 </div>
</div>
</section>
<footer class="footer">

<hr>

</footer>
@endsection
