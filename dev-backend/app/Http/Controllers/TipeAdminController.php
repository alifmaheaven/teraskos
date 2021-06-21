<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TipeAdmin;

class TipeAdminController extends Controller
{
    public function index()
    {
        return TipeAdmin::all();
    }

    public function show(TipeAdmin $tipeID)
    {
        return $tipeID;
    }

    public function store(Request $request)
    {
        $article = TipeAdmin::create($request->all());

        return response()->json([
            'message' => 'Tipe Berhasil Ditambah',
        ], 201);
    }

    public function update(Request $request, TipeAdmin $tipeID)
    {
        $tipeID->update($request->all());

        return response()->json($tipeID, 200);
    }

    public function delete(TipeAdmin $tipeID)
    {
        $tipeID->delete();

        return response()->json([
            'message' => 'Sukses Menghapus Tipe',
        ], 200);
    }
}