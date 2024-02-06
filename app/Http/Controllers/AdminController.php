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

}
