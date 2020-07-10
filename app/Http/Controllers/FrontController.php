<?php

namespace App\Http\Controllers;

use App\Models\ModelCollections;
use App\Models\ModelGender;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    protected $data=[];

    public function __construct()
    {
        $collections=new ModelCollections();
        $gender=new ModelGender();

        $this->data['menuGender']=$gender->getGenders();

        $this->data['menuCollection']=$collections->getCollections(3,0,'c.created_at','desc');

    }
}
