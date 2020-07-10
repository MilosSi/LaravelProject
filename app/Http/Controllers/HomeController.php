<?php

namespace App\Http\Controllers;

use App\Models\ModelCategory;
use App\Models\ModelCollections;
use App\Models\ModelGender;
use App\Models\ModelProduct;

use Illuminate\Http\Request;

class HomeController extends FrontController
{
    public function index()
    {

        $products=new ModelProduct();
        $categories=new ModelCategory();
        $genders=new ModelGender();
        $collections=new ModelCollections();
        $this->data['collections']=$collections->getCollections(3,0,'c.created_at','desc');
        $this->data['mainCatGen']=$categories->getMainCategoriesByGender();

        $this->data['gender']=$genders->getGenders();
        $this->data['categories']=$categories;
        $this->data['products']=$products;


        $this->data['featuredProducts']=$products->getAllFeaturedProducts(8,0);
        $this->data['newProducts']=$products->getAllNewProducts(8,0);

        $this->data['specialPMain']=$products->getSpecialProduct(1);
        $this->data['specialPSecond']=$products->getSpecialProduct(null);



        return view('pages/home',$this->data);


    }
}
