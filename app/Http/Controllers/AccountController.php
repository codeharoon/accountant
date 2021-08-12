<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Account;
use App\Models\Cash;
use App\Models\Header;
use App\Models\Detail;
class AccountController extends Controller
{
    public function __construct()
        {
            $this->middleware('auth');
        }
    public function index(){
        // $accounts=Account::where('id','=',1)->orwhere('id','=',2)->orwhere('id','=',3)->get();
        // dd($accounts);
        $accounts=[];
        return view('cashbook.searchform',compact('accounts'));
    }
    public function searchresult(Request $request){
    //    $request->session()->put('my_name','Virat Gandhi');
       $account="";
       if($request->account){
            $request->session()->put('my_name',$request->account);
            $accounts=Account::with("header")->where("account",'like','%'.$request->account."%")->get();
       }
       elseif ($request->date) {
            $request->session()->put('my_name',$request->date);
            $accounts=Account::with("header")->where("date",'like','%'.$request->date."%")->get();
       }
       elseif ($request->detail) {
            $f_detail=Detail::where("name",'like','%'.$request->detail."%")->first();
            $request->session()->put('my_name',$f_detail->id);
            $accounts=Account::with("header")->where("header_id",'=',$f_detail->id)->get();
       }
       elseif ($request->remarks) {
            $request->session()->put('my_name',$request->remarks);
            $accounts=Account::with("header")->where("remarks",'like','%'.$request->remarks."%")->get();
       }
       elseif ($request->header) {
            $f_header=Header::where("name",'like','%'.$request->header."%")->first();
            $request->session()->put('my_name',$f_header->id);
            $accounts=Account::with("header")->where("header_id",'=',$f_header->id)->get();
        
       }
    //    elseif (condition) {
    //        # code...
    //    }
   
       return view('cashbook.searchform',compact('accounts'));

    }
    public function add(){
        $header=Header::all();
        $cash=Cash::all();
        $details=Detail::all();
        return view('cashbook.add',compact('header','cash','details'));
    } 
    public function store(Request $request){

        // dd($request->all());
        $cash=Cash::where('name','like','%'.$request->account.'%')->first();
        $newcash= $cash->cash_here-$request->paid;

        $filename=sprintf('attachment-%s.jpg',random_int(1,10000));
        if($request->hasFile("attachment")){
            $filename=$request->file("attachment")->storeAs('image',$filename,'public');
        }
        else{
            $filename=null;
        }
        
        $account=new Account();
        $account->date=$request->date;
        $account->account=$request->account;
        $account->header_id=$request->header;
        $account->detail_id=$request->datail;
        $account->remarks=$request->remarks;
        $account->Attachment=$filename;
        $account->cash=$cash->cash_here;
        $account->paid=$request->paid;
        $account->total=$newcash;
        $save=$account->save();
        if($save){
            $cash->cash_here=$newcash;
            $cash->save();
            return redirect()->route('addcash');
        }
    } 

    public function afterdelete(Request $request){
        dd($request->session()->get('my_name'));
        $accounts=[];
        return view('cashbook.searchform',compact('accounts'));
    }

    public function deleteRecord(Request $request,$id){
       $account=Account::find($id)->delete();
       return redirect()->route('saremeotech');  
    }
}
