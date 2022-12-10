@extends('layouts.app')
@section('title','create page')
@section('content')



    <div class="card" style="width: 50rem; margin-top: 250px; margin-left: 200px">
        <div class="card-body">
            <h5 class="card-title">{{$post->title}}</h5>
            <p class="card-text">{{$post->content}}</p>
        </div>
        <div class="form-group">
            <div>
                <div class="card">
                    <div class="card-body" style="width: 1500px">
                                <form action="{{route('comments.store')}}" method="post">
                            @csrf
                            <textarea name="content" rows="3" placeholder="откликаться"></textarea>
                            <input type="hidden" name="post_id" value="{{$post->id}}">
                            <button type="submit" class="btn btn-outline-success">Save</button>
                        </form>
                    </div>
                </div>
                <a href="{{route('posts.message',$post->id)}}">Otk</a>
                <form action="{{route('posts.all', $post->id)}}" method="post">
                    @csrf
                    <input type="text" class="form-check" name="message">
                    <button class="btn btn-outline-primary">OTk</button>
                </form>
            </div>
            <hr>
            <form action ="{{route('posts.favourite',$post->id)}}" method="post">
                @csrf
                <button class="btn btn-outline-success" type="submit">Fav list</button>

            </form>
            <div>
                <div class="card">
                    <div class="card-body">
                        @foreach($post->comments as $comment)
                            <p type="button"><small>{{$comment->user->name}} </small></p>
                            <p type="button"><small>{{$comment->created_at}} </small></p>
                            <p>{{$comment->content}}</p>
                            <form action="{{route('comments.destroy',$comment->id)}}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-outline-danger">DELETE</button>
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

