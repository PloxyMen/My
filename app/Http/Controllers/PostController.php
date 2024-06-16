<?php

namespace App\Http\Controllers;


use App\Models\Post;

class PostController extends Controller
{
public function index()
{

    $posts = Post::all();
    return view('post.index', compact('posts'));
}

    public function create()
    {
        return view('post.create');
    }

    public function store()
    {
        $data =request()->validate([
            'title' => 'string',
            'content' => 'string',
            'images'=>'string'
        ]);
            Post::create($data);
            return redirect()->route('post.index');
    }

    public function show(Post $post){

        return view('post.show',compact('post'));
}

    public function update(Post $post)
    {
        $data =request()->validate([
            'title' => 'string',
            'content' => 'string',
            'images'=>'string'
        ]);
        $post->update($data);
        return redirect()->route('post.show',$post->id);
    }

    public function edit(Post $post){

            return view('post.edit',compact('post'));
    }


    public function delete()
    {
        $post = Post::withTrashed()->find(2);
        $post->restore();
        dd('deleted') ;
    }

    public function destroy(Post $post)
    {
       $post->delete();
       return redirect()->route('post.index');
    }

    public function firstOrCreate()
    {
        $anotherPost =[
            'title'=> 'some posts',
            'content'=> 'some content',
            'images'=> ' some imageblala.jpg',
            'likes'=> 1000,
            'is_published'=> 1,
        ];

        $post = Post::firstOrCreate([
            'title'=> 'some title phpstorm',
        ],[
            'title'=> 'some title phpstorm',
            'content'=> 'some content',
            'images'=> ' some imageblala.jpg',
            'likes'=> 1000,
            'is_published'=> 1,
        ]);
        dump($post->content);
        dd('finished') ;
    }

    public function  updateOrCreate()
    {
        $anotherPost =[
            'title'=> 'updateorcreate some posts',
            'content'=> 'updateorcreate some content',
            'images'=> ' updateorcreate some imageblala.jpg',
            'likes'=> 500,
            'is_published'=> 0,
            ];

        $post = Post::updateOrCreate([
            'title'=> 'some title not phpstorm',
        ],[
            'title'=> 'some title not phpstorm',
            'content'=> 'its  no update some  content',
            'images'=> ' its no update some imageblala.jpg',
            'likes'=> 500,
            'is_published'=> 0,
        ]);
    }
}
