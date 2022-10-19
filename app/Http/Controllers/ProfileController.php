<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function index(){
        $iduser = Auth::id();
        $profile = Profile::where('users_id',$iduser)->first();
        return view('profile.tampil',['profile'=>$profile]);
    }

    public function edit(){
        $iduser = Auth::id();
        $profile = Profile::where('users_id',$iduser)->first();
        return view('profile.edit',['profile'=>$profile]);
    }
}
