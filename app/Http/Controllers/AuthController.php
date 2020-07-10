<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuthRequest;
use App\Http\Requests\LoginRequest;
use App\Models\ModelAuth;
use Illuminate\Http\Request;

class AuthController extends FrontController
{
    public function index()
    {
        return view('pages/loginregister',$this->data);
    }

    public function register(AuthRequest $request)
    {
        $auth=new ModelAuth();
        if($auth->register($request))
        {
            return \redirect('/loginregister')->with('success','You have been registerd');
        }
        else
        {
            return \redirect('/')->with('error','Ups! Something went wrong !');
        }
    }

    public function login(LoginRequest $request)
    {
        $auth=new ModelAuth();
        $user=$auth->login($request);
        if($user)
        {
            $request->session()->put('user',$user);
            return \redirect('/loginregister')->with('success','You have been logged in');
        }
        else
        {
            return \redirect('/')->with('error','Wrong email or password !');
        }
    }
    public function logout(Request $request)
    {
        $request->session()->forget("user");
        $request->session()->flush();
        return \redirect('/')->with("success","Loged out");
    }
}
