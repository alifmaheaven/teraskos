<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kost;
use App\Models\MitraKos;
use Validator;

class KostController extends Controller
{
    public function index()
    {
        return Kost::all();
    }

    public function showbyID($MitraID)
    {
        $index = Kost::where('MitraID', $MitraID)->get();

        if ($index->isEmpty()){
            return [
                'message' => 'Data Kost Belum Ada'
            ];
        }else{
            return $index;
        }
    }

    public function show(Kost $KostID)
    {
        return $KostID;
    }

    public function store(Request $request)
    {
        $req = Validator::make($request->all(), [
            'MitraID' => 'required|numeric',
            'nama' => 'required|string',
            'deskripsi' => 'required|string',
            'provinsi' => 'required|string',
            'kota' => 'required|string',
            'kodepos' => 'required|numeric',
            'alamat' => 'required|string',
            'isActive' => 'numeric',
        ]);

        if($req->fails()){
            return response()->json($req->errors()->toJson(), 400);
        }

        $user = Kost::create(array_merge(
            $req->validated()
        ));

        return response()->json([
            'message' => 'Kost Sukses Ditambah',
            'Data Kost' => $user
        ], 201);
    }

    public function update(Request $request, Kost $KostID)
    {
        $KostID->update($request->all());

        return response()->json($KostID, 200);
    }

    public function delete(Kost $KostID)
    {
        $KostID->delete();

        return response()->json([
            'message' => 'Sukses Menghapus Kost',
        ], 200);
    }
}
