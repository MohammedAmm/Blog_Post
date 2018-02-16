@extends('layouts.master')
@section('sidebar')
    <p>This is appended to the master sidebar.</p>
@stop
@section('content')
	@foreach($users as $user)
        {{$user->fname}}
        <br>
    @endforeach
@stop