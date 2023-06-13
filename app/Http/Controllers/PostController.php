<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $post = Post::find(1);
        dd($post);
    }

    public function create()
    {
        $postsArr = [
            [
                'title' => 'hello',
                'content' => 'its me',
                'image' => 'bobo.jpg',
                'likes' => 12,
                'is_published' => 1,
            ],
            [
                'title' => 'hi',
                'content' => 'reanimation',
                'image' => 'gugu.jpg',
                'likes' => 12,
                'is_published' => 1,
            ]
        ];

        foreach ($postsArr as $item) {
            Post::create([

                    'title' => $item['title'],
                    'content' => $item['content'],
                    'image' => $item['image'],
                    'likes' => $item['likes'],
                    'is_published' => $item['is_published'],

            ]);
        }
    }

    public function update()
    {
        $post= Post::find(1);
        $post->update([
            'title' => 'hi',
            'content' => 'reanimation',
            'image' => 'gugu.jpg',
            'likes' => 12,
            'is_published' => 1,
        ]);
    }

    public function delete()
    {
        $post= Post::find(1);
        $post->delete();
    }
}
