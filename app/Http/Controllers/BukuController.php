<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use File;
class BukuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $buku = Buku::all();
        return view('buku.tampil',['buku'=>$buku]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('buku.tambah');
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
            'judul' => 'required',
            'pengarang'=> 'required',
            'penerbit' => 'required',
            'tahun_terbit'=>'required',
            'deskripsi'=> 'required',
            'gambar' =>'nullable'
        ],
        [
            'judul.required' => "judul tidak boleh kosong",
            'pengarang.required' => "pengarang tidak boleh kosong",
            'penerbit.requiered' => "penerbit tidak boleh kosong",
            'tahun_terbit.required'=> "harap isi tahun terbit",
            'deskripsi.required' => "deskripsi tidak boleh kosong",
        ]
        );

        if($request->hasFile('gambar')){
            $nama_gambar = time().'.'.$request->gambar->extension();
            $request->gambar->move(public_path('images'),$nama_gambar);

            $buku = new Buku;
            $buku->judul = $request->judul;
            $buku->pengarang =$request->pengarang;
            $buku->penerbit = $request->penerbit;
            $buku->tahun_terbit =$request->tahun_terbit;
            $buku->deskripsi = $request->deskripsi;
            $buku->gambar=$nama_gambar;
            $buku->save();

        }else{
        $buku = new Buku;
        $buku->judul = $request->judul;
        $buku->pengarang =$request->pengarang;
        $buku->penerbit = $request->penerbit;
        $buku->tahun_terbit =$request->tahun_terbit;
        $buku->deskripsi = $request->deskripsi;

        $buku ->save();
        }
        return redirect('/buku');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $buku = Buku::find($id);
        return view('buku.detail',['buku'=>$buku]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $buku =Buku::find($id);
        return view('buku.edit',['buku'=>$buku]);
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
        $buku = Buku::find($id);

        $request->validate([
            'judul' => 'required',
            'pengarang'=> 'required',
            'penerbit' => 'required',
            'tahun_terbit'=>'required',
            'deskripsi'=> 'required',
            'gambar' =>'nullable'
        ],
        [
            'judul.required' => "judul tidak boleh kosong",
            'pengarang.required' => "pengarang tidak boleh kosong",
            'penerbit.requiered' => "penerbit tidak boleh kosong",
            'tahun_terbit.required'=> "harap isi tahun terbit",
            'deskripsi.required' => "deskripsi tidak boleh kosong",
        ]
        );

        if($request->has('gambar')){
            $path='images/';
            File::delete($path.$buku->gambar);

            $nama_gambar = time().'.'.$request->gambar->extension();

            $request->gambar->move(public_path('images'),$nama_gambar);

            $buku->gambar =$nama_gambar;

            $buku->save();
        }
        $buku->judul =$request->judul;
        $buku->pengarang=$request->pengarang;
        $buku->penerbit =$request->penerbit;
        $buku->tahun_terbit =$request->tahun_terbit;
        $buku->deskripsi =$request->deskripsi;

        $buku->save();

        return redirect('/buku');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $buku = Buku::find($id);

        $buku->delete();

        return redirect('buku');
    }
}
