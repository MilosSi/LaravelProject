<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ModelCategory;
use App\Models\ModelCollections;
use App\Models\ModelPicture;
use App\Models\ModelProduct;
use App\Models\ModelSizes;
use App\Models\ModelTags;
use App\Services\ServiceFunctions;
use App\Services\ServiceUpload;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products=new ModelProduct();
        $data['products']=$products->getAllProduct();
        $data['special_main']=$products->getSpecialProduct(1);
        $data['special_second']=$products->getSpecialProduct(null);

        //dd($data['special_main']);
        return view('admin/pages/products/products',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $sizes=new ModelSizes();
        $category=new ModelCategory();
        $tags=new ModelTags();
        $data['tags']=$tags->getAllTags();

        $data['sizes']=$sizes->getAllSizes();
        $data['categories']=$category->getAllCategoryGender();
        return view('admin/pages/products/productscreate',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        $request->validate([
            "pro_name"=>"required",
            "sizes"=>"required",
            "price"=>"required|numeric",
            "pro_desc"=>"required",
            "main_pic" => "required|mimes:jpeg,jpg,png,jfif|max:5000",
            "categories"=>"required",
            "tags"=>"required"
        ]);
        $date=date('Y-m-d H:i:s');

        $dataPro['pro_name']=$request->input('pro_name');
        $dataPro['pro_desc']=$request->input('pro_desc');
        $dataPro['featured']=$request->input('featured');
        $dataPro['pro_new']=$request->input('pro_new');
        $dataPro['active']=1;
        $dataPro['created_at']=$date;
        $dataPro['updated_at']=$date;

        $idProduct=ServiceFunctions::insert('products',$dataPro);

        if($idProduct)
        {
            $sizes=$request->input('sizes');
            $sizesOK=1;
            $dataSizes['id_product']=$idProduct;
            $dataSizes['created_at']=$date;
            $dataSizes['updated_at']=$date;
            for ($si=0;$si<count($sizes);$si++)
            {
                $dataSizes['id_size']=$sizes[$si];
                $sizesOK=ServiceFunctions::insert('products_sizes',$dataSizes);
            }

            if ($sizesOK)
            {
                $dataPrice['price']=$request->input('price');
                $dataPrice['prices_sale']=$request->input('prices_sale');
                $dataPrice['active']=1;
                $dataPrice['product_id']=$idProduct;
                $dataPrice['created_at']=$date;
                $dataPrice['updated_at']=$date;
                if(ServiceFunctions::insert('prices',$dataPrice))
                {
                    $categories=$request->input('categories');
                    $dataCat['id_product']=$idProduct;
                    $dataCat['created_at']=$date;
                    $dataCat['updated_at']=$date;
                    $catOk=1;
                    for ($ic=0;$ic<count($categories);$ic++)
                    {
                        $dataCat['id_category']=$categories[$ic];
                        $catOk=ServiceFunctions::insert('products_categories',$dataCat);
                    }

                    if($catOk) {

                        $picture = $request->file('main_pic');
                        $pictures = $request->file('other_pics');

                        $imageNameMain = ServiceUpload::upload($picture, "product/");
                        $imageAlt = $request->input('pic_alt');

                        $dataImg['pic_path'] = $imageNameMain;
                        $dataImg['pic_alt'] = $imageAlt;
                        $dataImg['created_at'] = $date;
                        $dataImg['updated_at'] = $date;
                        $dataImg['active'] = 1;

                        $imageIdMain = ServiceFunctions::insert('pictures', $dataImg);


                        $dataProPic['id_products'] = $idProduct;
                        $dataProPic['id_pictures'] = $imageIdMain;
                        $dataProPic['main'] = 1;
                        $dataProPic['created_at'] = $date;
                        $dataProPic['updated_at'] = $date;

                        if (ServiceFunctions::insert('products_pictures',$dataProPic))
                        {
                            $subImgOk=1;
                            foreach ($pictures as $pic)
                            {
                                $imageNameSub = ServiceUpload::upload($pic, "product/");
                                $dataSubImg['pic_path'] = $imageNameSub;
                                $dataSubImg['pic_alt'] = $imageAlt;
                                $dataSubImg['created_at'] = $date;
                                $dataSubImg['updated_at'] = $date;
                                $dataSubImg['active'] = 1;

                                $imageIdSub = ServiceFunctions::insert('pictures', $dataSubImg);


                                $dataProPicSub['id_products'] = $idProduct;
                                $dataProPicSub['id_pictures'] = $imageIdSub;
                                $dataProPicSub['main'] = 0;
                                $dataProPicSub['created_at'] = $date;
                                $dataProPicSub['updated_at'] = $date;

                                $subImgOk=ServiceFunctions::insert('products_pictures',$dataProPicSub);
                            }

                            if($subImgOk)
                            {
                                $tags=$request->input('tags');
                                $tagsOK=1;
                                $dataTag['id_product']=$idProduct;
                                $dataTag['created_at']=$date;
                                $dataTag['updated_at']=$date;
                                for ($ti=0;$ti<count($tags);$ti++)
                                {
                                    $dataTag['id_tags']=$tags[$ti];
                                    $tagsOK=ServiceFunctions::insert('product_tags',$dataTag);
                                }
                                if($tagsOK)
                                {
                                    return \redirect('/admin/products')->with('success','Product added');
                                }
                                else
                                {
                                    return \redirect('/admin/products')->with('error','Product failed adding tags');
                                }

                            }
                            else
                            {
                                return \redirect('/admin/products')->with('error','Product failed adding other images');
                            }

                        }
                        else
                        {
                            return \redirect('/admin/products')->with('error','Product failed adding main image');
                        }


                    }
                    else
                    {
                        return \redirect('/admin/products')->with('error','Product failed adding categories');
                    }


                }
                else
                {
                    return \redirect('/admin/products')->with('error','Product failed adding price');
                }

            }
            else
            {
                return \redirect('/admin/products')->with('error','Product failed adding sizes');
            }

        }
        else
        {
            return \redirect('/admin/products')->with('error','Product failed adding');
        }





    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $sizes=new ModelSizes();
        $category=new ModelCategory();
        $tags=new ModelTags();
        $products=new ModelProduct();
        $pictures=new ModelPicture();
        $collections=new ModelCollections();

        dd($pictures->getAllPictureByProductId(26));

        $data['idp']=$id;
        //dd($products->getAllProductPricesById($id));
        //dd($products->getProductById($id));
        //dd($sizes->getAllSizesByProductId($id));

        $data['selectedtags']=$tags->getAllTagsByProductId($id);
        $data['selectedcat']=$category->getAllProductsCategoriesByProductId($id);
        $data['selectedsizes']=$sizes->getAllSizesByProductId($id);
        $data['product']=$products->getProductById($id);
        $data['tags']=$tags->getAllTags();
        $data['prices']=$products->getAllProductPricesById($id);
        $data['pictures']=$pictures->getAllPictureByProductId($id);



        $data['sizes']=$sizes->getAllSizes();
        $data['categories']=$category->getAllCategoryGender();
        return view('admin/pages/products/productsedit',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $date=date('Y-m-d H:i:s');
        $dataPro['pro_name']=$request->input('pro_name');
        $dataPro['pro_desc']=$request->input('pro_desc');
        $dataPro['featured']=$request->input('featured');
        $dataPro['pro_new']=$request->input('pro_new');
        $dataPro['updated_at']=$date;

        if (ServiceFunctions::update('products',$id,$dataPro))
        {
            $sizes=$request->input('sizes');
            ServiceFunctions::delete('products_sizes',$id,'id_product');
            $sizesOK=1;
            $dataSizes['id_product']=$id;
            $dataSizes['created_at']=$date;
            $dataSizes['updated_at']=$date;
            for ($si=0;$si<count($sizes);$si++)
            {
                $dataSizes['id_size']=$sizes[$si];
                $sizesOK=ServiceFunctions::insert('products_sizes',$dataSizes);
            }

            if ($sizesOK)
            {
                $dataPrice['price']=$request->input('price');
                $dataPrice['prices_sale']=$request->input('prices_sale');
                $dataPrice['updated_at']=$date;
                $idPrice=$request->input('main_price_id');
                if(ServiceFunctions::update('prices',$idPrice,$dataPrice))
                {
                    ServiceFunctions::delete('products_categories',$id,'id_product');
                    $categories=$request->input('categories');
                    $dataCat['id_product']=$id;
                    $dataCat['created_at']=$date;
                    $dataCat['updated_at']=$date;
                    $catOk=1;
                    for ($ic=0;$ic<count($categories);$ic++)
                    {
                        $dataCat['id_category']=$categories[$ic];
                        $catOk=ServiceFunctions::insert('products_categories',$dataCat);
                    }
                    if ($catOk)
                    {

                        ServiceFunctions::delete('product_tags',$id,'id_product');
                        $tags=$request->input('tags');
                        $tagsOK=1;
                        $dataTag['id_product']=$id;
                        $dataTag['created_at']=$date;
                        $dataTag['updated_at']=$date;
                        for ($ti=0;$ti<count($tags);$ti++)
                        {
                            $dataTag['id_tags']=$tags[$ti];
                            $tagsOK=ServiceFunctions::insert('product_tags',$dataTag);
                        }

                        if ($tagsOK)
                        {
                            return \redirect('/admin/products')->with('success','Product updated');
                        }
                        else
                        {
                            return \redirect('/admin/products')->with('error','Product failed updating tags');
                        }

                    }
                    else
                    {
                        return \redirect('/admin/products')->with('error','Product failed updating categories');
                    }
                }
                else
                {
                    return \redirect('/admin/products')->with('error','Product failed updating price');
                }

            }
            else
            {
                return \redirect('/admin/products')->with('error','Product failed updating sizes');
            }


        }
        else
        {
            return \redirect('/admin/products')->with('error','Product failed updating');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //Delete sizes
        if(ServiceFunctions::delete('products_sizes',$id,'id_product'))
        {
            //Delete tags
            if (ServiceFunctions::delete('product_tags',$id,'id_product'))
            {
                $okCol=true;
                $collections=new ModelCollections();
                if(count($collections->getAllCollectionByProductId($id))>0)
                {
                    $okCol=ServiceFunctions::delete('products_collections',$id,'id_product');
                }

                //Delete collections
                if($okCol)
                {
                    //Delete prices
                    if(ServiceFunctions::delete('prices',$id,'product_id'))
                    {
                        //Delete categories
                        if(ServiceFunctions::delete('products_categories',$id,'id_product'))
                        {
                            $pictures= new ModelPicture();
                            $pics=$pictures->getAllPictureByProductId($id);
                            //Delete and unlink images
                            if(ServiceFunctions::delete('products_pictures',$id,'id_products'))
                            {

                                $okDelete=true;
                                foreach ($pics as $pic)
                                {
                                    $okDelete=ServiceFunctions::delete('pictures',$pic->id_pictures);
                                    unlink(\public_path()."/assets/images/product/".$pic->pic_path);
                                }

                                if ($okDelete)
                                {
                                    if (ServiceFunctions::delete('products',$id))
                                    {
                                        return \redirect('/admin/products')->with('success','Product deleted');
                                    }
                                    else
                                    {
                                        return \redirect('/admin/products')->with('error','Product failed deleting');
                                    }

                                }
                                else
                                {
                                    return \redirect('/admin/products')->with('error','Product failed deleting images');
                                }
                            }
                            else
                            {
                                return \redirect('/admin/products')->with('error','Product failed deleting images product');
                            }

                        }
                        else
                        {
                            return \redirect('/admin/products')->with('error','Product failed deleting categories');
                        }
                    }
                    else
                    {
                        return \redirect('/admin/products')->with('error','Product failed deleting prices');
                    }
                }
                else
                {
                    return \redirect('/admin/products')->with('error','Product failed deleting collections');
                }
            }
            else
            {
                return \redirect('/admin/products')->with('error','Product failed deleting tags');
            }
        }
        else
        {
            return \redirect('/admin/products')->with('error','Product failed deleting sizes');
        }

    }

    public function addmorepictures(Request $request)
    {
        $date=date('Y-m-d H:i:s');
        $pictures = $request->file('more_pic');
        $imageAlt=$request->input('pic_alt_new');
        $idProduct=$request->input('idp');
        $subImgOk=1;
        foreach ($pictures as $pic)
        {
            $imageNameSub = ServiceUpload::upload($pic, "product/");
            $dataSubImg['pic_path'] = $imageNameSub;
            $dataSubImg['pic_alt'] = $imageAlt;
            $dataSubImg['created_at'] = $date;
            $dataSubImg['updated_at'] = $date;
            $dataSubImg['active'] = 1;

            $imageIdSub = ServiceFunctions::insert('pictures', $dataSubImg);


            $dataProPicSub['id_products'] = $idProduct;
            $dataProPicSub['id_pictures'] = $imageIdSub;
            $dataProPicSub['main'] = 0;
            $dataProPicSub['created_at'] = $date;
            $dataProPicSub['updated_at'] = $date;

            $subImgOk=ServiceFunctions::insert('products_pictures',$dataProPicSub);
        }

        if($subImgOk)
        {
            return \redirect("/admin/products/$idProduct/edit")->with('success','Image added');
        }
        else
        {
            return \redirect("/admin/products/$idProduct/edit")->with('error','Image failed ');
        }

    }

    public function specialproducts(Request $request)
    {
        $products=new ModelProduct();
        $main=$products->getSpecialProduct(1);
        $others=$products->getSpecialProduct(null);

        $special=$products->getSpecialProductByProductId($main->id_product);
        $idOther=array();
        foreach ($others as $o)
        {
            array_push($idOther,$o->id_product);
        }

        $other1=$products->getSpecialProductByProductId($idOther[0]);
        $other2=$products->getSpecialProductByProductId($idOther[1]);
        $date=date('Y-m-d H:i:s');

        $picMain=$request->file('main_pic');
        $picOther1=$request->file('other_path1');
        $picOther2=$request->file('other_path2');

        $dataSpecial['id_product']=$request->input('special');
        $dataOther1['id_product']=$request->input('other1');
        $dataOther2['id_product']=$request->input('other2');

        $dataSpecial['baner_alt']=$request->input('baner_alt');
        $dataOther1['baner_alt']=$request->input('baner_alt1');
        $dataOther2['baner_alt']=$request->input('baner_alt2');



        $dataSpecial['updated_at']=$date;
        $dataOther1['updated_at']=$date;
        $dataOther2['updated_at']=$date;

        $okSpecial=true;
        $okOther1=true;
        $okOther2=true;
        if($picMain!=null)
        {
            unlink(\public_path()."/assets/images/banner/".$special->baner_path);
            $imageNameSpecial=ServiceUpload::upload($picMain,"banner/");
            $dataSpecial['baner_path']=$imageNameSpecial;
        }

        $okSpecial=ServiceFunctions::update('special_products',$special->id,$dataSpecial);


        if($picOther1!=null)
        {
            unlink(\public_path()."/assets/images/banner/".$other1->baner_path);
            $imageNameOther1=ServiceUpload::upload($picOther1,"banner/");
            $dataOther1['baner_path']=$imageNameOther1;
        }

        $okOther1=ServiceFunctions::update('special_products',$other1->id,$dataOther1);

        if($picOther2!=null)
        {
            unlink(\public_path()."/assets/images/banner/".$other2->baner_path);
            $imageNameOther2=ServiceUpload::upload($picOther2,"banner/");
            $dataOther2['baner_path']=$imageNameOther2;
        }
        $okOther2=ServiceFunctions::update('special_products',$other2->id,$dataOther2);

        if($okSpecial==true && $okOther1==true && $okOther2==true)
        {
            return \redirect("/admin/products")->with('success','Special products updated');
        }
        else
        {
            return \redirect("/admin/products")->with('error','Failed updating special products');
        }


    }
}
