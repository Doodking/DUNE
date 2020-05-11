<?php

namespace App\Http\Controllers;

use App\Repost;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RepostController extends Controller
{
    public function repost($id){
        $repost = new Repost();
        $repost->post_id = $id;
        $repost->user_id = Auth::user()->id;
        $repost->save();
        return redirect()->back()->with('success', 'You\'re reposted this post');
    }
}
