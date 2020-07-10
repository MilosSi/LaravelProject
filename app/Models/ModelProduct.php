<?php


namespace App\Models;


use Illuminate\Support\Facades\DB;
use function foo\func;

class ModelProduct
{
    public function getAllProduct($limit=5200,$offset=0)
    {
        return DB::table('products as p')
            ->join('prices as pr','p.id','=','pr.product_id')
            ->where([
                ['pr.active','=',1]
            ])
            ->limit($limit)
            ->offset($offset)
            ->orderBy('p.id','DESC')
            ->get();
    }

    public function getAllNewProducts($limit=5200,$offset=0)
    {
        return DB::table('products as p')
            ->join('products_categories as pc','p.id','=','pc.id_product')
            ->join('category_gender as cg','pc.id_category','=','cg.id')
            ->join('categories as c','cg.id_category','=','c.id')
            ->join('products_pictures as pp','p.id','=','pp.id_products')
            ->join('pictures as pic','pp.id_pictures','=','pic.id')
            ->join('prices as pr','p.id','=','pr.product_id')
            ->where([
                ['p.pro_new','=',1],
                ['pp.main','=',1],
                ['pr.active','=',1]
            ])
            ->limit($limit)
            ->offset($offset)
            ->inRandomOrder()
            ->get();
    }
    public function getAllFeaturedProducts($limit=5200,$offset=0)
    {
        return DB::table('products as p')
            ->join('products_categories as pc','p.id','=','pc.id_product')
            ->join('category_gender as cg','pc.id_category','=','cg.id')
            ->join('categories as c','cg.id_category','=','c.id')
            ->join('products_pictures as pp','p.id','=','pp.id_products')
            ->join('pictures as pic','pp.id_pictures','=','pic.id')
            ->join('prices as pr','p.id','=','pr.product_id')
            ->where([
                ['p.featured','=',1],
                ['pp.main','=',1],
                ['pr.active','=',1]
            ])
            ->limit($limit)
            ->offset($offset)
            ->inRandomOrder()
            ->get();
    }

    public function getProductById($id)
    {
        return DB::table('products as p')
            ->join('products_categories as pc','p.id','=','pc.id_product')
            ->join('category_gender as cg','pc.id_category','=','cg.id')
            ->join('gender as g','cg.id_gender','=','g.id')
            ->join('categories as c','cg.id_category','=','c.id')
            ->join('products_pictures as pp','p.id','=','pp.id_products')
            ->join('pictures as pic','pp.id_pictures','=','pic.id')
            ->join('prices as pr','p.id','=','pr.product_id')
            ->select("*","cg.id as idCategory","pr.id as main_price_id")
            ->where([
                ['pc.id_product','=',$id],
                ['pp.main','=',1],
                ['pr.active','=',1]
            ])
            ->first();
    }

    public function getProductsFilter($categories,$sizes,$min,$max,$orderby="p.id",$ordertype="DESC")
    {
        return DB::table('products as p')
            ->join('products_categories as pc','p.id','=','pc.id_product')
            ->join('category_gender as cg','pc.id_category','=','cg.id')
            ->join('gender as g','cg.id_gender','=','g.id')
            ->join('categories as c','cg.id_category','=','c.id')
            ->join('products_pictures as pp','p.id','=','pp.id_products')
            ->join('pictures as pic','pp.id_pictures','=','pic.id')
            ->join('prices as pr','p.id','=','pr.product_id')
            ->join('products_sizes as ps','p.id','=','ps.id_product')
            ->select('p.id')
            ->where([
                ['pp.main','=',1],
                ['pr.active','=',1]
            ])
            ->whereIn('cg.id',$categories)
            ->whereIn('ps.id_size',$sizes)
            ->where(function ($query) use($min){
                $query->where('price','>',$min)
                    ->orWhere('prices_sale','>',$min);
            })
            ->where(function ($query) use($max){
                $query->where('price','<',$max)
                    ->orWhere('prices_sale','<',$max);
            })

            ->groupBy('p.id')
            ->orderBy($orderby,$ordertype)
            ->get();

    }

    public function getProductsByFilterId($arrid,$limit,$offset,$orderby="p.id",$ordertype="DESC")
    {
        return DB::table('products as p')
            ->join('products_categories as pc','p.id','=','pc.id_product')
            ->join('category_gender as cg','pc.id_category','=','cg.id')
            ->join('gender as g','cg.id_gender','=','g.id')
            ->join('categories as c','cg.id_category','=','c.id')
            ->join('products_pictures as pp','p.id','=','pp.id_products')
            ->join('pictures as pic','pp.id_pictures','=','pic.id')
            ->join('prices as pr','p.id','=','pr.product_id')
            ->select("*","cg.id as idCategory")
            ->where([
                ['pp.main','=',1],
                ['pr.active','=',1]
            ])
            ->whereIn('p.id',$arrid)
            ->orderBy($orderby,$ordertype)
            ->limit($limit)
            ->offset($offset)
            ->get();
    }


    public function getSpecialProduct($main)
    {
        $part=DB::table('products as p')
            ->join('products_categories as pc','p.id','=','pc.id_product')
            ->join('category_gender as cg','pc.id_category','=','cg.id')
            ->join('gender as g','cg.id_gender','=','g.id')
            ->join('categories as c','cg.id_category','=','c.id')
            ->join('products_pictures as pp','p.id','=','pp.id_products')
            ->join('pictures as pic','pp.id_pictures','=','pic.id')
            ->join('prices as pr','p.id','=','pr.product_id')
            ->join('special_products as spp','p.id','=','spp.id_product')
            ->where([
                ['pp.main','=',1],
                ['pr.active','=',1]
            ]);
        if($main!=null)
        {
            $part=$part->where('spp.main',$main)
                ->first();
        }
        else
        {
            $part=$part->whereNull('spp.main')
                ->limit(2)
                ->offset(0)
                ->get();
        }

        return $part;
    }

    public function getSpecialProductByProductId($id)
    {
        return DB::table('special_products')
            ->where('id_product',$id)
            ->first();
    }


    public function getAllProductByGender($genderId,$limit=5200,$offset=0)
    {
        return DB::table('products as p')
            ->join('products_categories as pc','p.id','=','pc.id_product')
            ->join('category_gender as cg','pc.id_category','=','cg.id')
            ->join('categories as c','cg.id_category','=','c.id')
            ->join('products_pictures as pp','p.id','=','pp.id_products')
            ->join('pictures as pic','pp.id_pictures','=','pic.id')
            ->join('prices as pr','p.id','=','pr.product_id')
            ->where([
                ['cg.id_gender','=',$genderId],
                ['pp.main','=',1],
                ['pr.active','=',1]
            ])
            ->limit($limit)
            ->offset($offset)
            ->inRandomOrder()
            ->get();
    }

    public function getAllProductByGenderPagination($genderId,$pagination)
    {
        return DB::table('products as p')
            ->join('products_categories as pc','p.id','=','pc.id_product')
            ->join('category_gender as cg','pc.id_category','=','cg.id')
            ->join('categories as c','cg.id_category','=','c.id')
            ->join('products_pictures as pp','p.id','=','pp.id_products')
            ->join('pictures as pic','pp.id_pictures','=','pic.id')
            ->join('prices as pr','p.id','=','pr.product_id')
            ->where([
                ['cg.id_gender','=',$genderId],
                ['pp.main','=',1],
                ['pr.active','=',1]
            ])
            ->paginate($pagination);
    }

    public function getAllProductByCategory($categoryId,$limit=5200,$offset=0)
    {
        return DB::table('products as p')
            ->join('products_categories as pc','p.id','=','pc.id_product')
            ->join('category_gender as cg','pc.id_category','=','cg.id')
            ->join('categories as c','cg.id_category','=','c.id')
            ->join('products_pictures as pp','p.id','=','pp.id_products')
            ->join('pictures as pic','pp.id_pictures','=','pic.id')
            ->join('prices as pr','p.id','=','pr.product_id')
            ->where([
                ['cg.id','=',$categoryId],
                ['pp.main','=',1],
                ['pr.active','=',1]
            ])
            ->limit($limit)
            ->offset($offset)
            ->inRandomOrder()
            ->get();
    }

    public function getProductBySearchName($productname)
    {
        return DB::table('products as p')
            ->join('products_categories as pc','p.id','=','pc.id_product')
            ->join('category_gender as cg','pc.id_category','=','cg.id')
            ->join('gender as g','cg.id_gender','=','g.id')
            ->join('categories as c','cg.id_category','=','c.id')
            ->join('products_pictures as pp','p.id','=','pp.id_products')
            ->join('pictures as pic','pp.id_pictures','=','pic.id')
            ->join('prices as pr','p.id','=','pr.product_id')
            ->select("*","cg.id as idCategory")
            ->where([
                ['p.pro_name','like',"%$productname%"],
                ['pp.main','=',1],
                ['pr.active','=',1]
            ])
            ->get();
    }

    public function getAllProductsByCollection($id,$operator="=",$limit=5200,$offset=0)
    {
        return DB::table('products as p')
            ->join('products_categories as pc','p.id','=','pc.id_product')
            ->join('category_gender as cg','pc.id_category','=','cg.id')
            ->join('categories as c','cg.id_category','=','c.id')
            ->join('products_pictures as pp','p.id','=','pp.id_products')
            ->join('pictures as pic','pp.id_pictures','=','pic.id')
            ->join('prices as pr','p.id','=','pr.product_id')
            ->join('products_collections as ppc','p.id','=','ppc.id_product')
            ->where([
                ['ppc.id_collection',$operator,$id],
                ['pp.main','=',1],
                ['pr.active','=',1]
            ])
            ->limit($limit)
            ->offset($offset)
            ->inRandomOrder()
            ->get();
    }

    public function getAllProductsByTag($id,$operator="=",$limit=5200,$offset=0)
    {
        return DB::table('products as p')
            ->join('product_tags as ppt','p.id','=','ppt.id_product')
            ->select('p.id','p.pro_name')
            ->where([
                ['ppt.id_tags',$operator,$id],
            ])
            ->limit($limit)
            ->offset($offset)
            ->inRandomOrder()
            ->groupBy('p.id','p.pro_name')
            ->get();
    }

    public function getAllProductsNotByTagName($id,$data)
    {
        return DB::table('products as p')
            ->join('product_tags as ppt','p.id','=','ppt.id_product')
            ->select('p.id','p.pro_name')
            ->where('ppt.id_tags','!=',$id)
            ->whereNotIn('ppt.id_product',$data)
            ->groupBy('p.id','p.pro_name')
            ->get();
    }


    //Price

    public function getAllProductPricesById($id)
    {
        return DB::table('prices')
            ->where('product_id',$id)
            ->get();
    }

}
