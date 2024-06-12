<?php

namespace App\Http\Controllers;


use App\Models\Post;

class PostController extends Controller
{
public function index()
{

    $posts = Post::all();
    return view('posts', compact('posts'));
}

    public function create()
{
    $postsArr = [
        [
            'title'=> 'title of post from phpstorm',
            'content'=> 'some interesting content',
            'images'=> 'imageblala.jpg',
            'likes'=> 20,
            'is_published'=> 1,
        ],
        [
        'title'=> 'another title of post from phpstorm',
        'content'=> 'another some interesting content',
        'images'=> 'another imageblala.jpg',
        'likes'=> 50,
        'is_published'=> 1,
        ],
    ];
        foreach ($postsArr as $item){
            Post::create([
                'title'=> $item['title'],
                'content'=> $item['content'],
                'images'=> $item['images'],
                'likes'=> $item['likes'],
                'is_published'=> $item['is_published'],
            ]);
        }
        dd('created') ;
    }
    public function update()
    {
        $post = Post::find(11);

        $post->update([
            'title'=> '111 updated',
            'content'=> '111 updated',
        ]);
        dd('updated') ;
    }
    public function delete()
    {
        $post = Post::withTrashed()->find(2);
        $post->restore();
        dd('deleted') ;
    }

    // firstOrCreate
    //updateOrCreate

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

        dump($post->content);
        dd('22222');
    }
}
