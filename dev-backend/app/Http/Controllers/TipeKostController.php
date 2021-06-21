<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TipeKost;

class TipeKostController extends Controller
{
    public function index()
    {
        return TipeKost::all();
    }

    public function show(TipeKost $tipeID)
    {
        return $tipeID;
    }

    public function store(Request $request)
    {
        $article = TipeKost::create($request->all());

        return response()->json([
            'message' => 'Tipe Berhasil Ditambah',
        ], 201);
    }

    public function update(Request $request, TipeKost $tipeID)
    {
        $tipeID->update($request->all());

        return response()->json($tipeID, 200);
    }

    public function delete(TipeKost $tipeID)
    {
        $tipeID->delete();

        return response()->json([
            'message' => 'Sukses Menghapus Tipe',
        ], 200);
    }
}
