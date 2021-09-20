<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FasilitasKamar;
use Validator;

class FasilitasKamarController extends Controller
{
    public function index(){
        return FasilitasKamar::all();
    }

    public function show($KamarID){
        $index = FasilitasKamar::where('KamarID', $KamarID)->get();

        if ($index->isEmpty()){
            return [
                'message' => 'Kost Belum Ada Fasilitas'
            ];
        }else{
            return $index;
        }
    }

    public function detail($FasilID){
        $index = FasilitasKamar::where('FasilID', $FasilID)->get();

        if ($index->isEmpty()){
            return [
                'message' => 'Belum Ada Fasilitas'
            ];
        }else{
            return $index;
        }
    }

    public function store(Request $request){
        $req = Validator::make($request->all(), [
            'KamarID' => 'required|numeric',
            'nama' => 'required|string',
            'deskripsi' => 'required|string',
            'isActive' => 'numeric'
        ]);

        if($req->fails()){
            return response()->json($req->errors()->toJson(), 400);
        }

        $kamar = FasilitasKamar::create(array_merge(
            $req->validated()
        ));

        return response()->json([
            'message' => 'Fasilitas Kamar Sukses Ditambah',
            'Data Kamar' => $kamar
        ], 201);
    }

    public function update(Request $request, FasilitasKamar $FasilID)
    {
        $FasilID->update($request->all());

        return response()->json($FasilID, 200);
    }

    public function delete(FasilitasKamar $FasilID)
    {
        $FasilID->delete();

        return response()->json([
            'message' => 'Sukses Menghapus Fasilitas Kamar',
        ], 200);
    }
}
