
@extends('layouts.app')

@section('content')
@guest
        <p>No Tweets available! </p>
    @else
        <h1>Welcome {{ Auth::user()->name }}</h1>

        <p>Edit Post!</p>
        <br><br>

<form action="/profile/edit" method="post">
    @csrf
  <label type="text" name="content" value="{{$tweet->content}}">
  <label type="text" name="author" value="{{Auth::user()->name }}">
  <button type="submit" name="id" value="{{$tweet->id}}">"Edit Tweet"</button>
</form>

    @endguest
@endsection
