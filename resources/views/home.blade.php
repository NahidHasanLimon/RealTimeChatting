@extends('layouts.app')
@section('css')
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
    @endsection
@section('content')
        <header class="header">
        <div class="container">
        <div class="header-left">

          <a class="header-item brand" href="#">
            <span class="brand-title">welcome to Real Time Chat Application </span>
          </a>
        </div>

        </div>
        </header>
        <section class="section cards">

        <div class="container">
        <div class="columns is-multiline">
          <a href="{{url('/chat')}}" ><div class="column img1 toaster is-full">
        <p>Group Chat </p>
        </div></a>

          <a href="{{url('/chat')}}" ><div class="column img2 xpro2 is-full">
          <p>Friend List</p>
        </div></a>
       <a href="{{url('/userlist')}}"><div class="column img3 willow is-full">
          <p>Discover People</p>
        </div></a>
          <a href="{{url('/chat')}}" ><div class="column img4 xpro2 is-full">
          <p>Profile</p>
        </div></a>


        </div>
        </div>
        </section>
@endsection
