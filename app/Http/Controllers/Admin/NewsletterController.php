<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Models\ModelNewsletter;
use App\Services\ServiceFunctions;
use Illuminate\Http\Request;

//use PHPMailer\PHPMailer\PHPMailer;
//use PHPMailer\PHPMailer\SMTP;
//use PHPMailer\PHPMailer\Exception;
//
//// Load Composer's autoloader
//require 'vendor/autoload.php';



class NewsletterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $newsletter=new ModelNewsletter();
        $data['newsletter']=$newsletter->getAll();
        //dd(  $data['newsletter']);
        return view('admin/pages/newsletter/newsletter',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
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
        if(ServiceFunctions::delete('newsletter',$id))
        {
            return \redirect('/admin/newsletter')->with('success','Newsletter mail Deleted');
        }
        else
        {
            return \redirect('/admin/newsletter')->with('error','Newsletter mail failed deleting ');
        }
    }

    public function message(Request $request)
    {
        $request->validate([
            "subject"=>"required",
            "message"=>"required",
        ]);
//        $mail = new PHPMailer(true);
//        $newsletter=new ModelNewsletter();
//        $allNews=$newsletter->getAll();
//
//        try {
//            $subject = $request->input('subject');
//            $message=$request->input('message');
//
//            foreach ($allNews as $news)
//            {
//                $to=$news->email;
//                $mail = new PHPMailer(true);
//                $mail->IsSMTP(); // enable SMTP
//                $mail->SMTPDebug = 1; // debugging: 1 = errors and messages, 2 = messages only
//                $mail->SMTPAuth = true; // authentication enabled
//                $mail->SMTPSecure = 'tls'; // secure transfer enabled REQUIRED for Gmail
//                $mail->Host = "smtp.gmail.com";
//                $mail->Port = 587; // or 587
//                $mail->IsHTML(true);
//                $mail->Username = "milossimic1998@gmail.com";
//                $mail->Password = "supertajnalozinka";
//                $mail->SetFrom("no-reply@cactus.rs");
//                $mail->Subject = $subject;
//                $mail->Body = $message;
//                $mail->AddAddress($to);
//
//                if(!$mail->Send()) {
//                    return \redirect('/admin/newsletter')->with('success','Messages sent ');
//                } else {
//                    return \redirect('/admin/newsletter')->with('error','Messages failed sending ');
//                }
//            }
//        } catch (Exception $e) {
//            return \redirect('/admin/newsletter')->with('error','Messages failed sending ');
//        }

        return \redirect('/admin/newsletter')->with('success','Messages sent ');
    }
}
