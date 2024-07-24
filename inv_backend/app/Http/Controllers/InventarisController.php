<?php

namespace App\Http\Controllers;

use App\Models\Inventaris;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class InventarisController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api');
    }
    public function GetAllInventaris()
    {
        $data = Inventaris::with("joinToRuang")->get();
        return response()->json(["data" => $data], 200);
    }
    public function AddInventaris(Request $request)
    {
        $validator = Validator::make($request->all(), [
            "id_ruang" => "required",
            "nama" => "required",
            "kondisi" => "required",
            "keterangan" => "required",
            "jumlah" => "required",
            "tanggal_register" => "required"
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }
        try {
            $data = new Inventaris([
                "id_ruang" => $request->id_ruang,
                "nama" => $request->nama,
                "kondisi" => $request->kondisi,
                "keterangan" => $request->keterangan,
                "jumlah" => $request->jumlah,
                "tanggal_register" => $request->tanggal_register
            ]);
            $data->save();
            return response()->json(["message" => "data berhasil disimpan"], 200);
        } catch (\Throwable $th) {
            return response()->json(["error" => "data gagal disimpan"], 200);
        }
    }
    public function UpdateInventaris(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            "id_ruang" => "required",
            "nama" => "required",
            "kondisi" => "required",
            "keterangan" => "required",
            "jumlah" => "required",
            "tanggal_register" => "required"
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }
        try {
            $findById = Inventaris::findOrFail($id);
            $findById->update([
                "id_ruang" => $request->id_ruang,
                "nama" => $request->nama,
                "kondisi" => $request->kondisi,
                "keterangan" => $request->keterangan,
                "jumlah" => $request->jumlah,
                "tanggal_register" => $request->tanggal_register
            ]);
            return response()->json(["message" => "Data berhasil diupdate"], 200);
        } catch (\Exception $e) {
            return response()->json(["error" => "Terjadi kesalahan saat memperbarui data"], 500);
        }
    }
    public function DeleteInventaris($id)
    {
        try {
            $findById = Inventaris::findOrFail($id);
            $findById->delete();
            return response()->json(["message" => "Data berhasil dihapus"], 200);
        } catch (\Exception $e) {
            return response()->json(["error" => "Terjadi kesalahan saat menghapus data"], 500);
        }
    }
}
