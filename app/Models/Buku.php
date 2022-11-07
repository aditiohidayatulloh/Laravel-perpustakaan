<?php

namespace App\Models;

use App\Models\Kategori;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Buku extends Model
{
    use HasFactory;

    protected $table = "buku";
    protected $fillable = [
        'judul',
        'kode_buku',
        'pengarang',
        'penerbit',
        'tahun_terbit',
        'deskripsi',
        'gambar'
    ];

    /**
     * The roles that belong to the Buku
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function kategori_buku():BelongsToMany
    {
        return $this->belongsToMany(Kategori::class, 'kategori_buku', 'buku_id', 'kategori_id');
    }
}
