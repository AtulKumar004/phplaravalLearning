<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PropertyType;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class PropertyTypeController extends Controller
{

    public function handleAllType()
    {
        $types = PropertyType::latest()->get();
        $id = Auth::user()->id;
        $profileData = User::find($id);

        return view('backend.type.alltype',  compact("types" , 'profileData'));
    }
}
