<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $transaction= transaction::where('user_id', '=', auth()->user()->id)
        //             ->where('is_active', '=', 1)
        //             ->get();

        $transaction = DB::table('transaction')
            ->select('transaction.id','transaction.name', 'transaction.description', 'transaction.nominal', 'transaction.date','transaction.foto', 'type.name as typename', 'type.is_minus', 'account.name as accountname','transaction.is_internal')
            ->where('transaction.user_id', '=', auth()->user()->id)
            ->where('transaction.is_active', '=', 1)
            ->leftJoin('type', 'transaction.type_id', '=', 'type.id')
            ->leftJoin('account', 'transaction.account_id', '=', 'account.id')
            ->orderBy('transaction.date', 'DESC')
            ->orderBy('transaction.created_at', 'DESC')
            ->get();

        return response()->json(['data' => $transaction, 'message' => 'success get data'], 201);
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
            'nominal' => 'required',
            'date' => 'required',
            'account_id' => 'required',
            'type_id' => 'required'
        ]);
        $temp = $validator->errors()->all();
        if ($validator->fails()) {
            return response()->json(['data' => '', 'message' => $temp[0]], 409);
        }

        $data = (object) $request->all();
        $data->user_id = auth()->user()->id;
        $data->foto = $data->foto ? $data->foto : '';
        $data->is_active = 1;
        $data->is_internal = $data->is_internal ? 1 : 0;

        transaction::create((array) $data);

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
        $transaction= transaction::where('id', '=', $id)
                    ->where('is_active', '=', 1)
                    ->first();
        $transaction->is_internal = $transaction->is_internal ? true : false;
        return response()->json(['data' => $transaction, 'message' => 'success get data'], 200);
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
    public function update(Request $request, transaction $transaction)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'nominal' => 'required',
            'date' => 'required',
            'account_id' => 'required',
            'type_id' => 'required'
        ]);
        $temp = $validator->errors()->all();
        if ($validator->fails()) {
            return response()->json(['data' => '', 'message' => $temp[0]], 409);
        }

        $data = (object) $request->only(['id','name', 'description','nominal','date', 'account_id', 'type_id', 'foto', 'is_internal']);
        $data->is_internal = $data->is_internal ? 1 : 0;
        $data->foto = $data->foto ? $data->foto : '';

        transaction::where('id', $data->id)->update((array) $data);

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

        transaction::where('id', $data->id)->update((array) $data);

        return response()->json(['data' => $data, 'message' => 'success delete'], 200);
    }
}
