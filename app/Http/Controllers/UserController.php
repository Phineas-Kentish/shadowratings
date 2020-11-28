<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function home () {
        return view('welcome');
    }

    public function calculate (Request $request) {
        $total_assets = $request->total_assets;
        $total_debt = $request->total_debt;
        $ebitda = $request->ebitda;
        $interest_expense = $request->interest_expense;
        $wc = $request->wc;











        return response([
            "graph_data" => [$total_assets, $total_debt, $ebitda, $interest_expense, $wc]
        ]);
    } 
}
