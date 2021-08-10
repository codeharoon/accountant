<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Header;
class HeaderController extends Controller
{
    public function __construct()
        {
            $this->middleware('auth');
        }
    public function addHeader(Request $request){
        $header=new Header();
        $header->name=$request->name;
        $save=$header->save();
        if($save){
            return redirect()->route('addcash');
        }
    }
}
