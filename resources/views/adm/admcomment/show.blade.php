@extends('layouts.adm')
@section('title','create page')
@section('content')
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">{{$post->title}}</h5>
            <p class="card-text">{{$post->content}}</p>
        </div>
            <hr>
            <div>
                <div class="card">
                    <div class="card-body">
                            @foreach($comments as $comment)
                                <p type="button"><small>{{$comment->user->name}} </small></p>
                                <p type="button"><small>{{$comment->created_at}} </small></p>
                                <p>{{$comment->content}}</p>
                                <form action="{{route('adm.admcomment.destroy',$comment->id)}}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-outline-danger">DELETE</button>
                                </form>
                            @endforeach
                    </div>
                </div>

            </div>
@endsection()
