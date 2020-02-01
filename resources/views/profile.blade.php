@extends('layouts.app')

@section('content')
@guest
<p> Please login to see Tweets </p>
@else
<h1> Welcome {{Auth::user()->name}}</h1>
<br><br>

@foreach ($tweets as $tweet)
    <p>{{ $tweet->content }}</p>
    <p><strong>{{ $tweet->author }}</strong></p>
    <br>

    @if (Auth::user()->name == $tweet->author)
    <form action="profile/delete" method="post">
        @csrf
        <input type= "hidden" name="id" type="submit" value="{{ $tweet->id }}">
        <input type="submit" value="Delete post">
    </form>
    <br>
    @endif
    @endforeach



<form action="/profile" method="post">
    @csrf
    <p> New post </p>
    <input type="hidden" name="author" value="{{Auth::user()->name}}">
    <input type="text" name="content" value='content'>
    <input type="submit" value="Create Tweet">
</form>
@endguest
@endsection
