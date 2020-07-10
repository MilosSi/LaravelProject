<?php


namespace App\Models;


use Illuminate\Support\Facades\DB;

class ModelCollections
{

    public function getCollections($limit=5200,$offset=0,$orderCol='c.created_at',$order='asc')
    {
        return DB::table('collections as c')
            ->join('pictures as p','c.id_col_pic','=','p.id')
            ->select('*','c.id as col_id','c.created_at as col_create','c.active as col_active')
            ->where('c.active',1)
            ->limit($limit)
            ->offset($offset)
            ->orderBy($orderCol,$order)
            ->get();
    }

    public function getAllCollections($orderCol='c.created_at',$order='asc')
    {
        return DB::table('collections as c')
            ->join('pictures as p','c.id_col_pic','=','p.id')
            ->select('*','c.id as col_id','c.created_at as col_create','c.active as col_active')
            ->orderBy($orderCol,$order)
            ->get();
    }


    public function getCollection($id)
    {
        return DB::table('collections as c')
            ->join('pictures as p','c.id_col_pic','=','p.id')
            ->select('*','c.id as col_id','c.created_at as col_create','c.active as col_active')
            ->where('c.id',$id)
            ->first();
    }


    public function getProductCollection($idProduct,$idCollection)
    {
        return DB::table('products_collections')
            ->where('id_product',$idProduct)
            ->where('id_collection',$idCollection)
            ->first();
    }

    public function getAllProductsNotInCollection($data)
    {
        return DB::table('products as p')
            ->whereNotIn('p.id',$data)
            ->get();
    }

    public function getAllCollectionByProductId($id)
    {
        return DB::table('products_collections')
            ->where('id_product',$id)
            ->get();
    }

}
