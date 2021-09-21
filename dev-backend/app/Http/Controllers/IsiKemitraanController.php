<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\IsiKemitraan;
use Validator;

class IsiKemitraanController extends Controller
{
    public function index()
    {
        return IsiKemitraan::all();
    }

    public function showbyID($PaketID)
    {
        $index = IsiKemitraan::where('PaketID', $PaketID)->get();

        if ($index->isEmpty()){
            return [
                'message' => 'Isi Paket Belum Ada'
            ];
        }else{
            return $index;
        }
    }

    public function detail(IsiKemitraan $IsiPaketID)
    {
       return $IsiPaketID;
    }

    public function store(Request $request)
    {
        $data = Validator::make($request->all(), [
            'layanan' => 'required|string',
            'nilai' => 'required|numeric',
            'PaketID' => 'required|numeric',
            'isActive' => 'numeric'
        ]);

        if($data->fails()){
            return response()->json($data->errors()->toJson(), 400);
        }

        $input = IsiKemitraan::create(array_merge(
            $data->validated()
        ));

        return response()->json([
            'message' => 'Sukses Menambah Isi Paket',
            'Data Paket' => $input
        ], 201);
    }

    public function update(Request $request, IsiKemitraan $IsiPaketID)
    {
        $IsiPaketID->update($request->all());

        return response()->json($IsiPaketID, 200);
    }

    public function delete(IsiKemitraan $IsiPaketID)
    {
        $IsiPaketID->delete();

        return response()->json([
            'message' => 'Sukses Menghapus Isi Paket'
        ], 200);
    }
}
