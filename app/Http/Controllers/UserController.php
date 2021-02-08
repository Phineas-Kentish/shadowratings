<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public $Bs = [-0.00112, 2.29645, -6.60535, -0.07414, -2.81078];

    public $Cs = [-8.15050, -7.45574, -6.74884, -6.01020, -5.54938, -4.98996, -4.41147, -3.39834, -2.36973, -1.51948, -0.60890, 0.41145, 1.60745, 2.09368, 2.53504, 3.17163];

    public $Ds = [];

    public $Es = [];

    public $sum = 0;

    public function home () {
        return view('welcome');
    }

    public function calculate (Request $request) {
        $total_assets = $request->total_assets; // Don't change
        $total_debt = $request->total_debt;
        $ebitda = $request->ebitda;
        $interest_expense = $request->interest_expense;
        $wc = $request->wc;

        // Step 1
        $fin_ratios = [
            $total_assets,
            $total_debt/$total_assets,
            $ebitda/$total_assets,
            $ebitda/$interest_expense,
            $wc/$total_assets,
        ];

        // Step 2        
        for($i = 0; $i < count($this->Bs); $i++){
            $this->sum += $this->Bs[$i] * $fin_ratios[$i];
        }        

        // Step 3         
        foreach($this->Cs as $C){
            array_push($this->Ds, $C-$this->sum);
        }

        // Step 4
        foreach($this->Ds as $D){
            
        }


        









        return response([
            "graph_data" => [$total_assets, $total_debt, $ebitda, $interest_expense, $wc]
        ]);
    } 
}
