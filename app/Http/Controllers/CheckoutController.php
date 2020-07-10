<?php

namespace App\Http\Controllers;

use App\Models\ModelAddress;
use App\Models\ModelOrders;
use Illuminate\Http\Request;

class CheckoutController extends FrontController
{
    public function index()
    {
        $address=new ModelAddress();
        if(session('user'))
        {
            $id=session('user')->id;


            $this->data['address']=$address->getAdressesByUserId($id);
        }


        return view('/pages/checkout',$this->data);
    }

    public function store(Request $request)
    {
        $idu=$request->input('id');
        $ida=$request->input('address');
        $totalp=$request->input('tp');
        $payment=$request->input('payment');
        $order=new ModelOrders();

        $idO=$order->createOrder($idu,$ida,$totalp,$payment);

        if($idO)
        {
            $okpo=true;
            $cart=$request->input('cart');
            for($i=0;$i<count($cart);$i++)
            {
                $idp=$cart[$i]['idProizovda'];
                $quantity=$cart[$i]['kolicina'];
                $size=$cart[$i]['velicina'];
                $total_product_price=$cart[$i]['kolicina']*$cart[$i]['cenaSaPopustom'];
                $okpo=$order->createOrderProducts($idp,$idO,$quantity,$size,$total_product_price);
            }

            if($okpo)
            {
                return response(["success" =>"Order placed"],200);
            }
            else
            {
                return response(["error" =>"Order product failed"],500);
            }
        }
        else
        {
            return response(["error" =>"Order failed"],500);
        }
    }
}
