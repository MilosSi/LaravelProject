<?php

namespace App\Http\Controllers;

use App\Models\ModelOurteam;
use Illuminate\Http\Request;

class OurteamController extends FrontController
{
    public function index()
    {
        $ourteam=new ModelOurteam();
        $this->data['team']=$ourteam->getAllTeam();
        return view('pages/ourteam',$this->data);
    }
}
