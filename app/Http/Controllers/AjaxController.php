<?php

namespace App\Http\Controllers;

use App\Models\ModelCategory;
use App\Models\ModelCollections;
use App\Models\ModelPicture;
use App\Models\ModelProduct;
use App\Models\ModelTags;
use App\Services\ServiceFunctions;
use Illuminate\Http\Request;

class AjaxController extends Controller
{
    public function quickview(Request $request)
    {
        $tags=new ModelTags();

        $product=new ModelProduct();
        $idProizvoda=$request->input('id');

        $proizvod=$product->getProductById($idProizvoda);

        $data['product']=$proizvod;
        $data['tags']=$tags->getAllTagsByProductId($idProizvoda);
        return json_encode($data);
    }

    public function category(Request $request)
    {
        $product=new ModelProduct();
        $products=$product->getAllProductByCategory($request->input('idCategory'),6,0);
        return json_encode($products);
    }

    public function wishlist(Request $request)
    {
        $product=new ModelProduct();
        $id=$request->input('id');
        $prod=$product->getProductById($id);

        return json_encode($prod);
    }

    public function productsfilter(Request $request)
    {
        $categories = $request->input('categories');
        $sizes = $request->input('size');
        $min = $request->input('min');
        $max = $request->input('max');
        $limit = $request->input('limit');
        $offset = $request->input('offset');

        $sort=$request->input('sort');
        $orderby='';
        $ordertype='';

        if($sort==1)
        {
            $orderby='p.pro_name';
            $ordertype='ASC';
        }
        elseif ($sort==2)
        {
            $orderby='p.pro_name';
            $ordertype='DESC';
        }
        elseif ($sort==3)
        {
            $orderby='p.created_at';
            $ordertype='DESC';
        }
        elseif ($sort==4)
        {
            $orderby='pr.price';
            $ordertype='ASC';
        }
        else
        {
            $orderby='pr.price';
            $ordertype='DESC';
        }


        $products = new ModelProduct();

        $filerIds = $products->getProductsFilter($categories, $sizes, $min, $max);
        $filter = array();
        foreach ($filerIds as $fi)
        {
            array_push($filter,$fi->id);
        }

        $filterProducts=$products->getProductsByFilterId($filter,$limit, $offset,$orderby,$ordertype);

        return json_encode($filterProducts);
    }


    public function addtocollection(Request $request)
    {
        $collections=new ModelCollections();
        $products=new ModelProduct();


        $idProduct=$request->input('idProduct');
        $idCollection=$request->input('idCollection');
        $date=date('Y-m-d H:i:s');

        $dataProCol['id_product']=$idProduct;
        $dataProCol['id_collection']=$idCollection;
        $dataProCol['created_at']=$date;
        $dataProCol['updated_at']=$date;


        $idProductCollection=ServiceFunctions::insert('products_collections',$dataProCol);

        if($idProductCollection)
        {
            return response(["success" =>"Product added"],200);
        }
        else
        {
            return response(["error" =>"Failed adding"],500);
        }

    }

    public function removefromcollection(Request $request)
    {
        $collections=new ModelCollections();
        $idProduct=$request->input('idProduct');
        $idCollection=$request->input('idCollection');
        $id=$collections->getProductCollection($idProduct,$idCollection)->id;


        if(ServiceFunctions::delete('products_collections',$id))
        {
            return response(["success" =>"Product removed"],200);
        }
        else
        {
            return response(["error" =>"Failed removing"],500);
        }
    }

    public function ajaxaddtags(Request $request)
    {
        $idProduct=$request->input('idProduct');
        $idTag=$request->input('idTag');


        $date=date('Y-m-d H:i:s');

        $dataProCol['id_product']=$idProduct;
        $dataProCol['id_tags']=$idTag;
        $dataProCol['created_at']=$date;
        $dataProCol['updated_at']=$date;

        $idProductCollection=ServiceFunctions::insert('product_tags',$dataProCol);

        if($idProductCollection)
        {
            return response(["success" =>"Product added"],200);
        }
        else
        {
            return response(["error" =>"Failed adding"],500);
        }
    }

    public function ajaxremovefromtag(Request $request)
    {
        $tags=new ModelTags();
        $idProduct=$request->input('idProduct');
        $idTag=$request->input('idTag');
        $id=$tags->getProductTag($idProduct,$idTag)->id;

        if(ServiceFunctions::delete('product_tags',$id))
        {
            return response(["success" =>"Product removed"],200);
        }
        else
        {
            return response(["error" =>"Failed removing"],500);
        }

    }

    public function ajaxshowcategories(Request $request)
    {
        $categories=new ModelCategory();
        $id=$request->input('id');
        $catin=$categories->getSubCategoriesByGenderId($id);
        $data['categoriesin']=$catin;

        $categoriesnotint=array();
        foreach ($catin as $c)
        {
            array_push($categoriesnotint,$c->id_category);
        }
        $catout=$categories->getSubCategoriesNotInGenderId($categoriesnotint);

        $data['categoriesout']=$catout;


        return json_encode($data);

    }

    public function ajaxaddcattogender(Request $request)
    {
        $idGender=$request->input('idGender');
        $idCategory=$request->input('idCategory');
        $date=date('Y-m-d H:i:s');

        $dataCG['id_category']=$idCategory;
        $dataCG['id_gender']=$idGender;
        $dataCG['created_at']=$date;
        $dataCG['updated_at']=$date;

        if(ServiceFunctions::insert('category_gender',$dataCG))
        {
            return response(["success" =>"Product removed"],200);
        }
        else
        {
            return response(["error" =>"Failed removing"],500);
        }
    }


    public function ajaxremovecategorygender(Request $request)
    {
        $idCategory=$request->input('idCategory');
        $idGender=$request->input('idGender');
        $categories=new ModelCategory();

        if(ServiceFunctions::delete('category_gender',$idCategory))
        {
            $catin=$categories->getSubCategoriesByGenderId($idGender);
            return response($catin,200);
        }
        else
        {
            return response(["error" =>"Failed removing"],500);
        }
    }

    public function ajaxstatusorder(Request $request)
    {
        $idOrder=$request->input('idOrder');
        $status=$request->input('status');
        $date=date('Y-m-d H:i:s');

        $dataOrder['processed']=$status;
        $dataOrder['updated_at']=$date;

        if(ServiceFunctions::update('orders',$idOrder,$dataOrder))
        {
            return response(["success" =>"Product removed"],200);
        }
        else
        {
            return response(["error" =>"Product failed"],500);
        }
    }

    public function ajaxchangeprice(Request $request)
    {
        $products=new ModelProduct();

        $idPrice=$request->input('idPrice');
        $idProduct=$request->input('idp');

        $prices=$products->getAllProductPricesById($idProduct);

        $ok=true;
        foreach ($prices as $price) {
            $dataUpd['active']=0;
            $ok=ServiceFunctions::update('prices',$price->id,$dataUpd);
        }


        $dataUpdN['active']=1;
        if(ServiceFunctions::update('prices',$idPrice,$dataUpdN))
        {
            return response(["success" =>"Price updated"],200);
        }
        else
        {
            return response(["error" =>"Price failed"],500);
        }

    }


    public function ajaxchangemainpic(Request $request)
    {
        $pictures=new ModelPicture();


        $idPicture=$request->input('idPic');
        $idProduct=$request->input('idp');

        $allPic=$pictures->getAllPictureByProductId($idProduct);
        $dataUpd['main']=0;
        ServiceFunctions::update('products_pictures',$idProduct,$dataUpd,'id_products');

        $dataUpdN['main']=1;
        if(ServiceFunctions::update('products_pictures',$idPicture,$dataUpdN,"id_pictures"))
        {
            return response(["success" =>"Picture updated"],200);
        }
        else
        {
            return response(["error" =>"Picture failed"],500);
        }
    }

    public function ajaxremoveimage(Request $request)
    {
        $idImage=$request->input('idPicture');
        $idProduct=$request->input('idp');

        if(ServiceFunctions::delete('products_pictures',$idImage,'id_pictures'))
        {
            $pictures= new ModelPicture();
            $picture=$pictures->getPictureById($idImage);
            if(ServiceFunctions::delete('pictures',$idImage))
            {
                unlink(\public_path()."/assets/images/product/".$picture->pic_path);
                return response(["success" =>"Picture deleted"],200);
            }
        }
    }
}
