<?php

namespace App\Http\Controllers;

use App\Models\ModelProduct;
use Illuminate\Http\Request;

class SearchController extends FrontController
{
    public function index(Request $request)
    {
        $products=new ModelProduct();

        $productname=$request->input('searchproduct');

        $productsbysearch=$products->getProductBySearchName($productname);

        $this->data['products']=$productsbysearch;

        return view('pages/search',$this->data);
    }
}
