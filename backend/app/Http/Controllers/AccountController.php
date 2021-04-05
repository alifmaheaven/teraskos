<?php

namespace App\Http\Controllers;

use App\Models\Account;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AccountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $account= account::where('user_id', '=', auth()->user()->id)
                    ->where('is_active', '=', 1)
                    ->get();

        return response()->json(['data' => $account, 'message' => 'success get data'], 201);
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
            // 'nominal' => 'required',
        ]);
        $temp = $validator->errors()->all();
        if ($validator->fails()) {
            return response()->json(['data' => '', 'message' => $temp[0]], 409);
        }

        $data = (object) $request->all();
        $data->user_id = auth()->user()->id;
        // $data->set_nominal = $data->set_nominal ? 1 : 0;
        $data->is_active = 1;

        account::create((array) $data);

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
        $account= account::where('id', '=', $id)
                    ->where('is_active', '=', 1)
                    ->first();

        $account->set_nominal = $account->set_nominal ? true : false;

        return response()->json(['data' => $account, 'message' => 'success get data'], 200);
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
    public function update(Request $request, account $account)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            // 'nominal' => 'required',
        ]);
        $temp = $validator->errors()->all();
        if ($validator->fails()) {
            return response()->json(['data' => '', 'message' => $temp[0]], 409);
        }

        $data = (object) $request->only(['id','name', 'description','nominal', 'set_nominal']);
        // $data->set_nominal = $data->set_nominal ? 1 : 0;
        account::where('id', $data->id)->update((array) $data);

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

        account::where('id', $data->id)->update((array) $data);

        return response()->json(['data' => $data, 'message' => 'success delete'], 201);
    }
}
