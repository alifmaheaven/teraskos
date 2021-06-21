<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Fasilitas;

class FasilitasController extends Controller
{
    public function index()
    {
        return Fasilitas::all();
    }

    public function show(Fasilitas $fasilitasID)
    {
        return $fasilitasID;
    }

    public function store(Request $request)
    {
        $article = Fasilitas::create($request->all());

        return response()->json([
            'message' => 'Tipe Berhasil Ditambah',
        ], 201);
    }

    public function update(Request $request, Fasilitas $fasilitasID)
    {
        $fasilitasID->update($request->all());

        return response()->json($fasilitasID, 200);
    }

    public function delete(Fasilitas $fasilitasID)
    {
        $fasilitasID->delete();

        return response()->json([
            'message' => 'Sukses Menghapus Tipe',
        ], 200);
    }
}
