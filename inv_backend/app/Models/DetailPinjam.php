<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailPinjam extends Model
{
    use HasFactory;
    protected $table = "detail_pinjam";
    protected $primaryKey = "id_pinjam";
    protected $fillable = ["id_peminjaman", "id_inventaris", "jumlah"];


    public function JoinToPeminjaman()
    {
        return $this->hasOne(Peminjaman::class, 'id_peminjaman', 'id_peminjaman');
    }

    public function JoinToInventaris()
    {
        return $this->hasOne(Inventaris::class, 'id_inventaris', 'id_inventaris');
    }
}
