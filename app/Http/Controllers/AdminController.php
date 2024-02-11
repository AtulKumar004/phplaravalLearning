<?php


namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{

    public function AdminDashboard()
    {
        $id = Auth::user()->id;
        $profileData = User::find($id);


        return view("admin.index", compact("profileData"));
    } // End Method

    public function AdminLogin()
    {
        return view("admin.admin_login");
    }
    public function AdminProfile()
    {
        $id = Auth::user()->id;
        $profileData = User::find($id);

        return view("admin.admin_profile", compact("profileData"));

    }
    public function AdminChangePassword()
    {
        $id = Auth::user()->id;
        $profileData = User::find($id);
        return view("admin.admin_change_password", compact("profileData"));


    }

    public function AdminUpdatePassword(Request $request)
    {
        $request->validate([

            'old_password' => 'required',
            'new_password' => 'required|confirmed'  // for confirm password , name should be 'new_password_confirmation'
        ]);
        // check old password is match with actual password
        if (!Hash::check($request->old_password, auth::user()->password)) {
            $notification = array(
                'message' => "Old password does not match ",
                "alert-type" => 'error'
            );

            return back()->with($notification);

        }

        /// Update new password
        User::whereId(auth()->user()->id  )->update([
            'password' => Hash::make($request->new_password)
        ]);

        $notification = array(
            'message' => "Password update successful ",
            "alert-type" => 'success'
        );

        return back()->with($notification);


    }

    public function handleLogout(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
    public function AdminProfileStore(Request $request)
    {
        $id = Auth::user()->id;
        dump($request->address);
        $profileData = User::find($id);
        $profileData->name = $request->name;
        $profileData->userName = $request->userName;
        $profileData->email = $request->email;
        $profileData->phoneNo = $request->phoneNo;
        $profileData->address = $request->address;

        if ($request->file('photo')) {
            $file = $request->file('photo');
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('upload/admin_image'), $filename);
            $profileData['photo'] = $filename;

        }
        $profileData->save();

        $notification = array(
            'message' => "Profile Updated",
            "alert-type" => 'success'
        );

        return redirect()->back()->with($notification);


    }

}
