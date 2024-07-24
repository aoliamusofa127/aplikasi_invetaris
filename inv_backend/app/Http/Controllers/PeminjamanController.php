<?php

namespace App\Http\Controllers;

use App\Models\Peminjaman;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PeminjamanController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api');
    }

    public function GetAllPeminjaman()
    {
        $data = Peminjaman::with("joinToPegawai")->get();
        return response()->json(["data" => $data], 200);
    }
    public function AddPeminjaman(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id_pegawai' => 'required',
            'tanggal_pinjam' => 'required',
            'tanggal_kembali' => 'required',
            'status_peminjaman' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }
        try {
            $data = new Peminjaman([
                'id_pegawai' => $request->id_pegawai,
                'tanggal_pinjam' => $request->tanggal_pinjam,
                'tanggal_kembali' => $request->tanggal_kembali,
                'status_peminjaman' => $request->status_peminjaman,
            ]);
            $data->save();
            return response()->json(["message" => "data berhasil disimpan"], 200);
        } catch (\Throwable $th) {
            return response()->json(["error" => "data gagal disimpan.$th"], 200);
        }
    }
    public function UpdatePeminjaman(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'id_pegawai' => 'required',
            'tanggal_pinjam' => 'required',
            'tanggal_kembali' => 'required',
            'status_peminjaman' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }
        try {
            $findById = Peminjaman::findOrFail($id);
            $findById->update([
                'id_pegawai' => $request->id_pegawai,
                'tanggal_pinjam' => $request->tanggal_pinjam,
                'tanggal_kembali' => $request->tanggal_kembali,
                'status_peminjaman' => $request->status_peminjaman,
            ]);
            return response()->json(["message" => "Data berhasil diupdate"], 200);
        } catch (\Exception $e) {
            return response()->json(["error" => "Terjadi kesalahan saat memperbarui data"], 500);
        }
    }
    public function DeletePeminjaman($id)
    {
        try {
            $findById = Peminjaman::findOrFail($id);
            $findById->delete();
            return response()->json(["message" => "Data berhasil dihapus"], 200);
        } catch (\Exception $e) {
            return response()->json(["error" => "Terjadi kesalahan saat menghapus data"], 500);
        }
    }
}
