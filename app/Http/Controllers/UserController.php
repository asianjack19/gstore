<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    //

    public function getUsers(Request $request)
    {
        if ($request->query('q')) {
            $users = User::whereRaw('LOWER(name) LIKE ?', [trim(strtolower($request->query('q')) . '%')])
                ->orWhereRaw('LOWER(email) LIKE ?', [trim(strtolower($request->query('q')) . '%')])
                ->paginate(10);
        } else {
            $users = User::select('id', 'name', 'email', 'photo')
                ->paginate(10);
        }

        $data = [
            'users' => $users
        ];
        return view('components.user.user', $data);
    }

    public function getUserDetailsByID(Request $request)
    {
        try {
            $dcID = Crypt::decrypt($request->q);
        } catch (DecryptException $e) {
            return redirect()->back();
        }

        $user = User::find($dcID);
        $data = [
            'user' => $user,
        ];
        return view('components.user.userDetail', $data);
    }

    public function getUpdateProfilePage(Request $request)
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
            'user' => $user
        ];
        return view('components.user.updateProfile', $data);
    }

    public function updateProfile(Request $request)
    {
        try {
            $dcID = Crypt::decrypt($request->id);
        } catch (DecryptException $e) {
            return redirect()->back();
        }

        $currentUser = Auth::user();
        if ($currentUser->id == $dcID) {
            $user = User::find($dcID);
        } else {
            return redirect()->back();
        }

        $flag = false;
        if ($request->hasFile('photo')) {
            if ($request->file('photo')->getClientOriginalName() != $currentUser->photod) {
                $flag = true;
                $photo = $request->file('photo');
            }
        } else {
            $photo = $currentUser->photo;
        }

        $this->validate($request, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $dcID,
            'phone' => 'required|string|max:255',
        ]);

        $user->name = $request->name;
        $user->email = $request->email;
        $user->address = $request->address;
        $user->phone = $request->phone;

        if ($flag == true) {
            $user->photo = $photo->getClientOriginalName();
            Storage::putFileAs('public/users', $photo, $photo->getClientOriginalName());
        }
        $user->save();
        return redirect(url('/users'));
    }

    public function getUpdateBalance(Request $request)
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
            'user' => $user
        ];
        return view('components.user.updateBalance', $data);
    }
    public function updateBalance(Request $request)
    {
        try {
            $dcID = Crypt::decrypt($request->id);
        } catch (DecryptException $e) {
            return redirect()->back();
        }

        $currentUser = Auth::user();
        if ($currentUser->id == $dcID) {
            $user = User::find($dcID);
        } else {
            return redirect()->back();
        }

        $this->validate($request, [
            'balance' => 'required|numeric',
        ]);

        $user->balance += $request->balance;
        $user->save();
        return redirect(url('/users'));
    }
}
