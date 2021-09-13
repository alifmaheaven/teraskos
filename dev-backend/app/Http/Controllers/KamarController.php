<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kamar;
use Validator;

class KamarController extends Controller
{
    public function index()
    {
        $index =  Kamar::all();
        if ($index->isEmpty()){
            return [
                'message' => 'Data Kamar Belum Ada'
            ];
        }else{
            return $index;
        }
    }

    public function showbyID($KostID)
    {
        $index = Kamar::where('KostID', $KostID)->get();

        if ($index->isEmpty()){
            return [
                'message' => 'Data Kamar Belum Ada'
            ];
        }else{
            return $index;
        }
    }

    public function detail(Kamar $KamarID)
    {
        return $KamarID;
    }

    public function store(Request $request)
    {
        $req = Validator::make($request->all(), [
            'KostID' => 'required|numeric',
            'jumlah' => 'required|numeric',
            'isActive' => 'numeric',
        ]);

        if($req->fails()){
            return response()->json($req->errors()->toJson(), 400);
        }

        $kamar = Kamar::create(array_merge(
            $req->validated()
        ));

        return response()->json([
            'message' => 'Jumlah Kamar Sukses Ditambah',
            'Data Kamar' => $kamar
        ], 201);
    }

    public function update(Request $request, Kamar $KamarID)
    {
        $KamarID->update($request->all());

        return response()->json($KamarID, 200);
    }

    public function delete(Kamar $KamarID)
    {
        $KamarID->delete();

        return response()->json([
            'message' => 'Sukses Menghapus Jumlah Kamar',
        ], 200);
    }
}
