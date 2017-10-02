<?php

namespace App\Http\Controllers;

use App\Category;
use App\Post;
use App\Tag;
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
        $tags       = Tag::all();

        //return create view
        return view('posts.create')->withCategories($categories)->withTags($tags);
    }

    public function store(Request $request)
    {

        // dd($request);

        //Validate the data
        $this->validate($request, [
            'title'       => 'required|max:255',
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

        //many-to-many relationship syncing
        $post->tags()->sync($request->tags, false);

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

        //assoc array of category for using in view
        $categories = Category::all();
        $cat_array  = array();
        foreach ($categories as $category)
        {
            $cat_array[$category->id] = $category->name;
        }

        $tags = Tag::all();
        //assoc array of tags for using in view
        $tags_array = array();
        foreach ($tags as $tag)
        {
            $tags_array[$tag->id] = $tag->name;
        }

        //return a view, along with the created variable in the above.
        return view('posts.edit')->with('post', $post)->withCategories($cat_array)->withTags($tags_array);
    }

    public function update(Request $request, $id)
    {
        $post = Post::find($id);

        if ($request->input('slug') == $post->slug)
        {
            //Validate the data, with slug
            $this->validate($request, [
                'title' => 'required|max:255',
                'body'  => 'required',
            ]);
        }
        else
        {
            //Validate the data, without slug
            $this->validate($request, [
                'title'       => 'required|max:255',
                'body'        => 'required',
                'category_id' => 'required|integer',
                'slug'        => 'required|unique:posts,slug|alpha_dash|min:5|max:255',
            ]);

        }
        //Find Data
        $post              = Post::find($id);
        $post->title       = $request->input('title');
        $post->body        = $request->input('body');
        $post->slug        = $request->input('slug');
        $post->category_id = $request->input('category_id');
        $post->save();

        //Checks whether a tag is empty or not
        if (isset($request->tags))
        {
            //many-to-many relationship syncing
            $post->tags()->sync($request->tags, true);
        }
        else
        {
            $post->tags()->sync(array());
        }

        //Flash Message
        $request->session()->flash('update', 'Post Successfully Updated!');

        //Redirect page
        return redirect()->route('posts.show', $post->id);
    }

    public function destroy($id)
    {
        //find the post in the db and save it as a var.
        $post = Post::find($id);

        $post->tags()->detach();

        $post->delete();

        //Flash Message [can't use $request here]
        Session::flash('Delete', 'Post Successfully Deleted!');

        //Redirect page
        return redirect()->route('posts.index');
    }
}
