<?php


namespace App\Models;


use Illuminate\Support\Facades\DB;

class ModelTags
{
    public function getAllTagsByProductId($id,$operator="=")
    {
        return DB::table('product_tags as pt')
            ->join('tags as t','pt.id_tags','=','t.id')
            ->where('pt.id_product',$operator,$id)
            ->get();
    }

    public function getProductTag($idProduct,$idTag)
    {
        return DB::table('product_tags')
            ->select('id')
            ->where('id_product','=',$idProduct)
            ->where('id_tags','=',$idTag)
            ->first();
    }
    public function getAllTags()
    {
        return DB::table('tags')
            ->get();
    }

    public function getTagById($id)
    {
        return DB::table('tags')
            ->where('id',$id)
            ->first();
    }



}
