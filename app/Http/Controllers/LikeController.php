<?php

namespace App\Http\Controllers;

use App\Like;
use Illuminate\Support\Facades\Auth;

class LikeController extends Controller
{
    public function like($id){
        $like = new Like();
        $like->post_id = $id;
        $like->user_id = Auth::user()->id;
        $like->save();
        return redirect()->back()->with('success', 'You\'re liked this post');
    }

    public function unlike($id){
        $like = Like::where([['post_id', $id], ['user_id', Auth::user()->id]])->get();
        foreach ($like as $l):
            $l->delete();
        endforeach;
        return redirect()->back()->with('success', 'You\'re unliked this post');
    }
}
