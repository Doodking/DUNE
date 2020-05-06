<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Models\Cart;
use App\Models\Shop;
use App\Product;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StoreController extends Controller
{
    public function get($id, $idofshop){
        $store = Shop::where('id', $idofshop)->get();
        $product = Product::where('shop_id', $idofshop)->get();
        return view('oneshop', ['store' => $store, 'product' => $product]);
    }

    public function create($id, $idofshop){
        $store = Shop::where('id', $idofshop)->get();
        return view('createproduct', ['store' => $store]);
    }

    public function post(Request $req, $idofshop){
        $product = new Product();
        $product->name = $req->input('name');
        $product->description = $req->input('description');
        $product->pic = $req->file('image')->getClientOriginalName();
        Storage::disk('public')->putFileAs(
            'pics', $req->file('image'), $req->file('image')->getClientOriginalName()
        );
        $product->price = $req->input('price');
        $product->shop_id = $idofshop;
        $product->save();
        return redirect('/shopsofuser/shopsofuser/' . Auth::user()->id . '/shop/' . $idofshop);

    }

    public function productGet($id, $idofproduct){
        $product = Product::findOrFail($idofproduct);
        $shop = Shop::findOrFail($id);
        $user = User::findOrFail($shop->user_id);
        $comm = Comment::where('product_id', $idofproduct)->get();
        return view('product', ['product' => $product, 'user' => $user, 'comm' => $comm]);
    }

    public function getBuy($id){
        $cart = Cart::where('user_id', Auth::user()->id)->get();
        $ids = [];
        foreach ($cart as $c):
            $ids[] = $c->product_id;
        endforeach;
        $products = [];
        foreach ($ids as $i):
            $products[] = Product::where('id', $i)->get();
        endforeach;
        return view('buy', ['cart' => $products]);
        //return dd($products);
    }

    public function delete($id){
        $cart = Cart::where('product_id', $id)->get();
        foreach ($cart as $c){
            $c->delete();
        }
        return redirect('/cart/' . Auth::user()->id)->with('success', 'Product had been deleted from your cart');
    }

    public function addToCart($id){
        $cart = new Cart();
        $cart->user_id = Auth::user()->id;
        $product = Product::find($id);
        $shop = Shop::find($product->shop_id);
        $cart->product_id = $id;
        $cart->save();
        return redirect('/shopsofuser/shopsofuser/' . Auth::user()->id .  '/shop/' . $shop->id)->with('success', 'Product successfully added to your cart!');
    }
}
