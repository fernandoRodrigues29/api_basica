<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class ProductContorller extends BaseController
{
    private $product;

    public function  __contruct(Product $product){
        $this->product = $product;
    }

    public function index(){
        $products = $this->product->all();
        return response()->json($products);
    }
}
