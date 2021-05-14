<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\Models\TipeAdmin;
use App\Models\TipeMitra;

class TipeController extends Controller
{
    
    /**
     * Add Type.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function addadmin(Request $request)
    {
        $data = $request->all();

        $validator = Validator::make($data, [
            'jenis' => 'required|max:255',
            'deskripsi' => 'required|string',
            'tipeID' => 'required|numeric',
            'isActive' => 'numeric'
        ]);

        if ($validator->fails()) {
            return response(['error' => $validator->errors(), 'Tambah Tipe Gagal']);
        }

        $type = TipeAdmin::create($data);

        return response()->json([
            'message' => 'Tipe Berhasil Ditambah',
            'user' => $type
        ], 201);
    }

    public function addmitra(Request $request)
    {
        $data = $request->all();

        $validator = Validator::make($data, [
            'nama' => 'required|max:255',
            'isi' => 'required|string',
            'isActive' => 'numeric'
        ]);

        if ($validator->fails()) {
            return response(['error' => $validator->errors(), 'Tambah Tipe Gagal']);
        }

        $type = TipeMitra::create($data);

        return response()->json([
            'message' => 'Tipe Berhasil Ditambah',
            'user' => $type
        ], 201);
    }
}
