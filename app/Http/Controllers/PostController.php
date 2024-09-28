<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller implements HasMiddleware
{

    //enforce middleware
    public static function middleware():array{
        return [
           // new Middleware('auth',only:['store','show','edit','update','destroy'])
           new Middleware('auth',except:['index','show']),
        ];
    }








    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //grab all the posts from the db
        //order by the created_At dates in descending order
        // $posts = Post::oderBy('created_at', 'desc')->get();

        //$post = Post::latest()->get();

        $post = Post::latest()->paginate(6);

        //return the index page
        return view('posts.index', ['posts' => $posts]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         //validate
         $fields = $request->validate([
            'title' =>[ 'required','max:255'],
            'body' => ['required'],
        ]);
        //create a new post
        //create a post for the authenticated user
        Auth::user()->posts()->create($fields);

        //redirect users to their dashboards with success message
        return back()->with('success','Your post was created');

    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
       //

       return view('posts.show',['post' => $post]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        //Add authorization for this method

        Gate::authorize('modify',$post);
        //



         //validate
         $fields = $request->validate([
            'title' =>[ 'required','max:255'],
            'body' => ['required'],
        ]);
       
        //update the poost
        $post->update($fields);

        //redirect users to their dashboards with success message
        return redirect()->route('dashboard')->with('success','Your post was updated');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        //
          //Add authorization for this method

          Gate::authorize('modify',$post);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
          //Add authorization for this method

          Gate::authorize('modify',$post);
        //receives an independent post object
        $post->delete();

        //REDIRECT BACK TO THE DASHBOARD WITH A SUCCESS MESSAGE
        return back()->with('delete','Your post was deleted!');

    }
}
