<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index(){
//        $posts = Post::where('user_ide',Auth::id())->get(); // first way
//        $posts = Auth::user()->posts(); // second way,this gives relation, it use the function in relationship
//        $posts = Auth::user()->posts; this gives the collection
        $posts = Auth::user()->posts()->latest()->paginate(6);
        return view('users.dashboard',['posts'=>$posts]);
    }

    public function userPosts(User $user){
        $userPosts = $user->posts()->latest()->paginate(6);
        return view('users.posts',[
            'posts'=>$userPosts,
            'user'=>$user
        ]);
    }
}
