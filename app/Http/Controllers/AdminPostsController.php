<?php

namespace App\Http\Controllers;

use App\Post;
use App\Http\Requests;

class AdminPostsController extends BaseController
{
    public function index()
    {
        return view('admin.posts.index');
        $posts=Post::orderBy('created_at','DESC')->get();
        $data=['posts'=>$posts];
        return view('admin.posts.index',$data);
    }

    //    public function index()
//    {
//        return view('admin.posts.index');
//    }

    public function create()
    {
        return view('admin.posts.create');
    }
    public function edit($id)
    {
        $post=Post::find($id);

        $data=['post'=>$post];

        return view('admin.posts.edit', $data);
    }
    public function store(PostRequest $request)
    {
        Post::create($request->all());
        return redirect()->route('admin.posts.index');
    }

    public function update(PostRequest $request,$id)
    {
        $post=Post::find($id);
        $post->update($request->all());
        return redirect()->route('admin.posts.index');
    }
    public function destroy($id)
    {
        Post::destroy($id);
        return redirect()->route('admin.posts.index');
    }
}
