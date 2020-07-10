<?php

namespace App\Http\Controllers;

use App\Models\ModelCollections;
use App\Models\ModelGender;
use Illuminate\Http\Request;

class AllProductsController extends FrontController
{
    public function index()
    {
        $collections=new ModelCollections();
        $genders=new ModelGender();
        $this->data['collections']=$collections->getCollections(2,0,'c.created_at','desc');
        $this->data['gender']=$genders->getGenders();
        $this->data['allcolections']=$collections->getCollections();

//        dd( $this->data['allcolections']);

        return view('pages/allproducts',$this->data);
    }
}
