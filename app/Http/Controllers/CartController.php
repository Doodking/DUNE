<?php

namespace App\Http\Controllers;

use App\Mail\OrderShipped;
use App\Models\Cart;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class CartController extends Controller
{
    public function get(){
        $cart = Cart::where('user_id', Auth::user()->id)->get();
        $ids = [];
        foreach ($cart as $c):
            $ids[] = $c->product_id;
        endforeach;
        $products = [];
        foreach ($ids as $i):
            $products[] = Product::where('id', $i)->get();
        endforeach;
        $count = 0;
        foreach ($products as $p){
            foreach ($p as $pr){
                $count += $pr->price;
            }
        }

        return view('buyProducts', ['cart' => count($products), 'products' => $products, 'total' => $count]);
    }

    public function post(Request $req){
        $cart = Cart::where('user_id', Auth::user()->id)->get();
        foreach ($cart as $c):
            $ids[] = $c->product_id;
        endforeach;
        $products = [];
        foreach ($ids as $i):
            $products[] = Product::where('id', $i)->get();
        endforeach;
        $count = 0;
        foreach ($products as $p){
            foreach ($p as $pr){
                $count += $pr->price;
            }
        }
        Mail::to($req->user()->email)->send(new OrderShipped($products, $count));
        foreach ($cart as $c){
            $c->delete();
        }
        return redirect('/cart/' . Auth::user()->id)->with('success', 'You\' successfully buy products!');
    }
}
