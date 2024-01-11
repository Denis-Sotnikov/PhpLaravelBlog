@extends('layouts.main')
@section('content')
    <div>
        <div>
            <a href="{{route('post.create')}}" class="btn btn-success mb-3">Add one</a>
        </div>
        <div>
            This is posts page
            @foreach($posts as $post)
                <div><a href="{{route('post.show', $post->id)}}">{{$post->title}}</a></div>
            @endforeach
        </div>
    </div>
@endsection
