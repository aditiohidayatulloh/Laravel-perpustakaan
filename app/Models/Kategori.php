<?php

namespace App\Models;

use App\Models\Buku;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
class Kategori extends Model
{
    use HasFactory;
    protected $table ="kategori";
    protected $fillable = [
        'nama',
        'deskripsi'
    ];


     /**
     *
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function kategori_buku()
    {
        return $this->belongsToMany(Buku::class,'kategori_buku','kategori_id','buku_id');
    }
}
