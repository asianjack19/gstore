<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Storage;


class ProductController extends Controller
{
    public function getProducts()
    {
        if (request()->has('q')) {
            $products = Product::join('users', 'users.id', '=', 'products.owner_id')
                ->join('categories', 'categories.id', '=', 'products.category_id')
                ->select('products.*', 'categories.name as category_name', 'users.name as owner_name')
                ->where('products.name', 'LIKE', '%' . request()->q . '%')
                ->orWhere('categories.name', 'LIKE', '%' . request()->q . '%')
                ->orWhere('users.name', 'LIKE', '%' . request()->q . '%')
                ->orderBy('products.updated_at', 'desc')
                ->paginate(10);
        } else {
            $products = Product::join('users', 'users.id', '=', 'products.owner_id')
                ->join('categories', 'categories.id', '=', 'products.category_id')
                ->select('products.*', 'categories.name as category_name', 'users.name as owner_name')
                ->orderBy('products.updated_at', 'desc')
                ->paginate(10);
        }

        $data = [
            'products' => $products
        ];

        return view('components.product.product', $data);
    }

    public function getProductDetailsByID(Request $request)
    {

        try {
            $dcID = Crypt::decrypt($request->q);
        } catch (DecryptException $e) {
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

    public function getUploadProductPage()
    {
        $categories = Category::all();
        $data = [
            'categories' => $categories
        ];
        return view('components.product.productUpload', $data);
    }

    public function uploadProduct(Request $request)
    {
        $userID = Auth::user()->id;
        $product = new Product();

        $flag = false;
        if ($request->hasFile('picture')) {
            $flag = true;
            $picture = $request->file('picture');
            $pictureName = $picture->getClientOriginalName();
        } else {
            $picture = asset('storage/products/' . 'default_product.png');
            $pictureName = 'default.png';
        }

        if ($flag) {
            $this->validate($request, [
                'name' => 'required|max:255',
                'description' => 'required',
                'price' => 'required|numeric|between:0,999999',
                'stock' => 'required|numeric',
                'category' => 'required|numeric',
                'picture' => 'image|mimes:jpeg,png,jpg,gif,svg',
            ]);
        } else {
            $this->validate($request, [
                'name' => 'required|max:255',
                'description' => 'required',
                'price' => 'required|numeric|between:0,999999',
                'stock' => 'required|numeric',
                'category' => 'required|numeric',
            ]);
        }

        $product->name = $request->name;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->stock = $request->stock;
        $product->category_id = $request->category;
        $product->owner_id = $userID;
        if ($flag) {
            $product->picture = $pictureName;
            Storage::putFileAs('public/products', $picture, $pictureName);
        }
        $product->save();

        return redirect('/products');
    }


    public function getEditProductPage(Request $request)
    {
        try {
            $dcID = Crypt::decrypt($request->q);
        } catch (DecryptException $e) {
            return redirect()->back();
        }
        $product = Product::find($dcID);
        $categories = Category::all();
        $data = [
            'product' => $product,
            'categories' => $categories
        ];

        return view('components.product.editProduct', $data);
    }

    public function editProduct(Request $request)
    {
        try {
            $dcID = Crypt::decrypt($request->id);
        } catch (DecryptException $e) {
            return redirect()->back();
        }

        $product = Product::find($dcID);


        $flag = false;
        if ($request->hasFile('picture')) {
            if ($request->file('picture')->getClientOriginalName() != $product->picture) {
                $flag = true;
                $picture = $request->file('picture');
            }
        } else {
            $picture = $product->picture;
        }

        $this->validate($request, [
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric|between:0,999999',
            'stock' => 'required|numeric',
            'category' => 'required|numeric',
        ]);

        $product->name = $request->name;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->stock = $request->stock;
        $product->category_id = $request->category;
        if ($flag) {
            $product->picture = $picture->getClientOriginalName();
            Storage::putFileAs('public/products', $picture, $picture->getClientOriginalName());
        }
        $product->save();
        return redirect(url('/products'));
    }
}
