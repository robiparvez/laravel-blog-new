<?php

namespace App\Http\Controllers;

use App\Tag;
use App\Category;
use App\Post;
use Illuminate\Http\Request;

use Session;

class TagsController extends Controller
{

    public function __construct()
    {
        return $this->middleware('auth');
    }

    public function index()
    {
        $tags = Tag::all();

        return view('tags.index')->withTags($tags);

    }

    public function store(Request $request)
    {
        $this->validate($request, array([
            'name' => 'required|max:100',
        ]));

        //For store, we need to instantiate only
        $tags       = new Tag();
        $tags->name = $request->name;
        $tags->save();

        $request->session()->flash('success', 'Tags created successfully');

        return redirect()->route('tags.index');
    }

    public function show($id)
    {
        $tag = Tag::find($id);
        return view('tags.show')->withTag($tag);
    }

    public function edit($id)
    {
        $tags_edit = Tag::find($id);
        return view('tags.edit')->withTags_edit($tags_edit);
    }

    public function update(Request $request, $id)
    {
        $tags_update = Tag::find($id);

        $this->validate($request, array(
            'name' => 'required|max:100',
        ));

        //For store, we don't need to instantiate only
        $tags_update->name = $request->name;
        $tags_update->save();

        $request->session()->flash('success', 'Tag updated successfully');

        return redirect()->route('tags.show', $tags_update->id);
    }

    public function destroy($id)
    {
        $tags_delete = Tag::find($id);

        $tags_delete->posts()->detach();

        $tags_delete->delete();

        Session::flash('Deleted', 'Tag deleted successfully');

        return redirect()->route('tags.index');

    }
}
