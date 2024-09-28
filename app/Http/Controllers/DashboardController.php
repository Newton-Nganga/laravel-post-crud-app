<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Support\Facades\Auth;
use App\Models\Post;
use App\Models\User;
class DashboardController extends Controller
{
    //
    /**
     * Get the middleware that should be assigned to the controller.
     */
    // public static function middleware(): array
    // {
    //     return [
    //         'auth'
    //     ];
    // }


    public function index(Request $request)
    {
        //$posts =  Post::where('user_id',Auth::id())->get();
        //or 
        $posts = Auth::user()->posts()->latest()->paginate(6);

        return view('users.dashboard',['posts' => $posts]);
    }

    public function usersPosts(User $user){

        //grab the user's posts from the most recent of them
        $userPosts = $user->posts()->latest()->paginate(6);

        return view('users.posts',['posts' => $userPosts,'user' => $user]);
    }
}
