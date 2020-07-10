<?php

namespace App\Http\Controllers;

use App\Models\ModelProduct;
use Illuminate\Http\Request;

class CollectionsController extends FrontController
{
    public function index($id)
    {
        $products=new ModelProduct();
        $this->data['products']=$products->getAllProductsByCollection($id);


        return view('pages/collections',$this->data);

    }
}
