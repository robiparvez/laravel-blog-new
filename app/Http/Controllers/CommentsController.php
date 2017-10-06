<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Post;
use Illuminate\Http\Request;
use Session;

class CommentsController extends Controller
{
    public function index()
    {
        //
    }

    public function create()
    {
        //
    }

    public function store(Request $request, $post_id)
    {
        $this->validate($request, [
            'name'    => 'required|min:2|max:255',
            'email'   => 'required|max:255',
            'comment' => 'required|min:6|max:2000',
        ]);

        $post_id_store = Post::find($post_id);
        // $post_id_store = Post::all();

        $comment_store = new Comment();

        $comment_store->name    = $request->name;
        $comment_store->email   = $request->email;
        $comment_store->comment = $request->comment;

        $comment_store->approved = true;

        $comment_store->post()->associate($post_id_store);

        $comment_store->save();

        $request->session()->flash('success', 'Comment successfully added!');

        return redirect()->route('blog.single', [$post_id_store->slug]);

    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $cmnt = Comment::find($id);

        return view('comments.edit')->withCmnt($cmnt);
        //
    }

    public function update(Request $request, $id)
    {
        $comment_update = Comment::find($id);

        $this->validate($request, [
            'comment' => 'required|min:6|max:2000',
        ]);

        $comment_update->comment = $request->comment;

        $comment_update->save();

        $request->session()->flash('success', 'Comment Updated!');

        return redirect()->route('posts.show', $comment_update->post->id);
    }

    public function delete($id)
    {
        $cmntDelete = Comment::find($id);

        return view('comments.delete')->withCmntDelete($cmntDelete);
    }

    public function destroy($id)
    {
        $cmntDestroy = Comment::find($id);

        $post_del_id = $cmntDestroy->post->id;

        $cmntDestroy->delete();

        Session::flash('Deleted', 'Comment Deleted!');

        return redirect()->route('posts.show', $post_del_id);
    }
}
