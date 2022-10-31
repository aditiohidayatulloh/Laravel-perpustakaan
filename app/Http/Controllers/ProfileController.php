<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

use File;
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

    public function update(request $request, $id){
        $request->validate([
            'name'=> 'required',
            'npm'=> 'required',
            'prodi'=> 'required',
            'alamat'=> 'required',
            'noTelp'=> 'required',
            'photoProfile'=> 'nullable|mimes:jpg,jpeg,png|max:2048'
        ],
        [
            'name.required'=>"Nama tidak boleh kosong",
            'npm.required'=>"Nomor Induk tidak boleh kosong",
            'prodi.required'=>"Prodi tidak boleh kosong",
            'alamat.required'=>"Alamat tidak boleh kosong",
            'noTelp.required'=>"Nomor Telepon tidak boleh kosong",
            'photoProfile.mimes' =>"Foto Profile Harus Berupa jpg,jpeg,atau png",
            'photoProfile.max' => "ukuran gambar tidak boleh lebih dari 2048 MB"
        ]);
        $iduser = Auth::id();
        $profile = Profile::where('users_id',$iduser)->first();
        $user = User::where('id',$iduser)->first();

        if($request->has('photoProfile')){
         $path='images/photoProifle';

         File::delete($path.$profile->photoProfile);

         $namaGambar = time().'.'.$request->photoProfile->extension();

         $request->photoProfile->move(public_path('images/photoProfile'),$namaGambar);

         $profile->photoProfile =$namaGambar;

         $profile->save();
        }
        $user->name = $request->name;
        $profile->npm = $request->npm;
        $profile->prodi = $request->prodi;
        $profile->alamat = $request->alamat;
        $profile->noTelp = $request->noTelp;

        $profile->save();
        $user->save();

        Alert::success('Success', 'Berhasil Mengubah Profile');
        return redirect('/profile');
    }

}
