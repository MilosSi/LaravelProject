<?php

namespace App\Http\Controllers;

use App\Models\ModelCategory;
use App\Models\ModelPicture;
use App\Models\ModelProduct;
use App\Models\ModelSizes;
use App\Models\ModelTags;
use Illuminate\Http\Request;

class ProductController extends FrontController
{
    public function index($id)
    {
        $products=new ModelProduct();
        $pictures=new ModelPicture();
        $tags=new ModelTags();
        $categories=new ModelCategory();
        $sizes=new ModelSizes();

        $this->data['sizes']=$sizes->getProductSizes($id);
        $this->data['product']=$products->getProductById($id);
        $this->data['pictures']=$pictures->getAllPictureByProductId($id);
        $this->data['tags']=$tags->getAllTagsByProductId($id);
        $this->data['mainCat']=$categories->getCategoryById($this->data['product']->main_cat_id);
        $this->data['subCat']=$categories->getCategoryById($this->data['product']->id_category);

        $this->data['relatedPro']=$products->getAllProductByCategory($this->data['product']->idCategory,4,0);

        //dd($this->data['product']);
        return view('pages/product',$this->data);
    }
}
