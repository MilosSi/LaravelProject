<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ModelProduct;
use App\Models\ModelTags;
use App\Services\ServiceFunctions;
use Illuminate\Http\Request;

class TagsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tags=new ModelTags();
        $data['tags']=$tags->getAllTags();
        return view("admin/pages/tags/tags",$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("admin/pages/tags/tagscreate");
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
            "tag_name"=>"required",
            "active"=>"required",
        ]);

        $tagName=$request->input('tag_name');
        $tagActive=$request->input('active');
        $date=date('Y-m-d H:i:s');

        $dataTag['tag_name']=$tagName;
        $dataTag['active']=$tagActive;
        $dataTag['created_at']=$date;
        $dataTag['updated_at']=$date;

        if(ServiceFunctions::insert('tags',$dataTag))
        {
            return \redirect('/admin/tags')->with('success','Tag Added');
        }
        else
        {
            return \redirect('/admin/tags')->with('error','Failed to add tag');
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
        $tags=New ModelTags();
        $products=new ModelProduct();
        $productswithtag=$products->getAllProductsByTag($id);
        $prodin = array();
        foreach ($productswithtag as $pt)
        {
            array_push($prodin,$pt->id);
        }
        $productsnotwithtag=$products->getAllProductsNotByTagName($id,$prodin);
        $data['productsin']=$productswithtag;
        $data['productsout']=$productsnotwithtag;
        $data['tag']=$tags->getTagById($id);
        $data['tagid']=$id;
        return view("admin/pages/tags/tagsupdate",$data);
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
        $tagName=$request->input('tag_name');
        $tagActive=$request->input('active');
        $date=date('Y-m-d H:i:s');

        $dataTag['tag_name']=$tagName;
        $dataTag['active']=$tagActive;
        $dataTag['updated_at']=$date;

        if (ServiceFunctions::update('tags',$id,$dataTag))
        {
            return \redirect('/admin/tags')->with('success','Tag Updated');
        }
        else
        {
            return \redirect('/admin/tags')->with('error','Update tag failed');
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
        if(ServiceFunctions::delete('product_tags',$id,'id_tags'))
        {
            if(ServiceFunctions::delete('tags',$id))
            {
                return \redirect('/admin/tags')->with('success','Tag Deleted');
            }
            else
            {
                return \redirect('/admin/tags')->with('error','Tags failed deleting');
            }

        }
        else
        {
            return \redirect('/admin/tags')->with('error','Products Tags failed deleting');
        }
    }
}
