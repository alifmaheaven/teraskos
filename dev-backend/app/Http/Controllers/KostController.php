<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kost;
use Validator;

class KostController extends Controller
{
    public function index()
    {
        return Kost::where('MitraID', 3)->get();
    }
    public function show(Kost $KostID)
    {
        return $KostID;
    }

    public function store(Request $request)
    {
        $req = Validator::make($request->all(), [
            'nama' => 'required|string|between:2,100|unique:Kost',
            'email' => 'required|string|email|max:100',
            'password' => 'required|string|confirmed|min:6',
            'TipeID' => 'required|numeric',
            'isActive' => 'numeric',
        ]);

        if($req->fails()){
            return response()->json($req->errors()->toJson(), 400);
        }

        $user = Kost::create(array_merge(
                    $req->validated(),
                    ['password' => bcrypt($request->password)]
                ));

        return response()->json([
            'message' => 'Kost Sukses Ditambah',
            'user' => $user
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
