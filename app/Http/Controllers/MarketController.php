<?php

namespace App\Http\Controllers;

use App\Models\Shop;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class MarketController extends Controller
{
    public function submit(Request $req){
        $shop = new Shop();
        $shop->name = $req->input('name');
        $shop->description = $req->input('description');
        $shop->filename = $req->file('image')->getClientOriginalName();
        Storage::disk('public')->putFileAs(
            'images', $req->file('image'), $req->file('image')->getClientOriginalName()
        );
        $shop->user_id = Auth::user()->id;
        $shop->save();
        return redirect('/shops')->with('success', 'Вы успешно зарегистрировали магазин');
    }

    public function get(){
        $shops = Shop::where('user_id', Auth::user()->id)->get();
        //return var_dump($users);
        return view('shopView', ['shops' => $shops]);
    }
}

