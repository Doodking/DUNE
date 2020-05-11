<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Like;
use App\Mail\OrderShipped;
use App\Models\Post;
use App\Report;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

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

    public function delete($id){
        $post = Post::where('id', $id)->get();
        foreach ($post as $p):
            $p->delete();
        endforeach;
        return redirect('/forum');
    }

    public function report($id, Request $req){
        $post = Post::find($id);
        $report = new Report();
        $report->category = $req->input('category');
        $report->text = $req->input('text');
        $report->user_id = Auth::user()->id;
        $report->post_id = $id;
        Mail::to('stas.makarov333@yandex.ru')->send(new \App\Mail\Report($post, Auth::user(), $report));
        $report->save();
        return redirect()->back()->with('success', 'You\'re successfully report this post');
    }

    public function edit($id, Request $req){
        $post = Post::find($id);
        $post->title = $req->input('title');
        $post->text = $req->input('text');
        $post->save();
        return redirect()->back()->with('success', 'You\'re successfully edit this post');
    }

    public function getPost($id){
        $post = Post::find($id);
        $posta = Post::where([['category', '=', $post->category], ['id', '!=', $post->id],])->limit(3)->get();
        $user = User::find($post->user_id);
        $liked = Like::where([['user_id', Auth::user()->id], ['post_id', $id]])->get();
        $comm = Comment::where('post_id', $id)->get();
        $likes = Like::where('post_id', $post->id)->get();
        return view('post', ['post' => $post, 'posta' => $posta, 'comm' => $comm, 'user' => $user, 'likes' => $likes, 'liked' => $liked]);
    }
}
