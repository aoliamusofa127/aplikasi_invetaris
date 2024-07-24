<?php

namespace App\Http\Controllers;

use App\Models\DetailPinjam;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class DetailPinjamController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api');
    }

    public function GetAllDetailPinjam()
    {
        $data = DetailPinjam::with("joinToPeminjaman.joinToPegawai", "joinToInventaris")->get();
        return response()->json(["data" => $data], 200);
    }
    public function AddDetailPinjam(Request $request)
    {
        $validator = Validator::make($request->all(), [
            "id_peminjaman" => "required",
            "id_inventaris" => "required",
            "jumlah" => "required",
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }
        try {
            $data = new DetailPinjam([
                "id_peminjaman" => $request->id_peminjaman,
                "id_inventaris" => $request->id_inventaris,
                "jumlah" => $request->jumlah,
            ]);
            $data->save();
            return response()->json(["message" => "data berhasil disimpan"], 200);
        } catch (\Throwable $th) {
            return response()->json(["error" => "data gagal disimpan"], 200);
        }
    }
    public function UpdateDetailPinjam(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            "id_peminjaman" => "required",
            "id_inventaris" => "required",
            "jumlah" => "required",
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }
        try {
            $findById = DetailPinjam::findOrFail($id);
            $findById->update([
                "id_peminjaman" => $request->id_peminjaman,
                "id_inventaris" => $request->id_inventaris,
                "jumlah" => $request->jumlah,
            ]);
            return response()->json(["message" => "Data berhasil diupdate"], 200);
        } catch (\Exception $e) {
            return response()->json(["error" => "Terjadi kesalahan saat memperbarui data"], 500);
        }
    }
    public function DeleteDetailPinjam($id)
    {
        try {
            $findById = DetailPinjam::findOrFail($id);
            $findById->delete();
            return response()->json(["message" => "Data berhasil dihapus"], 200);
        } catch (\Exception $e) {
            return response()->json(["error" => "Terjadi kesalahan saat menghapus data"], 500);
        }
    }
}
