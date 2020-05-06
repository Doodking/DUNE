<?php

namespace App\Http\Controllers;

use App\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function post(Request $req, $id){
        $comment = new Comment();
        $comment->post_id = $id;
        $comment->user_id = Auth::user()->id;
        $comment->text = $req->input('text');
        $comment->save();
        return redirect('/forum/post/' . $id)->with('success', 'Your comment was successfully published');
    }

    public function postProduct($id, $idOfProduct, Request $req){
        $comment = new Comment();
        $comment->product_id = $idOfProduct;
        $comment->user_id = Auth::user()->id;
        $comment->text = $req->input('text');
        $comment->save();
        return redirect('/shop/' . $id . '/product/' . $idOfProduct)->with('success', 'Your comment was successfully published');
    }
}
