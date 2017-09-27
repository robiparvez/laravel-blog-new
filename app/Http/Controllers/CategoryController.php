<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Category;

class CategoryController extends Controller
{
    //Lock down this controller so that the authorized user can access this controller, using middleware
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        //Display a view of all of our categories
        //All a form to create a new category, so, no need to use create function

        $categories = Category::all();
        return view('categories.index')->withCategories($categories);
    }


    public function store(Request $request)
    {
        //Save a new category and redirect to index

        //Store method with validation
        //
        $this->validate($request, array(
            'name' =>'required|max:255'
        ));


        $category_store = new Category;
        $category_store->name = $request->name;
        $category_store->save();

        $request->session()->flash('success', 'Category successfully created!');
        return redirect()->route('categories.index');

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

    public function destroy($id)
    {
        //
    }
}
    // public function create()
    // {
    //     //
    // }
