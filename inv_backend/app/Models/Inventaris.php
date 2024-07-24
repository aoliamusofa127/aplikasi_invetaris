<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inventaris extends Model
{
    use HasFactory;
    protected $table = "inventaris";
    protected $primaryKey = "id_inventaris";
    protected $fillable = ["id_ruang", "nama", "kondisi", "keterangan", "jumlah", "tanggal_register"];

    public function JoinToRuang()
    {
        return $this->hasOne(Ruang::class, 'id_ruang', 'id_ruang');
    }
}
