<?php

namespace App\Models;

use App\Models\Buku;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Peminjaman extends Model
{
    use HasFactory;

    protected $table = 'riwayat_pinjam';

    protected $fillable = [
      'users_id','buku_id','tanggal_pinjam','tanggal_wajib_kembali','tanggal_pengembalian'
    ];

    /**
     * Get the user that owns the Peminjaman
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'users_id', 'id');
    }
    /**
     * Get the user that owns the Peminjaman
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */


    public function buku(): BelongsTo
    {
        return $this->belongsTo(Buku::class, 'buku_id', 'id');
    }
}
