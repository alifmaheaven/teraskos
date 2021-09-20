<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\HargaKamar;
use Validator;

class HargaKamarController extends Controller
{
    public function index($KamarID)
    {
        $index = HargaKamar::where('KamarID', $KamarID)->get();

        if ($index->isEmpty()) {
            return [
                'message' => 'Harga Kamar Belum Ada'
            ];
        }else{
            return $index;
        }
    }

    public function show(HargaKamar $HargaID)
    {
        return $HargaID;
    }

    public function store(Request $request)
    {
        $req = Validator::make($request->all(), [
            'KamarID' => 'required|numeric',
            'penghuni' => 'required|numeric',
            'lama' => 'required|numeric',
            'harga' => 'required|numeric',
            'isActive' => 'numeric'
        ]);

        if($req->fails()){
            return response()->json($req->errors()->toJson(), 400);
        }

        $data = HargaKamar::create(array_merge(
            $req->validated()
        ));

        return response()->json([
            'message' => 'Sukses Menambah Harga Kamar',
            'data' => $data
        ], 201);
    }

    public function update(Request $request, HargaKamar $HargaID)
    {
        $HargaID->update($request->all());

        return response()->json($HargaID, 200);
    }

    public function delete(HargaKamar $HargaID)
    {
        $HargaID->delete();

        return response()->json([
            'message' => 'Sukses Menghapus Harga Kamar'
        ], 200);
    }
}
