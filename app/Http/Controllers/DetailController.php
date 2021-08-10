<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Detail;

class DetailController extends Controller
{
    public function __construct()
      {
          $this->middleware('auth');
      }
    public function add_detail(Request $request){
      $detail=new Detail();
      $detail->name=$request->detail;
      $save=$detail->save();
      if($save){
        return redirect()->route('addcash');
      }
    }
}
