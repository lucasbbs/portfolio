<?php

namespace App\Http\Controllers;

use App\Models\User;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ChangePassController extends Controller
{
    public function CPassword()
    {
        return view('admin.body.change_password');
    }

    public function UpdatePassword(Request $request) {
        $validateData = $request->validate([
            'oldpassword' => 'required',
            'password' => 'required|confirmed',
        ]);

        $oldpassword = $request->oldpassword;
        $password = $request->password;
        $cpassword = $request->password_confirmation;

        $hashpassword = Auth::user()->password;

        if (Hash::check($oldpassword, $hashpassword)) {
            if (!Hash::check($password, $hashpassword)) {
                if ($password === $cpassword) {
                    User::find(Auth::id())->update([
                        'password' => Hash::make($password),
                    ]);
                    Auth::logout();
                    $notification = array(
                        'message' => 'Password Changed Successfully',
                        'alert-type' => 'success',
                    );
                    return Redirect()->route('login')->with($notification);
                } else {
                    return Redirect()->back()->with('error', 'New Password and Confirm Password are not matched');
                }
            } else {
                return Redirect()->back()->with('error', 'New Password cannot be the same as Old Password');
            }
        } else {
            return Redirect()->back()->with('error', 'Current Password is invalid');
        }
    }

    public function PUpdate() {
        if (Auth::user()) {
            $user = User::find(Auth::user()->id);
            if ($user) {
                return view('admin.body.update_profile', compact('user'));
            }
        }
    }

    public function UpdateProfile(Request $request) {
        $user = User::find(Auth::id());
        if ($user) {
            $user->name = $request['name'];
            $user->email = $request['email'];

            $user->save();
            return Redirect()->back()->with('success', 'Profile Updated Successfully');
        } else {
            return Redirect()->back();
        }
    }
}
