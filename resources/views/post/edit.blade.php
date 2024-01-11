@extends('layouts.main')
@section('content')
    <div>
        <form action="{{route('post.update', $post->id)}}" method="post">
            @csrf
            @method('patch')
            <div class="form-group">
                <label for="title" class="form-label">Title</label>
                <input type="text" name="title" class="form-control" id="title" placeholder="title"
                       value="{{$post->title}}">
            </div>
            <div class="form-group">
                <label for="content" class="form-label">Content</label>
                <textarea class="form-control" name="content" id="content"
                          placeholder="content">{{$post->content}}</textarea>
            </div>
            <div class="form-group">
                <label for="image" class="form-label">Image</label>
                <input type="text" name="image" class="form-control" id="image" placeholder="image"
                       value="{{$post->image}}">
            </div>
            <div>
                <label for="tag" class="form-label mt-3">Tags</label>
                <select class="form-select" name="tags[]" id="tags" multiple aria-label="tags">
                    @foreach($tags as $tag)
                        <option
                            @foreach($post->tags as $postTag )
                                {{$tag->id === $postTag->id ? ' selected': ''}}
                            @endforeach
                            value="{{$tag->id}}">{{$tag->title}}</option>
                    @endforeach}
                </select>
            </div>
            <div>
                <label for="category" class="form-label mt-3">Category</label>
                <select class="form-select" name="category_id" id="category_id" aria-label="Тег">
                    @foreach($categories as $category)
                        <option
                            {{$category->id === $post->category->id ? ' selected' : '' }}
                            value="{{$category->id}}">{{$category->title}}</option>
                    @endforeach}
                </select>
            </div>
            <div class="col-12">
                <button class="btn btn-primary mb-3 mt-3" type="submit">Edit</button>
            </div>
        </form>
    </div>
@endsection
