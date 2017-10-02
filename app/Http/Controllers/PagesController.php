<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Post;


class PagesController extends Controller
{
    public function getIndex()
    {
        # process variables or data

        # talk to the model

        # receive data back data from the model

        # compile or process data from the model, if needed

        # pass the data to the correct view


        $posts = Post::orderBY('created_at', 'desc')->limit(3)->get();
        return view('pages.welcome')->with('posts', $posts);
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

        // return view('pages.about');
    }

    public function getContact()
    {
        return view('pages.contact');
    }


    public function postContact(Request $request)
    {
        $this->validate($request,array([
            'email' => 'required|email',
            'subject' => 'min:4',
            'message' => 'max:10'
        ]));


        Mail::send('emails.contact', $data, function ($message) {
            $message->from('john@johndoe.com', 'John Doe');
            $message->sender('john@johndoe.com', 'John Doe');

            $message->to('john@johndoe.com', 'John Doe');

            $message->cc('john@johndoe.com', 'John Doe');
            $message->bcc('john@johndoe.com', 'John Doe');

            $message->replyTo('john@johndoe.com', 'John Doe');

            $message->subject('Subject');

            $message->priority(3);

            $message->attach('pathToFile');
        });




    }

}
