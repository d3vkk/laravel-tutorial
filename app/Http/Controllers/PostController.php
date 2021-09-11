<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//For deleting iamges uploaded
use Illuminate\Support\Facades\Storage;
//Include Post Model using namespaces
use App\Post;
//For using raw SQL statements
use DB;

class PostController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //Restricts access to posts
        //if user is not logged in
        //except for 'index' & 'show' views
        $this->middleware('auth', ['except'=> ['index','show']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Retrieving all database rows with SQL
        // return DB::select('SELECT * FROM posts');

        //Retrieving a database row with Eloquent ORM
        // return Post::where('title', 'Post Two')->get();

        //Fetches all the data
        // $posts = Post::all();

        //Orders by title in descending order
        // $posts = Post::orderBy('title','desc')->get();

        //Orders by title in descending order and limits to only one post
        // $posts = Post::orderBy('title','desc')->take(1)->get();

        //Orders by title in descending order and paginates five per page
        // $posts = Post::orderBy('title','desc')->paginate(5);

        //Orders by created_at in descending order and paginates five per page
        $posts = Post::orderBy('created_at','desc')->paginate(5);
        return view('posts.index')->with('posts', $posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validates required fields
        $this->validate($request, [
            //'required' keyword used for required fields
            'title'=> 'required',
            'body'=> 'required',
            /*
                'image' keyword is used to specify that
                the file type should be that of an image
                i.e. jpg,jpeg,gif,png,e.t.c

                'nullable' keyword is used for optional fields

                'max' keyword is used to set the maximum
                upload size (in KB's) in this case: 2MB's
            */
            'cover_image'=> 'image|nullable|max:1999'
        ]);

        //If image was uploaded
        if ($request->hasFile('cover_image')) {
            //Gets file name plus extension
            $fileNameWithExt = $request->file('cover_image')->getClientOriginalName();

            //Gets file name only
            $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);

            //Gets extension only
            $ext = $request->file('cover_image')->getClientOriginalExtension();

            //Concatenates inserting the timestamp
            $fileNameToStore = $fileName.'_'.time().'.'.$ext;

            //Uploads image to '/storage/app/public/cover_images'
            $path = $request->file('cover_image')->storeAs('public/cover_images', $fileNameToStore);
        } else{
            //Will show a default image
            //if nothing was uploaded
            $fileNameToStore = 'noimage.png';
        }

        //Create and store Post
        $post = new Post;

        //the variable 'request' is used to retrieve the
        //submitted form fields
        $post->title = $request->input('title');
        $post->body = $request->input('body');

        //Retrieves user_id from the user table
        $post->user_id = auth()->user()->id;
        $post->cover_image = $fileNameToStore;
        $post->save();

        //redirects page to route: 'posts', sending a session 'success'
        //with content: 'Post created'
        return redirect('/posts')->with('success','Post Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);
        return view('posts.show')->with('post', $post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);
        //Restricts editing of posts
        //if the user's id does
        //not match the post's
        if (auth()->user()->id !== $post->user_id) {
            return redirect('/posts')->with('error', 'Unauthorized Page');
        }
        return view('posts.edit')->with('post', $post);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate(
            $request, [
                'title'=> 'required',
                'body'=> 'required',
                'cover_image'=> 'image|nullable|max:1999'
            ]
        );

        if ($request->hasFile('cover_image')) {
            $fileNameWithExt = $request->file('cover_image')->getClientOriginalName();
            $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            $ext = $request->file('cover_image')->getClientOriginalExtension();
            $fileNameToStore = $fileName.'_'.time().'.'.$ext;
            $path = $request->file('cover_image')->storeAs('public/cover_images', $fileNameToStore);
        }

        //Update post by id
        $post = Post::find($id);
        $post->title = $request->input('title');
        $post->body = $request->input('body');
        //Only saves if image was uploaded
        if ($request->hasFile('cover_image')) {
            $post->cover_image = $fileNameToStore;
        }
        $post->save();
        return redirect('/posts')->with('success','Post Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);
        //Restricts deleting of posts
        //if the user's id does
        //not match the post's
        if (auth()->user()->id !== $post->user_id) {
            return redirect('/posts')->with('error', 'Unauthorized Page');
        }

        //Delete image if it was uploaded
        if ($post->cover_image != 'noimage.png') {
            Storage::delete(['public/cover_images/'.$post->cover_image]);
        }

        $post->delete();
        return redirect('/posts')->with('success','Post Removed');
    }
}
