<?php

namespace App\Http\Controllers;

use App\Models\Peminjaman;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use \PDF;

class CetakLaporanController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $riwayat_peminjaman = Peminjaman::with('user','buku')->get();

        $pdf =PDF::loadView('peminjaman.laporan_pdf',['riwayat_peminjaman'=>$riwayat_peminjaman]);

        return $pdf->download('laporan_peminjaman.pdf');
    }
}
