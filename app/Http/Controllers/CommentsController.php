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
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
