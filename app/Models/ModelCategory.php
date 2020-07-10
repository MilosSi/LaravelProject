<?php


namespace App\Models;


use Illuminate\Support\Facades\DB;

class ModelCategory
{
    public function getMainCategories()
    {
        return DB::table('categories')
            ->whereNull('main_cat_id')
            ->get();
    }

    public function getAllCategories()
    {
        return DB::table('categories')
            ->get();
    }
    public function getAllCategoriesGenderById($id)
    {
        return DB::table('category_gender')
            ->where('id_category',$id)
            ->get();
    }
    public function getAllSubCategories($id)
    {
        return DB::table('categories')
            ->where('main_cat_id',$id)
            ->get();
    }
    public function getAllProductsCategoriesById($id)
    {
        return DB::table('products_categories')
            ->where('id_category',$id)
            ->get();
    }
    public function getAllProductsCategoriesByProductId($id)
    {
        return DB::table('products_categories')
            ->where('id_product',$id)
            ->get();
    }

    public function getSubCategoryByIdAndGender($idMain,$idGender){
        return DB::table('categories as c')
            ->join('category_gender as cg','c.id','=','cg.id_category')
            ->join('gender as g','g.id','=','cg.id_gender')
            ->select("*","cg.id as idKategorije")
            ->where([
                ['c.main_cat_id','=',$idMain],
                ['g.id','=',$idGender]])
            ->get();
    }

    public function getAllCategoryGender($limit=5200,$offset=0)
    {
        return DB::table('categories as c')
            ->join('category_gender as cg','c.id','=','cg.id_category')
            ->join('gender as g','g.id','=','cg.id_gender')
            ->select("*","cg.id as idKategorije")
            ->whereNotNull('c.main_cat_id')
            ->get();
    }
    public function getMainCategoriesByGender()
    {
        return DB::table('categories as c')
            ->join('category_gender as cg','c.id','=','cg.id_category')
            ->join('gender as g','cg.id_gender','=','g.id')
            ->join('categories as cn','c.main_cat_id','=','cn.id')
            ->select('c.main_cat_id','cg.id_gender','cn.cat_name')
            ->groupBy('c.main_cat_id','cg.id_gender','cn.cat_name')
            ->orderBy('cg.id_gender')
            ->orderBy('cn.cat_name','DESC')
            ->get();

    }

    public function getCategoryById($id)
    {
        return DB::table('categories')
            ->where('id',$id)
            ->first();
    }


    public function getSubCategoriesByGenderId($id)
    {
        return DB::table('categories as c')
            ->join('category_gender as cg','c.id','=','cg.id_category')
            ->join('gender as g','cg.id_gender','=','g.id')
            ->select('*','cg.id as cg_id')
            ->where('cg.id_gender',$id)
            ->orderBy('cg.id','DESC')
            ->get();
    }

    public function getSubCategoriesNotInGenderId($data)
    {
        return DB::table('categories as c')
            ->join('categories as mc','c.main_cat_id','=','mc.id')
            ->select('*','c.cat_name as sub_cat_name','c.id as sub_cat_id')
            ->whereNotIn('c.id',$data)
            ->whereNotNull('c.main_cat_id')
            ->get();
    }

    //Pr

}
