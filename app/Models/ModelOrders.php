<?php


namespace App\Models;


use Illuminate\Support\Facades\DB;

class ModelOrders
{
    public function createOrder($idu,$ida,$totalp,$payment)
    {
        DB::beginTransaction();
        try {
            $ok=DB::table('orders')
                ->insertGetId(['user_id'=>$idu,'address_id'=>$ida,'total_price'=>$totalp,'processed'=>0,'payment_type'=>$payment,"created_at"=>date('Y-m-d H:i:s'),"updated_at"=>date('Y-m-d H:i:s')]);
            DB::commit();
            return $ok;
        }
        catch (\Exception $ex)
        {
            \Log::error($ex->getMessage());
            \DB::rollback();
        }
    }

    public function createOrderProducts($idproduct,$idorder,$quantity,$size,$totalpp)
    {
        DB::beginTransaction();
        try {
            $ok=DB::table('product_orders')
                ->insert([
                    'id_product'=>$idproduct,
                    'id_order'=>$idorder,
                    'quantity'=>$quantity,
                    'size'=>$size,
                    'pro_total_price'=>$totalpp,
                    "created_at"=>date('Y-m-d H:i:s'),
                    "updated_at"=>date('Y-m-d H:i:s')]);
            DB::commit();
            return $ok;
        }
        catch (\Exception $ex)
        {
            \Log::error($ex->getMessage());
            \DB::rollback();
        }
    }

    public function getOrdersByUserId($id,$limit=5200,$offset=0,$order='DESC')
    {
        return DB::table('orders as o')
            ->select('*','o.id as id_order','o.created_at as order_created')
            ->join('address as a','o.address_id','=','a.id')
            ->where('o.user_id',$id)
            ->orderBy('o.created_at',$order)
            ->limit($limit)
            ->offset($offset)
            ->get();
    }

    public function getAllOrders($limit=5200,$offset=0,$order='DESC')
    {
        return DB::table('orders as o')
            ->select('*','o.id as id_order','o.created_at as order_created')
            ->join('user as u','o.user_id','=','u.id')
            ->orderBy('o.created_at',$order)
            ->limit($limit)
            ->offset($offset)
            ->get();
    }

    public function getOrderById($id)
    {
        return DB::table('orders as o')
            ->join('user as u','o.user_id','=','u.id')
            ->join('address as a','o.address_id','=','a.id')
            ->select('*','o.id as id_order','o.created_at as order_created')
            ->where('o.id',$id)
            ->first();
    }

    public function getAllProductByOrderId($id)
    {
        return DB::table('orders as o')
            ->join('product_orders as po','o.id','=','po.id_order')
            ->join('products as p','po.id_product','=','p.id')
            ->join('prices as pr','p.id','=','pr.product_id')
            ->where('o.id',$id)
            ->where('pr.active',1)
            ->get();
    }
}
