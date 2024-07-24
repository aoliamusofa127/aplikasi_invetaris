<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pegawai extends Model
{
    use HasFactory;
    protected $table = "pegawai";
    protected $primaryKey = "id_pegawai";
    protected $fillable = ["id_user", "nama_pegawai", "nip", "alamat", "status"];

    public function JoinToUser()
    {
        return $this->hasOne(User::class, 'id_user', 'id_user');
    }
}
