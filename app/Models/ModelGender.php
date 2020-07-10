<?php


namespace App\Models;


use Illuminate\Support\Facades\DB;

class ModelGender
{
    public function getGenders()
    {
        return DB::table('gender as g')
            ->join('pictures as p','g.id_gen_pic','=','p.id')
            ->get();
    }

    public function getGendersById($id)
    {
        return DB::table('gender as g')
            ->join('pictures as p','g.id_gen_pic','=','p.id')
            ->where('g.id',$id)
            ->first();
    }
}
