<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ModelCollections;
use App\Models\ModelPicture;
use App\Models\ModelProduct;
use App\Services\ServiceFunctions;
use App\Services\ServiceUpload;
use Illuminate\Http\Request;

class CollectionController extends Controller
{

    public function index()
    {
        $collections=new ModelCollections();
        $data['collections']=$collections->getAllCollections();
//        dd( $data['collections']);
        return view('admin/pages/collections',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     *
     */
    public function create()
    {
        return view('admin/pages/collectioncreate');
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
                "col_name"=>"required",
                "active"=>"required",
                "id_col_pic" => "required|mimes:jpeg,jpg,png,jfif|max:5000"
            ]);

        $pictures=new ModelPicture();


        $collectionName=$request->input('col_name');
        $collectionActive=$request->input('active');

        $slika=$request->file('id_col_pic');
        $imageName=ServiceUpload::upload($slika,"collections/");
        $imageAlt=$request->input('pic_alt');

        $date=date('Y-m-d H:i:s');
        $dataImg['pic_path']=$imageName;
        $dataImg['pic_alt']=$imageAlt;
        $dataImg['created_at']=$date;
        $dataImg['updated_at']=$date;
        $dataImg['active']=1;

        $imageId=ServiceFunctions::insert('pictures',$dataImg);

        if($imageId)
        {
            $dataCollection['col_name']=$collectionName;
            $dataCollection['active']=$collectionActive;
            $dataCollection['id_col_pic']=$imageId;
            $dataCollection['created_at']=$date;
            $dataCollection['updated_at']=$date;

            $collectionId=ServiceFunctions::insert('collections',$dataCollection);

            if($collectionId)
            {
                return \redirect('/admin/collections')->with('success','Collection Added');
            }
            else
            {
                return \redirect('/admin/collections')->with('error','Collection failed');
            }

        }
        else
        {
            return \redirect('/admin/collections')->with('error','Image failed uploading');
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
        $collections=new ModelCollections();
        $products=new ModelProduct();



        $data['collectionid']=$id;
        $data['colproducts']=$products->getAllProductsByCollection($id);
        $arrayId=array();
        foreach ( $data['colproducts'] as $p) {
            array_push($arrayId,$p->id_product);
        }
        $data['freeproducts']=$collections->getAllProductsNotInCollection($arrayId);


        $data['collection']=$collections->getCollection($id);

        return view('admin/pages/collectionupdate',$data);
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
        $request->validate([
            "id_col_pic" => "mimes:jpeg,jpg,png,jfif|max:5000"
        ]);
        $collections=new ModelCollections();


        $collection=$collections->getCollection($id);

        $collectionName=$request->input('col_name');
        $collectionActive=$request->input('active');


        $imageAlt=$request->input('pic_alt');
        $date=date('Y-m-d H:i:s');


        $slika=$request->file('id_col_pic');
        echo $slika;
        $okUpdatePic=true;
        $okUpdateCol=true;

        if($slika)
        {

            unlink(\public_path()."/assets/images/collections/".$collection->pic_path);
            $imageName=ServiceUpload::upload($slika,"collections/");

            $dataImg['pic_alt']=$imageAlt;
            $dataImg['pic_path']=$imageName;
            $dataImg['updated_at']=$date;
            $okUpdatePic=ServiceFunctions::update('pictures',$collection->id_col_pic,$dataImg);
        }
        if($okUpdatePic)
        {
            $dataCollection['col_name']=$collectionName;
            $dataCollection['active']=$collectionActive;
            $dataCollection['updated_at']=$date;

            $okUpdateCol=ServiceFunctions::update('collections',$id,$dataCollection);
            if ($okUpdateCol)
            {
                return \redirect('/admin/collections')->with('success','Collection deleted');
            }
            else
            {
                return \redirect('/admin/collections')->with('error','Collection failed to update');
            }

        }
        else
        {
            return \redirect('/admin/collections')->with('error','Image failed');
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
        $collections=new ModelCollections();
        $collection=$collections->getCollection($id);

        unlink(\public_path()."/assets/images/collections/".$collection->pic_path);
        if(ServiceFunctions::delete('products_collections',$id,"id_collection"))
        {

            if(ServiceFunctions::delete('collections',$id))
            {
                if(ServiceFunctions::delete('pictures',$collection->id_col_pic))
                {
                    return \redirect('/admin/collections')->with('success','Collection Updated');
                }
                else
                {
                    return \redirect('/admin/collections')->with('error','Image failed');

                }

            }
            else
            {
                return \redirect('/admin/collections')->with('error','Collections failed');
            }
        }
        else
        {
            return \redirect('/admin/collections')->with('error','Products Collections failed');

        }
    }
}
