<?php

namespace App\Http\Controllers\Post;


use App\Http\Requests\Post\FilterRequest;
use App\Http\Resources\Post\PostResource;
use App\Models\Post;
use App\Http\Filters\PostFilter;


class IndexController extends BaseController
{
    public function __invoke(FilterRequest $request)
    {
        $data = $request->validated();

        $page = $data['page'] ?? 1;
        $perPage = $data['per_page'] ?? 10;

        echo "i do it";

        $filter = app()->make(PostFilter::class, ['queryParams' => array_filter($data)]);
        $posts = Post::filter($filter)->paginate(10);
        //$query = Post::query();
        //if(isset($data))
        //$posts = Post::where('is_published', 1)->where('category_id', 5)->get();
        //$posts = Post::paginate(10);

//        return view('post.index', compact('posts'));

        return PostResource::collection($posts);
    }

}
