@extends('layouts.app')
@section('title','create page')
@section('content')
    <div class="container" style="margin-top: 100px">
        @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{$error}}</li>
                    @endforeach
                </ul>
            </div>
            @endif
        <div class="row justify-content-center">
            <div class="col-md-10">
                    <form action ="{{route('posts.store')}}" method="post" style="margin-top: 100px" enctype="multipart/form-data">
                    @csrf
                        <div class="form-group">
                            <label for="titleInput" >Title</label>
                            <input type="text" class="form-control  @error('title') is-invalid @enderror" name="title" id="titleInput" placeholder="Enter title " >

                        </div>

                        <div class="form-group">
                            <label for="imageInput" >Image</label>
                            <input type="file" class="form-control  @error('image') is-invalid @enderror" name="image" id="imageInput" placeholder="Enter image url " >

                        </div>
                        <div class="form-group">
                            <label for="contentInput" >Content</label>
                            <textarea class="form-control @error('content') is-invalid @enderror " id="contentInput" rows="3" name="content"></textarea>
                            @error('content')
                            <div class="alert alert-danger">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="categoryInput" >Category</label>
                            <select class="form-control @error('category_id') is-invalid @enderror  " name="category_id" id="categoryInput">
                                @foreach($categories as $cat)
                                    <option value =" {{$cat->id}}">{{$cat->name}}</option>
                                @endforeach
                            </select>
                            @error('category_id')
                            <div class="alert alert-danger">{{$message}}</div>
                            @enderror
                        </div>
                        <button class="btn btn-outline-success" type="submit"> Save post</button>
                    </form>
            </div>
        </div>
    </div>
@endsection

