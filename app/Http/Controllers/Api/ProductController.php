<?php

namespace App\Http\Controllers\Api;
use App\Product;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    private $product;
    public function __construct(Product $product){
        $this->product = $product;
    }
    public function index(){
        // $products = $this->product->all();
        //provisorio enquanto não conecta ao banco
        // $products =['item1'=>'cocacola','item2'=>'guaraná','item3'=>'pepis'];
        // return $products;
        $products = $this->product->all();
        return response()->json($products);
    }
    public function show($id){
        $product = $this->product->find($id);
        return response()->json($product);
    }
    
    public function save(Request $request){
        $data = $request->all();
        $prodct = $this->product->create($data);
        return response()->json($request->all());
    }

    public function update(Request $request){
        $data = $request->all();
        $product = $this->product->find($data['id']);
        $product->update($data);
            return response()->json($product);
    }

    public function delete($id){
        $product = $this->product->find($id);
        $product->delete();
        return response()->json(['data'=>['msg'=>'Produto Excluido com sucesso!']]);
    }
}
