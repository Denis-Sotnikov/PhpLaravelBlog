<?php

namespace App\Http\Controllers\Post;

use App\Http\Requests\Post\StoreRequest;
use App\Http\Resources\Post\PostResource;
use App\Models\Post;


class StoreController extends BaseController
{
    public function __invoke(StoreRequest $request)
    {
        $data = $request->validated();
//        dd($data);
        $post = $this->service->store($data);


//        dd($post);

        return new PostResource($post);
//        return redirect()->route('post.index');
    }
}
