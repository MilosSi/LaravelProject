<?php


namespace App\Models;


use Illuminate\Support\Facades\DB;

class ModelPicture
{
    public function getAllPictureByProductId($id)
    {
        return DB::table('pictures as p')
            ->join('products_pictures as pp','p.id','=','pp.id_pictures')
            ->where('pp.id_products',$id)
            ->orderBy('pp.main','DESC')
            ->get();
    }

    public function getPictureById($id)
    {
        return DB::table('pictures')
            ->where('id',$id)
            ->first();
    }


    public function insert($pic_name,$pic_alt)
    {
        DB::beginTransaction();

        try {
            $ok=DB::table('pictures')
                ->insertGetId(["pic_path"=>$pic_name,"pic_alt"=>$pic_alt,"created_at"=>date('Y-m-d H:i:s'),"updated_at"=>date('Y-m-d H:i:s'),"active"=>1]);
            DB::commit();
            return $ok;
        }
        catch (\Exception $ex)
        {
            \Log::error($ex->getMessage());
            \DB::rollback();
        }
    }
}
