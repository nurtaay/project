@extends('layouts.app')
@section('title','create page')
@section('content')



    <div class="card" style="width: 18rem;">
        <img src="{{$post->image}}" class="card-img-top" alt="...">
        <div class="card-body">
            <h5 class="card-title">{{$post->title}}</h5>
            <p class="card-text">{{$post->content}}</p>
            <a href="{{route('posts.edit',$post->id)}}" class="btn btn-primary">Edit</a>
        </div>
        <div class="form-group">
            <div>
                <div class="card">
                    <div class="card-body">
                                <form action="{{route('comments.store')}}" method="post">
                            @csrf
                            <textarea name="content" rows="3"></textarea>
                            <input type="hidden" name="post_id" value="{{$post->id}}">
                            <button type="submit" class="btn btn-outline-success">Save</button>
                        </form>
                    </div>
                </div>
            </div>
            <hr>
            <div>
                <div class="card">
                    <div class="card-body">
                        @foreach($post->comments as $comment)
                            <p>{{$comment->content}}</p>
                            <button type="button"class="btn btn-warning"><small>{{$comment->user->name}} </small>
                            </button >
                            <button type="button"class="btn btn-warning"><small>{{$comment->created_at}} </small></button>
                            <form action="{{route('comments.destroy',$comment->id)}}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit"class="btn btn-outline-danger">DELETE</button>
                            </form>
                        @endforeach
                    </div>
                </div>

        </div>











{{--    --}}
{{--<a href = "{{route('posts.index')}}"class="btn btn-success ">Go to index page</a>--}}
{{--<h3>{{$post->title}}</h3>--}}
{{--<img class="card-img-top" src="{{$post->image}}" alt="Card image cap">--}}
{{--<p>{{$post->content}}</p>--}}
{{--<a href="{{route('posts.edit',$post->id)}}">EDIT</a>--}}
{{--<hr>--}}
{{--<form action="{{route('comments.store')}}" method="post">--}}
{{--@csrf--}}
{{--    <textarea name="content" rows="3"></textarea>--}}
{{--    <input type="hidden" name="post_id" value="{{$post->id}}">--}}
{{--    <button type="submit">Save</button>--}}
{{--</form>--}}
{{--    <hr>--}}
{{--    @foreach($post->comments as $comment)--}}
{{--            <p>{{$comment->content}}</p>--}}
{{--    <small>{{$comment->created_at}}|author:{{$comment->user->name}} </small>--}}
{{--<form action="{{route('comments.destroy',$comment->id)}}" method="post">--}}
{{--    @csrf--}}
{{--    @method('DELETE')--}}
{{--    <button type="submit">DELETE</button>--}}
{{--</form>--}}
{{--        @endforeach--}}


@endsection

