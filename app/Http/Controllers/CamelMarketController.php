<?php

namespace App\Http\Controllers;

use App\Models\Shop;
use App\User;
use Illuminate\Http\Request;

class CamelMarketController extends Controller
{
    public function get(){
        $shops = Shop::where('id' , '<', 5)->get();
        $shops2 = Shop::where('id' , '>', 5)->get();
        return view('shops', ['shops' => $shops, 'shops2' => $shops2]);
    }
}
