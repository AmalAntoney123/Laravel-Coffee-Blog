<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    public function createPost(Request $request){
        $incomingFields = $request->validate([
            'title'=>'required',
            'body'=>'required',
        ]);
        $incomingFields['title']=strip_tags($incomingFields['title']);
        $incomingFields['body']=strip_tags($incomingFields['body']);
        $incomingFields['user_id']=auth()->id();
        Post::create($incomingFields);        
        return redirect('/blog')->with('blogadd', 'Blog Added Successfully');
    }
    public function showEditScreen(Post $post){
        if(auth()->user()->id != $post['user_id']){
            return redirect('/blog');
        }
        return view('edit-post')->with('posts', $post);
    }
    public function updatePost(Post $post, Request $request){
        if(auth()->user()->id != $post['user_id']){
            return redirect('/blog');
        }
        
        $incomingFields = $request->validate([
            'title'=>['required'],
            'body'=>['required'],
        ]);

        $incomingFields['title']=strip_tags($incomingFields['title']);
        $incomingFields['body']=strip_tags($incomingFields['body']);

        $post->update($incomingFields);
        return redirect('/userAccount')->with('editsuccess', 'Successfully edited Blog');
    }
    public function deletePost(Post $post){
        if(auth()->user()->id === $post['user_id']){
            $post->delete();
        }
        return redirect('/userAccount');
    }
}
