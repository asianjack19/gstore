<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OrderController extends Controller
{
    //
    public function getOrderPage(Request $request)
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

        $data = [
            'user' => $user,
        ];

        return view('components.order.createOrder', $data);
    }
}
