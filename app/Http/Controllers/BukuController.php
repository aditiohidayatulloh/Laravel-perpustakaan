<?php

namespace App\Http\Controllers;

use File;
use App\Models\Buku;
use App\Models\Profile;
use App\Models\Kategori;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class BukuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->has('search')){
            $buku = Buku::where('judul','like','%'.$request->search.'%')->paginate(6);
        }
        else{
            $buku = Buku::paginate(6);
        }
        $iduser = Auth::id();
        $profile = Profile::where('users_id', $iduser)->first();
        return view('buku.tampil', ['buku' => $buku, 'profile' => $profile]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kategori = Kategori::all();
        $buku = Buku::all();
        $iduser = Auth::id();
        $profile = Profile::where('users_id', $iduser)->first();
        return view('buku.tambah', ['buku' => $buku, 'profile' => $profile, 'kategori'=>$kategori]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'judul' => 'required',
                'kode_buku'=>'required|unique:buku',
                'kategori_buku'=>'required',
                'pengarang' => 'required',
                'penerbit' => 'required',
                'tahun_terbit' => 'required',
                'deskripsi' => 'required',
                'gambar' => 'nullable|mimes:jpg,jpeg,png|max:2048',
            ],
            [
                'judul.required' => 'judul tidak boleh kosong',
                'kode_buku.required'=> 'Kode Buku Tidak Boleh Kosong',
                'kode_buku.unique'=> 'Kode Buku Telah Tersedia',
                'kategori_buku.required' =>'Harap masukan kategori',
                'pengarang.required' => 'pengarang tidak boleh kosong',
                'penerbit.requiered' => 'penerbit tidak boleh kosong',
                'tahun_terbit.required' => 'harap isi tahun terbit',
                'deskripsi.required' => 'deskripsi tidak boleh kosong',
                'gambar.mimes' => 'Gambar Harus Berupa jpg,jpeg,atau png',
                'gambar.max' => 'ukuran gambar tidak boleh lebih dari 2048 MB',
            ],
        );

        if ($request->hasFile('gambar')) {
            $nama_gambar = time() . '.' . $request->gambar->extension();
            $request->gambar->move(public_path('images'), $nama_gambar);

            $buku = Buku::create([
                'judul'=>$request['judul'],
                'kode_buku'=>$request['kode_buku'],
                'pengarang'=>$request['pengarang'],
                'penerbit'=>$request['penerbit'],
                'tahun_terbit'=>$request['tahun_terbit'],
                'deskripsi'=>$request['deskripsi'],
                'gambar'=>$nama_gambar
            ]);
            $buku->kategori_buku()->sync($request->kategori_buku);
        } else {
            $buku = Buku::create($request->all());
            $buku->kategori_buku()->sync($request->kategori_buku);
        }

        Alert::success('Berhasil', 'Berhasil Menambakan Data Buku');
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
        $iduser = Auth::id();
        $profile = Profile::where('users_id', $iduser)->first();
        return view('buku.detail', ['buku' => $buku, 'profile' => $profile]);
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
        $kategori = Kategori::all();
        $profile = Profile::where('users_id', $iduser)->first();
        $buku = Buku::find($id);
        return view('buku.edit', ['buku' => $buku, 'profile' => $profile,'kategori'=>$kategori]);
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
        $kategori= Kategori::find($id);
        $request->validate(
            [
                'judul' => 'required',
                'pengarang' => 'required',
                'penerbit' => 'required',
                'tahun_terbit' => 'required',
                'deskripsi' => 'required',
                'gambar' => 'nullable|mimes:jpg,jpeg,png|max:2048',
            ],
            [
                'judul.required' => 'judul tidak boleh kosong',
                'pengarang.required' => 'pengarang tidak boleh kosong',
                'penerbit.requiered' => 'penerbit tidak boleh kosong',
                'tahun_terbit.required' => 'harap isi tahun terbit',
                'deskripsi.required' => 'deskripsi tidak boleh kosong',
                'gambar.mimes' => 'Gambar Harus Berupa jpg,jpeg,atau png',
                'gambar.max' => 'ukuran gambar tidak boleh lebih dari 2048 MB',
            ],
        );

        if ($request->has('gambar')) {
            $path = 'images/';
            File::delete($path . $buku->gambar);

            $nama_gambar = time() . '.' . $request->gambar->extension();

            $request->gambar->move(public_path('images'), $nama_gambar);

            $buku->gambar = $nama_gambar;

            $buku->kategori_buku()->sync($request->kategori_buku);
            $buku->save();
        }
        $buku->judul = $request->judul;
        $buku->pengarang = $request->pengarang;
        $buku->penerbit = $request->penerbit;
        $buku->tahun_terbit = $request->tahun_terbit;
        $buku->deskripsi = $request->deskripsi;
        $buku->kategori_buku()->sync($request->kategori_buku);
        $buku->save();

        Alert::success('Berhasil', 'Update Berhasil');
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

        Alert::success('Berhasil', 'Buku Berhasil Terhapus');
        return redirect('buku');
    }
}
