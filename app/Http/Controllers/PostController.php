<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function get(){
        $posts = Post::all();
        return view('forum', ['posts' => $posts]);
    }

    public function post(Request $req){
        $post = new Post();
        $post->title = $req->input('title');
        $post->text = $req->input('text');
        $post->user_id = Auth::user()->id;
        $post->category = $req->input('category');
        $post->save();
        return redirect('/forum')->with('success', 'Your post was published!');
    }

    public function getPost($id){
        $post = Post::find($id);
        $posta = Post::where([['category', '=', $post->category], ['id', '!=', $post->id],])->limit(3)->get();
        $comm = Comment::where('post_id', $id)->get();
        return view('post', ['post' => $post, 'posta' => $posta, 'comm' => $comm]);
    }
}
