<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\PostTag;
use App\Models\Tag;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::all();
        return view('post.index', compact('posts'));
    }

    public function create()
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

    public function store(): string
    {
        $data = request()->validate([
            'title' => 'required|string',
            'content' => 'string',
            'image' => 'string',
            'category_id' => '',
            'tags' => '',
        ]);
        $tags = $data['tags'];
        unset($data['tags']);
//        dd($data, $tags);
        $post = Post::create($data);
//        foreach ($tags as $tag) {
//            PostTag::firstOrCreate([
//                'tag_id' => $tag,
//                'post_id' => $post->id,
//            ]);
//            }0
        $post->tags()->attach($tags);
        return redirect()->route('post.index');
    }

    public function edit(Post $post): string
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('post.edit', compact('post', 'categories', 'tags'));
    }

    public function destroy(Post $post): string
    {
        dd(111);
        $post->delete();
        return redirect()->route('post.index');
    }

    public function show(Post $post)
    {
        return view('post.show', compact('post'));
    }

    public function update(Post $post)
    {
        $data = request()->validate([
            'title' => 'string',
            'content' => 'string',
            'image' => 'string',
            'category_id' => '',
            'tags' => '',
        ]);
        $tags = $data['tags'];
        unset($data['tags']);

        $post->update($data);
        $post->tags()->sync($tags);
        return redirect()->route('post.show', $post->id);
    }

    public function delete()
    {
        $post = Post::find(2);
        $post->delete();
    }

    public function restore()
    {
        $post = Post::withTrashed()->find(2);
        $post->restore();
    }

    public function firstOrCreate()
    {
        $post = Post::find(1);
        $anotherPost = [
            'title' => 'some post',
            'content' => 'some content',
            'image' => 'some imageblabla.jpg',
            'likes' => 50000,
            'is_published' => 1,
        ];
        $post = Post::firstOrCreate([
            'title' => 'some post'
        ],
            [
                'title' => 'some post',
                'content' => 'some content',
                'image' => 'some imageblabla.jpg',
                'likes' => 50000,
                'is_published' => 1,
            ]);
        dump($post->content);
    }

    public function updateOrCreated()
    {
        $anotherPost = [
            'title' => 'update post',
            'content' => 'some content',
            'image' => 'some imageblabla.jpg',
            'likes' => 5,
            'is_published' => 1,
        ];
        $post = Post::updateOrCreate([
            'title' => 'some post'
        ],
            [
                'title' => 'update post',
                'content' => 'some content',
                'image' => 'some imageblabla.jpg',
                'likes' => 5,
                'is_published' => 1,
            ]);
        dump($post->content);
    }
}
