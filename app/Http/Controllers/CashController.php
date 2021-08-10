<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cash;
use App\Models\Loan;

class CashController extends Controller
{
    public function __construct()
        {
            $this->middleware('auth');
        }
    public function addCash(Request $request){
        $cash=Cash::where('name','like','%'.$request->name.'%')->first();
        $loan=Loan::where('name','like','%'.$request->name.'%')->first();
        $newcash=$request->cash+$cash->cash_here;
        $latest=$newcash-$loan->loan;
        $cash->cash_here=$latest;
        $cash->bank_cash=0;
        $save=$cash->save();
        if($save){
            $loan->loan=0;
            $save=$loan->save();
            return redirect()->route('addcash');
        }
    }

    public function createaccount(Request $request){
        $account=new Cash();
        $account->name=$request->name;
        $account->cash_here=$request->cash;
        $account->bank_cash=0;
        $save=$account->save();
        if($save){
            return redirect()->route('addcash');
        }
    }
}
