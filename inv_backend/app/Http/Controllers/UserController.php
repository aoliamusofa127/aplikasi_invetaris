<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Database\Eloquent\Casts\Json;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api');
    }
    public function GetAllUser()
    {
        $data = User::all();
        return response()->json(["data" => $data], 200);
    }
    public function UserById($id)
    {
        $data = User::findOrFail($id);
        return response()->json(["data" => $data], 200);
    }
    public function RegisterUser(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'username' => 'required',
            'password' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }
        try {
            $data = new User([
                'username' => $request->username,
                'password' => Hash::make($request->password)
            ]);
            $data->save();
            return response()->json(["message" => "data berhasil disimpan"], 200);
        } catch (\Throwable $th) {
            return response()->json(["error" => "data gagal disimpan"], 200);
        }
    }
    public function UpdateUser(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'username' => 'required',
            'password' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }
        try {
            $findById = User::findOrFail($id);
            $findById->update([
                'username' => $request->username,
                'password' => Hash::make($request->password)
            ]);
            return response()->json(["message" => "Data berhasil diupdate"], 200);
        } catch (\Exception $e) {
            return response()->json(["error" => "Terjadi kesalahan saat memperbarui data"], 500);
        }
    }
    public function DeleteUser($id)
    {
        try {
            $findById = User::findOrFail($id);
            $findById->delete();
            return response()->json(["message" => "Data berhasil dihapus"], 200);
        } catch (\Exception $e) {
            return response()->json(["error" => "Terjadi kesalahan saat menghapus data"], 500);
        }
    }
}
