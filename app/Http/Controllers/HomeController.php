<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // query count user
        $countUser = User::count();
        $countProduct = Product::count();
        $countOrder = Order::count();
        $countCategory = Category::count();

        return view('home', compact('countUser', 'countProduct', 'countOrder', 'countCategory'));
    }
}
