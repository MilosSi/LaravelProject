<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends FrontController
{
    public function aboutus()
    {
        return view('pages/aboutus',$this->data);
    }

    public function contactus()
    {
        return view('pages/contactus',$this->data);
    }
    public function wishlist()
    {
        return view('pages/wishlist',$this->data);
    }
    public function cart()
    {
        return view('pages/cart',$this->data);
    }
    public function myaccount()
    {
        return view('pages/myaccount',$this->data);
    }
    public function author()
    {
        return view('pages/author',$this->data);
    }

    public function message(Request $request)
    {
        $request->validate([
            "name"=>"required",
            "email"=>"required|email",
            "phone"=>"required",
            "message"=>"required",
        ]);

        // Get the form fields and remove whitespace.
        $name = strip_tags(trim($request->input('name')));
        $name = str_replace(array("\r","\n"),array(" "," "),$name);
        $email = $request->input('email');
        $phone = trim($request->input('phone'));
        $message = trim($request->input('message'));


        // Set the recipient email address.
        // FIXME: Update this to your desired email address.
        $recipient = "milossimicbz@gmail.com";

        // Set the email name.
        $subject = "$name";

        // Build the email content.
        $email_content = "Name: $name\n";
        $email_content .= "Email: $email\n\n";
        $email_content .= "Phone: $phone\n\n";
        $email_content .= "Message:\n$message\n";

        // Build the email headers.
        $email_headers = "From: $name <$email>";

//        // Send the email.
//        if (mail($recipient, $name, $email_content, $email_headers)) {
//            return \redirect('/admin/newsletter')->with('success','Messages sent ');
//        } else {
//            return \redirect('/admin/newsletter')->with('success','Messages failed ');
//        }
        return \redirect('/admin/newsletter')->with('success','Messages sent ');
    }
}
