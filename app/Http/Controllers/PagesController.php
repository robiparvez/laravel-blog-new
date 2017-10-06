<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use Mail;

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
        $totalname = $firstname . " " . $lastname;
        $myemail   = 'parvezrobi@yahoo.com';

        $phone ='01521108069';

        $data             = [];
        $data['fullname'] = $totalname;
        $data['email']    = $myemail;
        $data['phone']    = $phone;

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
        $this->validate($request, [
            'email'   => 'required|email',
            'subject' => 'min:4',
            'message' => 'min:10',
        ]);

        $mail_data = array(
            'email'        => $request->email,
            'subject'      => $request->subject,
            'mail_message' => $request->message,
            //Can't use 'message' as it is a reserved variable in laravel
        );

        Mail::send('emails.contact', $mail_data, function ($message) use ($mail_data)
        {

            $message->from($mail_data['email']);

            $message->to('parvezrobi@yahoo.com');

            $message->subject($mail_data['subject']);

            // $m->sender('robilovestulie@gmail.com');

            // $m->cc('john@johndoe.com', 'John Doe');
            // $m->bcc('john@johndoe.com', 'John Doe');

            // $m->replyTo('john@johndoe.com', 'John Doe');

            // $m->priority(3);

            // $message->attach('pathToFile');
        });

        $request->session()->flash('success', 'Mail sent successfully');

        return redirect()->route('home');

    }

}
