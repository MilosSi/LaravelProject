<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ModelCollections;
use App\Models\ModelNewsletter;
use App\Models\ModelOrders;
use App\Models\ModelProduct;
use App\Models\ModelUsers;
use Illuminate\Http\Request;

class AdminHomeControler extends Controller
{
    public function index()
    {
        $orders=new ModelOrders();
        $users=new ModelUsers();
        $products=new ModelProduct();
        $newsletter=new ModelNewsletter();
        $collection=new ModelCollections();

        $data['allusers']=$users->getAllUsers();
        $data['allorders']=$orders->getAllOrders();
        $data['orders']=$orders->getAllOrders(10,0);
        $data['products']=$products->getAllNewProducts(5,0);
        $data['newslettermail']=$newsletter->getAll(5,0);
        $data['collections']=$collection->getCollections(10,0,'c.created_at');

        return view('admin/pages/home',$data);
    }
}
