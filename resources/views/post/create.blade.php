@extends('layouts.main')
@section('content')
    <div>
        <form action="{{route('post.store')}}" method="post">
            @csrf
            <div class="form-group">
                <label for="title" class="form-label">Title</label>
                <input
                    value="{{old('title')}}"
                    type="text" name="title" class="form-control" id="title" placeholder="title">
                @error('title')
                <p class="text-danger">{{$message}}</p>
                @enderror
            </div>
            <div class="form-group">
                <label for="content" class="form-label">Content</label>
                <textarea class="form-control" name="content" id="content"
                          placeholder="content">{{{ old('content') }}}</textarea>
                @error('content')
                <p class="text-danger">{{$message}}</p>
                @enderror
            </div>
            <div class="form-group">
                <label for="image" class="form-label">Image</label>
                <input
                    value="{{old('image')}}"
                    type="text" name="image" class="form-control" id="image" placeholder="image">
                @error('image')
                <p class="text-danger">{{$message}}</p>
                @enderror
            </div>
            <div>
                <label for="tag" class="form-label mt-3">Tags</label>
                <select class="form-select" name="tags[]" id="tags" multiple aria-label="tags">
                    <option selected>Select tags for your post</option>
                    @foreach($tags as $tag)
                        <option value="{{$tag->id}}">{{$tag->title}}</option>
                    @endforeach}
                </select>
            </div>
            <div>
                <label for="category" class="form-label mt-3">Category</label>
                <select class="form-select" name="category_id" id="category_id" aria-label="Category">
                    @foreach($categories as $category)
                        <option
                            {{old('category_id') == $category->id ? ' selected' : ''}}
                            value="{{$category->id}}">{{$category->title}}</option>
                    @endforeach}
                </select>
            </div>
            <div class="col-12">
                <button class="btn btn-primary mb-3 mt-3" type="submit">Create</button>
            </div>
        </form>
    </div>
@endsection
