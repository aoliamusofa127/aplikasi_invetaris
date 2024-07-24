<?php

namespace App\Http\Controllers;

use App\Models\Ruang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class RuangController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api');
    }

    public function GetAllRuang()
    {
        $data = Ruang::all();
        return response()->json(["data" => $data], 200);
    }
    public function RuangById($id)
    {
        $data = Ruang::findOrFail($id);
        return response()->json(["data" => $data], 200);
    }
    public function AddRuang(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama_ruang' => 'required',
            'keterangan' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }
        try {
            $data = new Ruang([
                'nama_ruang' => $request->nama_ruang,
                'keterangan' => $request->keterangan,
            ]);
            $data->save();
            return response()->json(["message" => "data berhasil disimpan"], 200);
        } catch (\Throwable $th) {
            return response()->json(["error" => "data gagal disimpan"], 200);
        }
    }
    public function UpdateRuang(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'nama_ruang' => 'required',
            'keterangan' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }
        try {
            $findById = Ruang::findOrFail($id);
            $findById->update([
                'nama_ruang' => $request->nama_ruang,
                'keterangan' => $request->keterangan,
            ]);
            return response()->json(["message" => "Data berhasil diupdate"], 200);
        } catch (\Exception $e) {
            return response()->json(["error" => "Terjadi kesalahan saat memperbarui data"], 500);
        }
    }
    public function DeleteRuang($id)
    {
        try {
            $findById = Ruang::findOrFail($id);
            $findById->delete();
            return response()->json(["message" => "Data berhasil dihapus"], 200);
        } catch (\Exception $e) {
            return response()->json(["error" => "Terjadi kesalahan saat menghapus data"], 500);
        }
    }
}
