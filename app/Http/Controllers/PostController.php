<?php

namespace App\Http\Controllers;
use App\Category;
use App\Post;
use Illuminate\Http\Request;
use Session;

class PostController extends Controller
{
    public function index()
    {
        //create a variable and store all the blog posts in it from the database

        // $posts = Post::all();
        // $posts = Post::paginate(5);
        $posts = Post::orderBy('id', 'asc')->paginate(5);

        //return a view and pass in the above variable
        return view('posts.index')->with('posts', $posts);
    }

    public function create()
    {
        $categories = Category::all();

        //return create view
        return view('posts.create')->withCategories($categories);
    }

    public function store(Request $request)
    {
        //Validate the data
        $this->validate($request, [
            'title'       => 'required|unique:posts,title|max:255',
            'body'        => 'required',
            'category_id' => 'required|integer',
            'slug'        => 'required|unique:posts,slug|alpha_dash|min:5|max:255',
        ]);

        //store data in database
        $post              = new Post();
        $post->title       = $request->title;
        $post->body        = $request->body;
        $post->slug        = $request->slug;
        $post->category_id = $request->category_id;
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
        return view('posts.show')->with('post', $post);

    }

    public function edit($id)
    {
        //find the post in the db and save it as a var.
        $post = Post::find($id);

        $categories = Category::all();

        $cat_array = array();
        foreach ($categories as $category) {
                $cat_array[$category->id] = $category->name;
        }

        //return a view, along with the created variable in the above.
        return view('posts.edit')->with('post', $post)->withCategories($cat_array);
    }

    public function update(Request $request, $id)
    {
        $post = Post::find($id);

        if ($request->input('slug') == $post->slug)
        {
            //Validate the data, with slug
            $this->validate($request, [
                'title' => 'required|unique:posts,title|max:255',
                'body'  => 'required',
            ]);
        }
        else
        {
            //Validate the data, without slug
            $this->validate($request, [
                'title' => 'required|unique:posts,title|max:255',
                'body'  => 'required',
                'slug'  => 'required|unique:posts,slug|alpha_dash|min:5|max:255',
            ]);

        }
        //Find Data
        $post = Post::find($id);

        $post->title = $request->input('title');
        $post->body  = $request->input('body');
        $post->slug  = $request->input('slug');
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
