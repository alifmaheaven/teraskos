<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

use App\Models\Account;
use App\Models\Type;

class DashboardController extends Controller
{
    public function typeNominalThisMonthOnly()
    {
        // $dateS = Carbon::now()->startOfMonth()->format('Y-m-d');
        // $dateE = Carbon::now()->endOfMonth()->format('Y-m-d');
        // WHEN transaction.date >= '.$dateS.' AND transaction.date < '.$dateE.' THEN 0

        $type = DB::table('type')
            ->select('type.id','type.name', 'type.description',
            DB::raw('SUM(
                    CASE WHEN transaction.is_active = 0 THEN 0
                    WHEN transaction.nominal IS NULL THEN 0

                    ELSE transaction.nominal END
                    ) nominal'),
                    'type.is_minus'
                    )
            ->where('type.user_id', '=', auth()->user()->id)
            ->where('type.is_active', '=', 1)
            ->where('transaction.is_internal', '=', 0)
            // ->whereBetween('transaction.date',[$dateS,$dateE])
            ->join('transaction', 'transaction.type_id' , '=', 'type.id', 'left outer')
            ->groupBy('id', 'name', 'description','is_minus')
            ->get();

        return response()->json(['data' => $type, 'message' => 'success get data'], 201);
    }

    public function typeNominalMonthly()
    {
        $type = DB::table('type')
            ->select('type.id','type.name', 'type.description',
            DB::raw('SUM(
                    CASE WHEN transaction.is_active = 0 THEN 0
                    WHEN transaction.nominal IS NULL THEN 0
                    ELSE transaction.nominal END
                    ) nominal'),
                    'type.is_minus',
                    DB::raw('transaction.date')
                    )
            ->where('type.user_id', '=', auth()->user()->id)
            ->where('type.is_active', '=', 1)
            ->where('transaction.is_internal', '=', 0)
            ->join('transaction', 'transaction.type_id' , '=', 'type.id', 'left outer')
            ->groupBy('type.id','type.name', 'type.description','type.is_minus','transaction.date')
            ->get();

        return response()->json(['data' => $type, 'message' => 'success get data'], 201);
    }

    public function accountNominalThisMonthOnly()
    {
        // $dateS = Carbon::now()->startOfMonth()->format('Y-m-d');
        // $dateE = Carbon::now()->endOfMonth()->format('Y-m-d');
        // WHEN transaction.date >= '.$dateS.' AND transaction.date < '.$dateE.' THEN 0

        $type = DB::table('account')
            ->select('account.id','account.name', 'account.description',
            DB::raw('SUM(
                CASE WHEN transaction.is_active = 0 THEN 0
                WHEN transaction.nominal IS NULL THEN 0
                WHEN type.is_minus = 1 THEN -transaction.nominal

                ELSE transaction.nominal END
                ) nominal'))
            ->where('account.user_id', '=', auth()->user()->id)
            ->where('account.is_active', '=', 1)
            ->where('transaction.is_internal', '=', 0)
            // ->whereBetween('transaction.date',[$dateS,$dateE])
            ->join('transaction', 'transaction.account_id' , '=', 'account.id', 'left outer')
            ->join('type', 'transaction.type_id' , '=', 'type.id', 'left outer')
            ->groupBy('id', 'name', 'description')
            ->get();

        $this->initialNewUser();

        return response()->json(['data' => $type, 'message' => 'success get data'], 201);
    }

    public function initialNewUser()
    {
        $account = DB::table('account')
            ->where('account.user_id', '=', auth()->user()->id)
            ->get();

        if (count($account) == 0) {
            // intial account
            account::create([
                'user_id' => auth()->user()->id,
                'name' => 'Cash',
                'description' => 'Uang yang kamu pegang sekarang',
            ]);
            account::create([
                'user_id' => auth()->user()->id,
                'name' => 'Tabungan',
                'description' => 'Uang yang kamu tabung sekarang',
            ]);

            // intial account
            type::create([
                'user_id' => auth()->user()->id,
                'name' => 'Pemasukan',
                'description' => 'Semua pemasukan memakai akun ini',
                'is_minus' => 0,
            ]);

            type::create([
                'user_id' => auth()->user()->id,
                'name' => 'Pengeluaran',
                'description' => 'Semua pengeluaran memakai akun ini',
                'is_minus' => 1
            ]);
        }
    }
}
