<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Kategori;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $kategori = Kategori::count();
        $buku = Buku::count();
        $user = User::where('isAdmin','0')->count();

        if(Auth::user()->isAdmin==1) {
            return view('AdminDashboard',compact('kategori','buku','user'));
            }
            else{
            return view('AnggotaDashboard');
            }
    }
}
