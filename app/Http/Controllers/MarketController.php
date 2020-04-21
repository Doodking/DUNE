<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MarketController extends Controller
{
    public function submit(Request $req){
        return $req->file('image')->getClientOriginalName();
    }
}

