<?php

namespace App\Http\Controllers;

use App\Sub;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SubscriptionController extends Controller
{
    public function sub($id){
        $sub = new Sub();
        $sub->user_id = $id;
        $sub->sub_id = Auth::user()->id;
        $sub->save();
        return redirect()->back()->with('success', 'You\'re successfully subscribe on ' . User::find($id)->name);
    }

    public function unsub($id){
        $sub = Sub::where('sub_id', Auth::user()->id)->get();
        foreach ($sub as $s):
            $s->delete();
        endforeach;
        return redirect()->back()->with('success', 'You\'re successfully unsubscribe on ' . User::find($id)->name);
    }
}
