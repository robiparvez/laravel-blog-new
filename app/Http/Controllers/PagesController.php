<?php

namespace App\Http\Controllers;

class PagesController extends Controller
{
    public function getIndex()
    {
        # process variables or data
        # talk to the model
        # receive data back data from the model
        # compile or process data from the model, if needed
        # pass the data to the correct view

        return view('pages.welcome');
    }

    public function getAbout()
    {
        $firstname = 'Robi';
        $lastname  = 'Parvez';
        $totalname  = $firstname ." " . $lastname;
        $myemail = 'parvezrobi@yahoo.com';

        $data = [];
        $data['fullname'] = $totalname;
        $data['email'] = $myemail;

        // //with_syntax-1
        // return view('pages.about')->with('fullname',$totalname);

        // //with_syntax-2
        // return view('pages.about')->withFullname($totalname)->withEmail($myemail);//withEmail  => although here it is "Capital (E)", in view file, it must be "Small (e)"

        /**
         *
         */
        //with_using array
        return view('pages.about')->withData($data);


        return view('pages.about');
    }

    public function getContact()
    {
        return view('pages.contact');
    }

    // public function index()
    // {
    //     //
    // }

    // public function create()
    // {
    //     //
    // }

    // public function store(Request $request)
    // {
    //     //
    // }

    // public function show($id)
    // {
    //     //
    // }

    // public function edit($id)
    // {
    //     //
    // }

    // public function update(Request $request, $id)
    // {
    //     //
    // }

    // public function destroy($id)
    // {
    //     //
    // }

}
