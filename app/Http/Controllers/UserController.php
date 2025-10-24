<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(Request $request){
        if($request->user()->user_type=='user'){
            return view('dashboard');
        }
        else{
            return redirect()->route('admin.dashboard');
        }
        
    }

    public function home(Request $request){
        if($request->user()->user_type=='admin'){
            return view('admin.dashboard');
        }
        else{
            return redirect()->route('dashboard');
        }
    }

    public function homepage(){
        $posts=Post::all();
        return view('home',['posts'=>$posts]);
    }


    public function postDetail($id){
        $post=Post::findOrFail($id);
        return view('postdetail',['post'=>$post]);
    }





}
