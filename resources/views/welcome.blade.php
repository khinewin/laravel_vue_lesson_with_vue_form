@extends('layout.template')

@section('title') Welcome Laravel & Vue @stop

@section('content')

       <div id="app">
           @include('nav')
           <router-view></router-view>
       </div>
    @stop