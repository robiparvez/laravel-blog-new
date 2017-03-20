<?php


namespace App\Http\Controllers;
use Illuminate\Http\Request;

use Session;
use App\Post;

class PostController extends Controller
{
    public function index()
    {
        //create a variable and store all the blog posts in it from the database

        // $posts = Post::all();
        // $posts = Post::paginate(5);
        $posts = Post::orderBy('id', 'asc')->paginate(5);

        //return a view and pass in the above variable
        return view('posts.index')->with('posts',$posts);
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store(Request $request)
    {
        //Validate the data
        $this->validate($request, [
            'title' => 'required|unique:posts|max:255',
            'body'  => 'required',
        ]);

        //store data in database
        $post = new Post;
        $post->title = $request->title;
        $post->body = $request->body;
        $post->save();

        //Flash Message
        $request->session()->flash('success', 'Post is Successfully Saved!');

        //Redirect page
        return redirect()->route('posts.show', $post->id);
    }

    public function show($id)
    {
        //find the post in the db and save it as a var.
        $post = Post::find($id);

         //return a view, along with the created variable in the above.
        return view('posts.show')->with('post',$post);

    }

    public function edit($id)
    {
        //find the post in the db and save it as a var.
        $post = Post::find($id);

        //return a view, along with the created variable in the above.
        return view('posts.edit')->with('post',$post);
    }

    public function update(Request $request, $id)
    {
        //Validate the data
        $this->validate($request, [
            'title' => 'required|unique:posts|max:255',
            'body'  => 'required',
        ]);

        //Find Data
        $post = Post::find($id);

        $post->title = $request->input('title');
        $post->body = $request->input('body');
        $post->save();

        //Flash Message
        $request->session()->flash('update', 'Post Successfully Updated!');


        //Redirect page
        return redirect()->route('posts.show', $post->id);
    }

    public function destroy($id)
    {
        //find the post in the db and save it as a var.
        $post = Post::find($id);
        $post->delete();

        //Flash Message [can't use $request here]
        Session::flash('delete', 'Post Successfully Deleted!');

        //Redirect page
        return redirect()->route('posts.index');
    }
}
