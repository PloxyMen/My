@extends('layouts.main')
@section('content')
    <div>
        <form action="{{ route('post.store') }}" method="post">
            @csrf
            <div class="mb-3">
                <label for="title" >Title</label>
                <input type="text" name="title" class="form-control" id="title" placeholder="Title">
            </div>
            <div class="mb-3">
                <label for="title" >Content</label>
            <textarea type="text" name="content" class="form-control" id="content" placeholder="Content" ></textarea>
            </div>
            <div class="mb-3">
                <label for="images" >Images</label>
                <input name="images" type="text" class="form-control" id="images" placeholder="Images">
            </div>
            <button type="submit" class="btn btn-primary">Create</button>
        </form>
    </div>
@endsection
