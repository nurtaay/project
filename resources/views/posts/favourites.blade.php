@extends('layouts.app')
@section('title','favourite page')
@section('content')
    <div class="container">
        <div class="row justify-content-center" style="margin-top: 200px">
            <div class="row">
                <br>
                @foreach($posts as $post)
                    <div class="col-sm-4">
                        <div class="card" >

                            <div class="card-body">

                                <div class="card-header" ><h5 class="card-title">{{$post->title}} </h5></div>
                                <img class="card-img-top" src="{{$post->image}}" alt="Card image cap">
                                <p class="card-text">{{$post->content}}</p>
                                @can('delete',$post)
                                    <form action="{{route('posts.favourite',$post->id)}}"method="post">
                                        @csrf

                                        <button class="btn btn-danger" type="submit">{{__('messages.Delete')}}</button>
                                    </form>
                                @endcan
                                <span class="d-block pb-sm-1 text-bg-primary"><small>{{$post->user->name}}</small></span>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

@endsection
