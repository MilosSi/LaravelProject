<?php

namespace App\Http\Controllers;

use App\Models\ModelCategory;
use App\Models\ModelGender;
use App\Models\ModelProduct;
use App\Models\ModelSizes;
use Illuminate\Http\Request;

class ShopControler extends FrontController
{
    public function index($id)
    {
        $numberOfProd=9;
        $products=new ModelProduct();
        $genders=new ModelGender();
        $categories=new ModelCategory();
        $sizes=new ModelSizes();
        $mainCategories=$categories->getMainCategoriesByGender();
        $dataCategories=[];
        foreach ($mainCategories as $mc)
        {
            if($mc->id_gender==$id)
            {
                $dataCategories[$mc->cat_name]=$categories->getSubCategoryByIdAndGender($mc->main_cat_id,$id);
            }
        }

        $this->data['nop']=$numberOfProd;
        $this->data['subCategories']=$dataCategories;

        $this->data['sizes']=$sizes->getAllSizes();
        $this->data['pagination']=$products->getAllProductByGenderPagination($id,$numberOfProd);
        $this->data['gender']=$genders->getGendersById($id);
        $this->data['genderId']=$id;


//        dd($products->getProductById(3));

        return view('pages/shop',$this->data);
    }
}
