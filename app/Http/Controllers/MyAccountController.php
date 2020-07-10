<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddressRequest;
use App\Models\ModelAddress;
use App\Models\ModelOrders;
use Illuminate\Http\Request;

class MyAccountController extends FrontController
{
    public function index()
    {
        $address=new ModelAddress();
        $order=new ModelOrders();
        $id=session('user')->id;

        $this->data['address']=$address->getAdressesByUserId($id);
        $this->data['orders']=$order->getOrdersByUserId($id);

        return view('pages/myaccount',$this->data);
    }

    public function store(AddressRequest $request)
    {
        $address=new ModelAddress();
        $id=session('user')->id;
        if($address->insert($request,$id))
        {
            return \redirect('/myaccount')->with('success','Address added!');
        }
        else
        {
            return \redirect('/')->with('error','Ups! Something went wrong !');
        }
    }

    public function show(Request $request)
    {
        $address=new ModelAddress();
        $id=$request->input('id');
        $idUser=session('user')->id;
        return json_encode($address->getAdressesById($id,$idUser));

    }

    public function edit(AddressRequest $request)
    {
        $address=new ModelAddress();
        $id=session('user')->id;

        if($address->update($request,$id))
        {
            return \redirect('/myaccount')->with('success','Address updated!');
        }
        else
        {
            return \redirect('/')->with('error','Ups! Something went wrong !');
        }
    }

    public function editmyaccount(Request $request)
    {
        $address=new ModelAddress();
        $id=session('user')->id;
        $chgpasswd=true;
        if($request->input('password')!=null)
        {
            $chgpasswd=$address->getUserByPassword($request->input('password'),$id);
        }

        if($chgpasswd!=null)
        {
            if($address->updateMyAccount($request,$id))
            {
                return \redirect('/myaccount')->with('success','Account updated!');
            }
            else
            {
                return \redirect('/')->with('error','Ups! Something went wrong !');
            }
        }
        else
        {
            return \redirect('/myaccount')->with('error','Wrong password !');
        }


    }


}
