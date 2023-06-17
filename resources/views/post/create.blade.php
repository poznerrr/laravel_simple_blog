@extends('layouts.app')
@section('content')
    <div>
        <form action="{{ route('post.store') }}" method="post">
            @csrf
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" class="form-control" name="title" id="title" placeholder="Title"
                       value="{{old('title')}}">
                @error('title')
                <p class="text-bg-danger">{{$message}}</p>
                @enderror
            </div>
            <div class="form-group">
                <label for="content">Content</label>
                <textarea type="text" class="form-control" name="content" id="content"
                          placeholder="Content">{{old('content')}}</textarea>
                @error('content')
                <p class="text-bg-danger">{{$message}}</p>
                @enderror
            </div>
            <div class="form-group">
                <label for="image">Image</label>
                <input type="text" class="form-control" name="image" id="image" placeholder="Image"
                       value="{{old('image')}}">
                @error('image')
                <p class="text-bg-danger">{{$message}}</p>
                @enderror
            </div>
            <div class="form-group">
                <label for="category">Category</label>
                <select class="form-control" name="category_id">
                    @foreach($categories as $category)
                        <option
                                {{old('category_id') == $category->id ? 'selected' : ''}}
                                value="{{$category->id}}">{{$category->title}}</option>
                    @endforeach
                </select>
            </div>
            <label for="tags">Tags</label>
            <select class="form-select" multiple aria-label="multiple select example" id="tags" name="tags[]">
                @foreach($tags as $tag)
                    <option
                            value="{{$tag->id}}">{{$tag->title}}</option>
                @endforeach
            </select>
            <button type="submit" class="btn btn-primary">Add</button>
        </form>
    </div>
@endsection
