<?php

namespace App\Http\Controllers;

use App\Support;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class SupportController extends Controller
{
    public function send(Request $req){
        $support = new Support();
        $support->title = $req->input('title');
        $support->category = $req->input('category');
        $support->text = $req->input('text');
        $support->user_id = Auth::user()->id;
        $support->save();
        Mail::to('stas.makarov333@yandex.ru')->send(new \App\Mail\Support(Auth::user(), $support));
        return redirect()->back();

    }
}
