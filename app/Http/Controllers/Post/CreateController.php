<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;

class CreateController extends BaseController
{
    public function __invoke()
    {
        {
            $tags = Tag::all();
            $categories = Category::all();
            return view('post.create', compact('tags', 'categories'));
        }
//        $postsArr = [
//            [
//                'title' => 'title of post from phpstorm',
//                'content' => 'some interesting content',
//                'image' => 'imageblabla.jpg',
//                'likes' => 20,
//                'is_published' => 1,
//            ],
//            [
//                'title' => 'another title of post from phpstorm',
//                'content' => 'another some interesting content',
//                'image' => 'another imageblabla.jpg',
//                'likes' => 50,
//                'is_published' => 1,
//            ],
//        ];
//
//        foreach ($postsArr as $item) {
//         Post::create($item);
//        }
//        dd('created');
    }
}
