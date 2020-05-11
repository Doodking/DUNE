<?php

namespace App\Http\Controllers;

use App\Image;
use App\Models\Post;
use App\Repost;
use App\Sub;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class AccountController extends Controller
{
    public function post(Request $req) {
        if(strlen($req->input('name')) > 0) {
            $user = User::where([['name', '=', $req->input('name')], ['id', '!=', Auth::user()->id],])->get();
        }else{
            $user = User::where('id', '!=', Auth::user()->id)->get();
        }
        return view('search', ['user' => $user]);
    }

    public function get() {
        $user = User::where('id', '!=', Auth::user()->id)->get();
        return view('search', ['user' => $user]);
    }

    public function findSubscr(){
        $subcr = Sub::where('sub_id', Auth::user()->id)->get();
        $users = [];
        foreach ($subcr as $s):
            $users[] = User::find($s->user_id);
        endforeach;
        $avatar = Image::where('user_id', Auth::user()->id)->get();
        return view('search', ['user' => $users, 'avatar' => $avatar]);
    }

    public function findSubs(){
        $subcr = Sub::where('user_id', Auth::user()->id)->get();
        $users = [];
        foreach ($subcr as $s):
            $users[] = User::find($s->sub_id);
        endforeach;
        $avatar = Image::where('user_id', Auth::user()->id)->get();
        return view('search', ['user' => $users, 'avatar' => $avatar]);
    }

    public function getMyAccount() {
        $posts = Post::where('user_id', Auth::user()->id)->get();
        $repost = Repost::where('user_id', Auth::user()->id)->get();
        $s = Sub::where('user_id', Auth::user()->id)->get();
        $ids = [];
        $idss = [];
        foreach ($repost as $r):
            $idss[] = $r->post_id;
        endforeach;
        $reposted_posts = [];
        foreach ($idss as $id):
            $reposted_posts[] = Post::find($id);
        endforeach;
        foreach ($s as $subsc):
            $ids[] = $subsc->sub_id;
        endforeach;
        $subs = [];
        foreach ($ids as $i):
            $subs[] = User::find($i);
        endforeach;
        $avatar = Image::where('user_id', Auth::user()->id)->get();
        return view('account', ['posts' => $posts, 'subs' => $subs, 'reposted_posts' => $reposted_posts, 'avatar' => $avatar]);
    }

    public function userget($id) {
        $user = User::find($id);
        $posts = Post::where('user_id', $id)->get();
        $s = Sub::where('user_id', $id)->get();
        $repost = Repost::where('user_id', $id)->get();
        $idss = [];
        foreach ($repost as $r):
            $idss[] = $r->post_id;
        endforeach;
        $reposted_posts = [];
        foreach ($idss as $id):
            $reposted_posts[] = Post::find($id);
        endforeach;
        $ids = [];
        foreach ($s as $subsc):
            $ids[] = $subsc->sub_id;
        endforeach;
        $subs = [];
        foreach ($ids as $i):
            $subs[] = User::find($i);
        endforeach;
        $subscribed = Sub::where([['user_id', '=', $id], ['sub_id', '=', Auth::user()->id]])->get();
        $avatar = Image::where('user_id', $user->id)->get();
        return view('userAccount', ['user' => $user, 'posts' => $posts, 'sub' => $subscribed, 'subs' => $subs, 'reposted_posts' => $reposted_posts, 'avatar' => $avatar]);
    }

    public function friends(){
        $s = Sub::where('user_id', Auth::user()->id)->get();
        $ids = [];
        foreach ($s as $subsc):
            $ids[] = $subsc->sub_id;
        endforeach;
        $subs = [];
        foreach ($ids as $i):
            $subs[] = User::find($i);
        endforeach;
        return view('friends', ['user' => $subs]);
    }

    public function setAvatar(Request $req){
        $avatar = new Image();
        $avatar->avatar = $req->file('image')->getClientOriginalName();
        $avatar->user_id = Auth::user()->id;
        $avatar->save();
        Storage::disk('public')->putFileAs(
            'avatars', $req->file('image'), $req->file('image')->getClientOriginalName()
        );
        return redirect()->back()->with('success', 'You\'re successfully set avatar');
    }
}
