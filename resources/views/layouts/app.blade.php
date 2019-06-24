<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="userId" content="{{ Auth::check() ? Auth::user()->id : 'null' }}">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Chatting Application{{ config('app.name', 'Laravel') }} {{ app()->version() }}</title>



         <!-- <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet"> -->
              <!-- <link  href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet"> -->

              <!-- datepicker   -->
                <!-- <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet"> -->

                <!-- <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/css/bootstrap-datepicker.css" rel="stylesheet"> -->
                  <!-- jqueryUI for Date Picker-->
                  <!-- <link rel="stylesheet"href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css"> -->


            <!-- Styles -->
              <!-- <link rel="stylesheet" href="/resources/demos/style.css"> -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">


          @yield('css')

      <!-- for Test Purpose -->
      <!-- resources/views/layouts/app.blade.php -->

        <style>
          .chat {
            list-style: none;
            margin: 0;
            padding: 0;
          }

          .chat li {
            margin-bottom: 10px;
            padding-bottom: 5px;
            border-bottom: 1px dotted #B3A9A9;
          }

          .chat li .chat-body p {
            margin: 0;
            color: #777777;
          }

          .panel-body {
            overflow-y: scroll;
            height: 350px;
          }

          ::-webkit-scrollbar-track {
            -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3);
            background-color: #F5F5F5;
          }

          ::-webkit-scrollbar {
            width: 12px;
            background-color: #F5F5F5;
          }

          ::-webkit-scrollbar-thumb {
            -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,.3);
            background-color: #555;
          }

        </style>

      <!-- for Test Purpose -->

    </head>
    <body>
        <div id="app">
            <nav class="navbar has-shadow">
                <div class="container">
                    <div class="navbar-brand">
                        <a href="{{ url('/') }}" class="navbar-item">
                          <!-- {{ config('app.name', 'Real Time Chat Application') }} -->
                          Home
                        </a>


                        <div class="navbar-burger burger" data-target="navMenu">
                            <span></span>
                            <span></span>
                            <span></span>
                        </div>
                    </div>

                    <div class="navbar-menu" id="navMenu">
                        <div class="navbar-start">
                        </div>

                        <div class="navbar-end">
                            @if (Auth::guest())

                                <a class="navbar-item " href="{{ route('login') }}">Login</a>
                                <a class="navbar-item " href="{{ route('register') }}">Register</a>
                            @else
                            <!-- new -->

                              <a class="navbar-item " href="{{ route('userlist') }}">Discover People</a>
                                <a class="navbar-item " href="{{ route('chat.index') }}">Chat</a>
                                <div class="navbar-item has-dropdown is-hoverable">
                                   <!-- <span class="tag is-primary is-large ">{{ Auth::user()->sentFriendRequestForMe->count() }}  <i class="fa fa-user-o"></i> </span>  -->
                                   <span class="tag is-success is-large">
                                <i class="fa fa-user-o"></i>
                                  <button class="button is-small is-info">{{ Auth::user()->sentFriendRequestForMe->count() }}+</button>
                                  </span>
                  <div class="navbar-dropdown">

                    @foreach (Auth::user()->sentFriendRequestForMe as $Frequest)
                    <div class="navbar-item ">
                        <div class="is-inline-block is-fullwidth"
                        data-userid="{{ $Frequest->friendDetails->id }}" >

          <a href="#"><img class="is-rounded" src="{{ asset('img/profilePhoto/'.$Frequest->friendDetails->photo) }}"alt="Profile Picture" width="50" height="50" > </a>
          <a href="#"> {{ $Frequest->friendDetails->name }}</a>
            <div  data-userid="{{ $Frequest->friendDetails->id }}" >
                    <a class="button is-small button is-info friendRrequest">Confirm</a>
                  <a class="button is-small button is-danger friendRrequest">Delete</a>
              </div>
                      </div>
                          </div>
                        @endforeach
            @if (Auth::user()->sentFriendRequestForMe->count() == 0)
                           You Don't have any Friend Request
                       @endif


                  </div>
                                    </div>

                              <!-- New -->
                                <div class="navbar-item has-dropdown is-hoverable">


                                    <a class="navbar-link" href="#">{{ Auth::user()->name }}</a>

                                    <div class="navbar-dropdown">
                                      <a class="navbar-item" href="{{ route('home') }}">
                                          Profile
                                      </a>
                                        <a class="navbar-item" href="{{ route('logout') }}"
                                           onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>


                                        <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                              style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </nav>
            @yield('content')
        </div>


        <!-- Scripts -->




      <!-- <script src = "http://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js" defer ></script> -->
        <!-- Start datpickr/ -->
          <!-- <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js" ></script> -->

          <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/js/bootstrap-datepicker.js" ></script> -->
            <!-- end of datpickr/ -->

          <!-- jqueryUI for Date Picker-->
          <!-- <script src="//code.jquery.com/jquery-1.10.2.js"></script>
          <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script> -->
          <script src="{{ asset('js/app.js') }}"></script>
          <!-- <script src="{{ asset('js/bootstrap.js') }}"></script> -->
        <script src="{{ asset('js/Mymain.js')}}"></script>
        <!-- datatable -->



    </body>
</html>
