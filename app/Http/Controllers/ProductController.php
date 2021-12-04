<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class ProductController extends Controller
{
    //
    public function getProducts()
    {
        if (request()->has('q')) {
            $products = Product::join('users', 'users.id', '=', 'products.owner_id')
            ->join('categories', 'categories.id', '=', 'products.category_id')
            ->select('products.*', 'categories.name as category_name', 'users.name as owner_name')
            ->where('products.name', 'LIKE', '%' . request()->q . '%')
            ->orWhere('categories.name', 'LIKE', '%' . request()->q . '%')
            ->orWhere('users.name', 'LIKE', '%' . request()->q . '%')
            ->get();
        } else {
            $products = Product::join('users', 'users.id', '=', 'products.owner_id')
                ->join('categories', 'categories.id', '=', 'products.category_id')
                ->select('products.*', 'categories.name as category_name', 'users.name as owner_name')
                ->get();
        }
        
        $data = [
            'products' => $products
        ];

        return view('components.product.product', $data);
    }

    public function getProductDetailsByID(Request $request)
    {
         
        try{
            $dcID = Crypt ::decrypt($request->q);
        }catch(DecryptException $e){
            return redirect()->back();
        }

       $product = Product::join('users', 'users.id', '=', 'products.owner_id')
            ->join('categories', 'categories.id', '=', 'products.category_id')
            ->select('products.*', 'categories.name as category_name', 'users.name as owner_name')
            ->where('products.id', $dcID)
            ->first();
         $data = [
              'product' => $product
         ];
        
        return view('components.product.productDetail', $data);
    }
}
