<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use App\Models\User;
use Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Redirect;

class OrderController extends Controller
{
    public function getOrderPage(Request $request)
    {
        try {
            $dcID = Crypt::decrypt($request->q);
            $dcProductID = Crypt::decrypt($request->product);
        } catch (DecryptException $e) {
            return redirect()->back();
        }

        $currentUser = Auth::user();
        if ($currentUser->id == $dcID) {
            $user = User::find($dcID);
            $product = Product::find($dcProductID);
        } else {
            return redirect()->back();
        }

        $data = [
            'user' => $user,
            'product' => $product,
        ];
        return view('components.order.createOrder', $data);
    }

    public function createOrder(Request $request)
    {
        $currentUser = Auth::user();
        try {
            $dcProductID = Crypt::decrypt($request->id);
        } catch (DecryptException $e) {
            return redirect()->back();
        }

        $product = Product::find($dcProductID);
        if ($request->quantity > $product->stock) {
            Session::flash('message', "quantity invalid");
            return Redirect::back();
        }

        $product->stock = $product->stock - $request->quantity;
        $product->save();

        if ($currentUser->balance < $request->quantity * $product->price) {
            Session::flash('message', "balance invalid");
            return Redirect::back();
        }
        $currentUser->balance = $currentUser->balance - ($product->price * $request->quantity);
        $currentUser->save();

        $order = new Order();
        $order->user_id = $currentUser->id;
        $order->amount = $request->quantity * $product->price;
        $order->destination = $currentUser->address;
        $order->save();

        $orderDetail = new OrderDetail();
        $orderDetail->order_id = $order->id;
        $orderDetail->product_id = $product->id;
        $orderDetail->quantity = $request->quantity;
        $orderDetail->save();

        return redirect('/products');
    }

    public function getOrders(Request $request)
    {
        try {
            $dcID = Crypt::decrypt($request->q);
        } catch (DecryptException $e) {
            return redirect()->back();
        }

        $currentUser = Auth::user();
        if ($currentUser->id == $dcID) {
            $user = User::find($dcID);
        } else {
            return redirect()->back();
        }

        $ordersMade = Order::join('users', 'users.id', '=', 'orders.user_id')
            ->join('order_details', 'order_details.order_id', '=', 'orders.id')
            ->join('products', 'products.id', '=', 'order_details.product_id')
            ->select('orders.*', 'users.name as user_name')
            ->where('orders.user_id', $dcID)
            ->get();

        $ordersReceived = Order::join('order_details', 'orders.id', '=', 'order_details.order_id')
            ->join('products', 'order_details.product_id', '=', 'products.id')
            ->join('users', 'users.id', '=', 'orders.user_id')
            ->where('products.owner_id', $dcID)
            ->select('orders.*', 'users.name as user_name')
            ->get();

        $data = [
            'ordersMade' => $ordersMade,
            'ordersReceived' => $ordersReceived,
        ];

        return view('components.order.orderList', $data);
    }

    public function getOrderDetail(Request $request)
    {
        try {
            $dcID = Crypt::decrypt($request->q);
        } catch (DecryptException $e) {
            return redirect()->back();
        }

        $orderDetail = OrderDetail::join('products', 'products.id', '=', 'order_details.product_id')
            ->where('order_details.order_id', $dcID)
            ->get();

        $order = Order::find($dcID);

        $product = Product::find($orderDetail[0]->product_id);

        $data = [
            'orderDetail' => $orderDetail,
            'product' => $product,
            'order' => $order,
        ];

        return view('components.order.orderDetail', $data);
    }
}
