@extends('layouts.app')
@section('title','edit page')
@section('content')


    <div>
        <div class="card">
            <div class="card-body">
                <form action ="{{route('posts.update',$post->id)}}" method="post">
                    @csrf
                    @method('PUT')

                    <input class="card-title" type="text" name="title" value="{{$post->title}}"><br>
                    <input class="card-title" type="text" name="image" value="{{$post->image}}"><br>



                    <select name="category_id">
                        @foreach($categories as $cat)
                            <option @if($cat-> id==$post->category_id)selected @endif value="{{$cat->id}}">{{$cat->name}}</option>
                        @endforeach
                    </select><br>
                    <textarea  class="card-text" name="content" cols ="30" rows ="10">{{$post->content}}</textarea>
                    <button type="submit" class="btn btn-outline-success"> Update post</button>
                </form>
            </div>
        </div>
    </div>










@endsection
