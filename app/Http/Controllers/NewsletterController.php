<?php

namespace App\Http\Controllers;

use App\Http\Requests\NewsletterRequest;
use App\Models\ModelNewsletter;
use Illuminate\Http\Request;

class NewsletterController extends Controller
{
    public function store(NewsletterRequest $request)
    {
        $email=$request->input('email');
        $newsletter=new ModelNewsletter();

        $check=$newsletter->getEmail($email);

        if($check==null)
        {
            if($newsletter->insert($email))
            {
                return \redirect('/')->with('success','Your email has been added to newsletter');
            }
            else
            {
                return \redirect('/')->with('error','Ups! Something went wrong !');
            }
        }
        else
        {
            return \redirect('/')->with('error','Your email is already stored for newsletter');
        }
    }
}
