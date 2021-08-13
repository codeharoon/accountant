<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Loan;

class LoanController extends Controller
{
   public function __construct()
      {
         $this->middleware('auth');
      }
   public function add_loan(Request $request){
         $loan=Loan::where('name','like','%'.$request->name.'%')->first();
         if($loan !== null){
            $latest=$request->loan;
            $loan->loan=$latest;
            $loan->provider=$request->provider;
            $loan->purpose=$request->purpose;
            $save=$loan->save();
            if($save){
               return redirect()->route('addcash');
            }
         }
         else{
            $addL=new Loan();
            $addL->loan=$request->loan;
            $addL->provider=$request->provider;
            $addL->name=$request->name;
            $addL->purpose=$request->purpose;
            $save=$addL->save();
            if($save){
               return redirect()->route('addcash');
            }
         }
   }
}
