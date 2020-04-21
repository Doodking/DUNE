<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

use App\Http\Requests\ShopRequest;
use App\Models\Shop;

class ShopController extends Controller
{
    public function submit(ShopRequest $req){
        $shop = new Shop();
        $shop->email = $req->input('email');
        $shop->password = $req->input('password');
        $shop->save();

        return redirect('/posts')->with('success', 'Вы успешно зарегистрировали магазин');
    }
}
