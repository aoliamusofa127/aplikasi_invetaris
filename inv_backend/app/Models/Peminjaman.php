<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peminjaman extends Model
{
    use HasFactory;
    protected $table = "peminjaman";
    protected $primaryKey = "id_peminjaman";
    protected $fillable = ["id_pegawai", "tanggal_pinjam", "tanggal_kembali", "status_peminjaman"];

    public function JoinToPegawai()
    {
        return $this->hasOne(Pegawai::class, 'id_pegawai', 'id_pegawai');
    }
}
