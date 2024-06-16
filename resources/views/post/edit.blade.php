@extends('layouts.main')
@section('content')
    <div>
        <form action="{{ route('post.update',$post->id) }}" method="post">
            @csrf
            @method('patch')
            <div class="mb-3">
                <label for="title" >Title</label>
                <input type="text" name="title" class="form-control" id="title" placeholder="Title" value="{{ $post->title }}">
            </div>
            <div class="mb-3">
                <label for="title" >Content</label>
            <textarea type="text" name="content" class="form-control" id="content" placeholder="Content"> {{ $post->content }} ></textarea>
            </div>
            <div class="mb-3">
                <label for="images" >Images</label>
                <input name="images" type="text" class="form-control" id="images" value="{{ $post->images  }}" placeholder="Images" >
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection
