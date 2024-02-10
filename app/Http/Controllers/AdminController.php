<?php


namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\Models\User;

class AdminController extends Controller
{

    public function AdminDashboard(){
        return view("admin.index");
    }// End Method

    public function AdminLogin(){
        return view("admin.admin_login");
    }
    public function AdminProfile(){
        $id = Auth::user()->id;
        $profileData = User::find($id);

        return view("admin.admin_profile", compact("profileData"));

    }

    public function handleLogout(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
    public function AdminProfileStore(Request $request){
        $id = Auth::user()->id;
        dump($request->address);
        $profileData = User::find($id);
        $profileData->name =  $request->name;
        $profileData->userName =  $request->userName;
        $profileData->email =  $request->email;
        $profileData->phoneNo =  $request->phoneNo;
        $profileData['address'] =  $request->address;

        if($request->file('photo')){
            $file = $request->file('photo');
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('upload/admin_image') , $filename );
            $profileData['photo'] =  $filename;

        }
        $profileData->save();


        return redirect()->back();


    }

}
