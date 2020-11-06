<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Post;
use App\Http\Requests\PostRequest;

class PostsController extends Controller
{
    public function index(){
        // return "hello";

        // Eloquentの命令でデータ取得
        // $posts = \App\Post::all();

        // useで以下のように省略
        // $posts = Post::all();

        // 降順
        // $posts = Post::orderBy('created_at', 'desc')->get();
        $posts = Post::latest()->get();
        
        
        // $posts = []; //空の状態を見るため

        // dd($posts->toArray()); //dump die 配列で表示

        // return view('posts.index'); viewを指定('postsディレクトリの.index');
  
        // $postsのデータをviewの中で第２引数のpostsという名前でviewに渡す
        // return view('posts.index', ['posts' => $posts]);
        return view('posts.index')->with('posts', $posts);
    }

    // public function show($id){
        //Implicit Binding 暗黙的にidでモデルを引っ張ってくる
    public function show(Post $post){
        // $post = Post::find($id);

        // $post = Post::findOrFail($id); //データが見つからなかった場合に例外を返す
        return view('posts.show')->with('post', $post);
    }

    public function create(){
        return view('posts.create');
    }

    public function store(PostRequest $request){
        $post = new Post();
        $post->title = $request->title;
        $post->body = $request->body;
        $post->save();
        return redirect('/');
    }

    public function edit(Post $post){
        return view('posts.edit')->with('post', $post);
    }

    public function update(PostRequest $request, Post $post){
        $post->title = $request->title;
        $post->body = $request->body;
        $post->save();
        return redirect('/');
    }

    public function destroy(Post $post){
        $post->delete();
        return redirect('/');
    }
}