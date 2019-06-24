@extends('layouts.app')
@section('content')
<meta name="friendId" content="{{ $friend->id }}">
<!-- <section class="hero is-primary">
     <div class="hero-body">
       <div class="columns">
         <div class="column is-12">
           <div class="container content">
             <i class="is-large fab fa-discord"></i>
             <i class="is-large fas fa-code"></i>
             <h1 class="title">Md.  <em>Nahid Hasan </em> Limon</h1>
             <h3 class="subtitle">
             Collection of code goodies for next-level dev
             </h3>

           </div>
         </div>
       </div>
     </div>
   </section> -->

   <section class="section">
     <div class="container">
       <div class="columns">


         <div class="column is-9 is-offset-2">
           <div class="content is-medium">
         <h3 class="title is-3 btn-is-success">{{$friend->name}}</h3>
             <div class="panel">


                 <div class="panel-heading">
                  {{$friend->name}}


                 <div class="contain is-pulled-right">
                  <a href="{{url('/chat')}}" class="is-link"><i class="fa fa-arrow-left"></i>Go Back</a>
                 </div>
                 <chat v-bind:chats="chats"
                   v-bind:userid="{{ Auth::user()->id}}"
                   v-bind:friendid="{{ $friend->id}}">
                 </chat>

                 </div>


           </div>
     </div>
   </div>

 </div>
</div>
</section>
<!-- <footer class="footer">
<section class="section">
 <div class="container">
   <div class="columns is-multiline">
     <div class="column is-one-third">
       <article class="notification media has-background-white">
         <figure class="media-left">
           <span class="icon">
             <i class="has-text-warning fas fa-columns fa-lg"></i>
           </span>
         </figure>
         <div class="media-content">
           <div class="content">
             <h1 class="title is-size-4">Columns</h1>
             <p class="is-size-5 subtitle">
               The power of <strong>Flexbox</strong> in a simple interface
             </p>
           </div>
         </div>
       </article>
     </div>
     <div class="column is-one-third">
       <article class="notification has-background-white media">
         <figure class="media-left">
           <span class="icon has-text-info">
             <i class="fab fa-lg fa-wpforms"></i>
           </span>
         </figure>
         <div class="media-content">
           <div class="content">
             <h1 class="title is-size-4">Form</h1>
             <p class="is-size-5 subtitle">
               The indispensable <strong>form controls</strong>, designed for maximum clarity
             </p>
           </div>
         </div>
       </article>
     </div>



   </div>
 </div>
</section>
<hr>
<div class="columns is-mobile is-centered">
 <div class="field is-grouped is-grouped-multiline">
   <div class="control">
     <div class="tags has-addons"><a class="tag is-link" href="https://github.com/dansup/bulma-templates">Bulma Templates</a>
     <span class="tag is-info">MIT license</span>
   </div>
 </div>
 <div class="control">
   <div class="tags has-addons">
     <span class="tag is-dark">based on a pen</span>
     <span class="tag has-addons is-warning"><a href="https://codepen.io/melanieseltzer/pen/odOXWM"><i class="fab fa-lg fa-codepen"></i></a></span>
   </div>
 </div>
</div>
</div>

</footer> -->

@endsection
<script src='https://cdnjs.cloudflare.com/ajax/libs/prism/9000.0.1/prism.js'></script>
