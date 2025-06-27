<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index(){
//        $posts = Post::where('user_ide',Auth::id())->get(); // first way
//        $posts = Auth::user()->posts(); // second way, it use the function in relationship
//        $posts = Auth::user()->posts;
        $posts = Auth::user()->posts()->latest()->paginate(6);
        return view('users.dashboard',['posts'=>$posts]);
    }
}
