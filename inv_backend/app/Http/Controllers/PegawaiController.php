<?php

namespace App\Http\Controllers;

use App\Models\Pegawai;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PegawaiController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api');
    }
    public function GetAllPegawai()
    {
        $data = Pegawai::with("joinToUser")->get();
        return response()->json(["data" => $data], 200);
    }
    public function PegawaiById($id)
    {
        $data = Pegawai::with("joinToUser")->findOrFail($id);
        return response()->json(["data" => $data], 200);
    }
    public function AddPegawai(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id_user' => 'required',
            'nama_pegawai' => 'required',
            'nip' => 'required',
            'alamat' => 'required',
            'status' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }
        try {
            $data = new Pegawai([
                'id_user' => $request->id_user,
                'nama_pegawai' => $request->nama_pegawai,
                'nip' => $request->nip,
                'alamat' => $request->alamat,
                'status' => $request->status,
            ]);
            $data->save();
            return response()->json(["message" => "data berhasil disimpan"], 200);
        } catch (\Throwable $th) {
            return response()->json(["error" => "data gagal disimpan"], 200);
        }
    }
    public function UpdatePegawai(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'id_user' => 'required',
            'nama_pegawai' => 'required',
            'nip' => 'required',
            'alamat' => 'required',
            'status' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }
        try {
            $findById = Pegawai::findOrFail($id);
            $findById->update([
                'id_user' => $request->id_user,
                'nama_pegawai' => $request->nama_pegawai,
                'nip' => $request->nip,
                'alamat' => $request->alamat,
                'status' => $request->status,
            ]);
            return response()->json(["message" => "Data berhasil diupdate"], 200);
        } catch (\Exception $e) {
            return response()->json(["error" => "Terjadi kesalahan saat memperbarui data"], 500);
        }
    }
    public function DeletePegawai($id)
    {
        try {
            $findById = Pegawai::findOrFail($id);
            $findById->delete();
            return response()->json(["message" => "Data berhasil dihapus"], 200);
        } catch (\Exception $e) {
            return response()->json(["error" => "Terjadi kesalahan saat menghapus data"], 500);
        }
    }
}
