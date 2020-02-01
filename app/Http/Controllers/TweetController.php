<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
Use DB;

class TweetController extends Controller
{
    function show(){
        if(Auth::check()) {
        $result = \App\Tweet::all();
        return view('profile', ['tweets' => $result]);
    } else {
        return view('post');
    }
}

    function CreateTweet(Request $request){
        $validate = $request->validate([
            'content'=> 'required|min:10|max:150',
            'author'=>'requried|min:3|max:30',]);

      if(Auth::check()){
        $tweets = new\App\Tweet;
        $tweets->author =$request->author;
        $tweets->content =$request->content;
        $tweets->save();
     }  return redirect('profile');
    }



 }

    function DeleteTweet(Request $request){
        $id = $request->id;
       if(Auth::check()) {
       $tweets = \App\Tweet::find($id);
       $tweets->delete();
       $result = \App\Tweet::all();
       return redirect('profile');
       }

    }

    function EditTweet(Request $request){
       // $id = $request->id;
        if(Auth::check()) {
      \App\Tweet::where('id', $request->id)->update(
          ['author'=> $request->author,
           'content'=> $request->content]);
        $result = \App\Tweet::all();
    }
        return redirect('profile');
    }




   //display all tweets

//     function CreateTweet(Request $request) {
//        if(Auth::check())
//    }



