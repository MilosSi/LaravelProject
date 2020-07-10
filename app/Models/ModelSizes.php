<?php


namespace App\Models;


use Illuminate\Support\Facades\DB;

class ModelSizes
{
    public function getAllSizes()
    {
        return DB::table('size')
            ->get();
    }

    public function getProductSizes($id)
    {
        return DB::table('size as s')
            ->join('products_sizes as ps','s.id','=','ps.id_size')
            ->where('ps.id_product',$id)
            ->get();
    }

    public function getAllSizesByProductId($id)
    {
        return DB::table('products_sizes')
            ->where('id_product',$id)
            ->get();
    }
}
