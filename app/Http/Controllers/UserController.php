<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;

class UserController extends Controller
{
    //
    
    public function getUsers(Request $request)
    {
        if($request->query('q')){
              $users = User::where('name', 'like', '%'.$request->query('q').'%')
                            ->orWhere('email', 'like', '%'.$request->query('q').'%')
                            ->get();
        }else{
            $users = User::select('id', 'name', 'email', 'photo')
            ->get();
        }

        $data = [
            'users' => $users
        ];
        return view('components.user.user', $data);   
    }

    public function getUserDetailsByID(Request $request)
    {   
        try{
            $dcID = Crypt::decrypt($request->q);
        }catch(DecryptException $e){
            return redirect()->back();
        }

        $user = User::find($dcID);
        $data= [
            'user' =>$user,
        ];  
        return view('components.user.userDetail', $data);
    }

    public function getUpdateProfilePage(Request $request)
    {
        try{
            $dcID = Crypt::decrypt($request->q);
        }catch(DecryptException $e){
            return redirect()->back();
        }    

        $currentUser = Auth::user(); 
        if ($currentUser->id == $dcID) {
            $user = User::find($dcID);
        }else{
            return redirect()->back();
        }

        $data = [
            'user' => $user
        ];
        return view('components.user.updateProfile', $data);
    }

    public function updateProfile(Request $request)
    {
        try{
            $dcID = Crypt::decrypt($request->id);
        }catch(DecryptException $e){
            return redirect()->back();
        }    

        $currentUser = Auth::user();
        if ($currentUser->id == $dcID) {
            $user = User::find($dcID);
        }else{ 
            return redirect()->back();
        }

        $this->validate($request, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,'.$user->id,
            'phone' => 'required|string|max:255',
        ]);
        
        $user->name = $request->name;
        $user->email = $request->email;
        $user->address = $request->address;
        $user->phone = $request->phone;
        $user->save();
        return redirect(url('/users'));
    }
}
