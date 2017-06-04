<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BotController extends Controller
{
    public function bot(Request $request)
    {        
    	$data=$request->all();
    	$id = $data["entry"][0]["messaging"][0]["sender"]["id"];
    	dd($id);
    }
}
