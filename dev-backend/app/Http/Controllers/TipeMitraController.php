<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TipeMitra;

class TipeMitraController extends Controller
{
    public function index()
    {
        return TipeMitra::all();
    }

    public function show(TipeMitra $MitraID)
    {
        return $MitraID;
    }

    public function store(Request $request)
    {
        $article = TipeMitra::create($request->all());

        return response()->json([
            'message' => 'Tipe Berhasil Ditambah',
        ], 201);
    }

    public function update(Request $request, TipeMitra $MitraID)
    {
        $MitraID->update($request->all());

        return response()->json($MitraID, 200);
    }

    public function delete(TipeMitra $MitraID)
    {
        $MitraID->delete();

        return response()->json([
            'message' => 'Sukses Menghapus Tipe',
        ], 200);
    }
}