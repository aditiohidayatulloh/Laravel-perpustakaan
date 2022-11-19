<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Profile;
use App\Models\Kategori;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $iduser = Auth::id();
        $profile = Profile::where('users_id',$iduser)->first();
        $kategori = Kategori::all();
        return view('kategori.tampil',['kategori'=>$kategori,'profile'=>$profile]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $iduser = Auth::id();
        $profile = Profile::where('users_id',$iduser)->first();
        $kategori = Kategori::all();
        return view('Kategori.tambah',['kategori' =>$kategori,'profile'=>$profile]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|min:2',
        ],
        [
            'nama.required' => "Masukkan nama kategori",
            'nama.min' => "Minimal 2 karakter"
        ]);

        $kategori = Kategori::create($request->all());

        Alert::success('Berhasil', 'Berhasil Menambahkan Kategori');
        return redirect('/kategori');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $iduser = Auth::id();
        $profile = Profile::where('users_id',$iduser)->first();
        $kategori= Kategori::find($id);
        $buku = Buku::all();
        return view('kategori.detail',['kategori'=>$kategori,'profile'=>$profile,'buku'=>$buku]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $iduser = Auth::id();
        $profile = Profile::where('users_id',$iduser)->first();
        $kategori = Kategori::find($id);
        return view('kategori.edit',['kategori'=>$kategori,'profile'=>$profile]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|min:2',
        ],
        [
            'nama.required' => "Masukkan nama kategori",
            'nama.min' => "Minimal 2 karakter"
        ]);

        $kategori = new Kategori;
        $kategori =Kategori::find($id);

        $kategori ->nama =$request->nama;
        $kategori ->deskripsi= $request->deskripsi;

        $kategori->save();

        Alert::success('Berhasil', 'Update Success');
        return redirect('/kategori');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $kategori=Kategori::find($id);

        $kategori->delete();

        Alert::success('Berhasil', 'Berhasil Menghapus Kategori');
        return redirect('kategori');
    }
}
