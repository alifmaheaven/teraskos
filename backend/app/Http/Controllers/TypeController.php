<?php

namespace App\Http\Controllers;

use App\Models\Type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $type= type::where('user_id', '=', auth()->user()->id)
                    ->where('is_active', '=', 1)
                    ->get();

        return response()->json(['data' => $type, 'message' => 'success get data'], 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'is_minus' => 'required'
        ]);
        $temp = $validator->errors()->all();
        if ($validator->fails()) {
            return response()->json(['data' => '', 'message' => $temp[0]], 409);
        }

        $data = (object) $request->all();
        $data->user_id = auth()->user()->id;
        $data->is_active = 1;
        $data->is_minus = $data->is_minus ? 1 : 0;

        type::create((array) $data);

        return response()->json(['data' => $data, 'message' => 'success created'], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function show($id = null)
    {
        $type= type::where('id', '=', $id)
                    ->where('is_active', '=', 1)
                    ->first();

        $type->is_minus = $type->is_minus ? true : false;

        return response()->json(['data' => $type, 'message' => 'success get data'], 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {

    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, type $type)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'is_minus' => 'required'
        ]);
        $temp = $validator->errors()->all();
        if ($validator->fails()) {
            return response()->json(['data' => '', 'message' => $temp[0]], 409);
        }

        $data = (object) $request->only(['id','name','is_minus', 'description']);
        $data->is_minus = $data->is_minus ? 1 : 0;
        type::where('id', $data->id)->update((array) $data);

        return response()->json(['data' => $data, 'message' => 'success update'], 201);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $request->validate([
            'id' => 'required',
        ]);

        $data = (object) $request->only(['id']);
        $data->is_active = 0;

        type::where('id', $data->id)->update((array) $data);

        return response()->json(['data' => $data, 'message' => 'success delete'], 200);
    }
}
