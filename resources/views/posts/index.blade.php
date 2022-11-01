@extends('layouts.app')
@section('title','index page')
@section('content')
    <div class="container">
        <div class="row justify-content-center">

                <div class="row">
                <br>




                @foreach($posts as $post)
                        <div class="col-sm-4">
                        <div class="card" >

                        <div class="card-body">

                            <div class="card-header" ><h5 class="card-title">{{$post->title}} </h5></div>
                            <img class="card-img-top" src="{{$post->image}}" alt="Card image cap">
                            <p class="card-text">{{$post->content}}</p>

                                 <form action="{{route('posts.destroy',$post->id)}}"method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger" type="submit">Delete</button>
                                </form>
                                <button type="button" class="btn btn-success"><a href="{{route('posts.show',$post->id)}}" >read more</a></button>

                            <span class="d-block pb-sm-1 text-bg-primary"><small>{{$post->user->name}}</small></span>
                        </div>
                    </div>





                    </div>



                @endforeach
                    </div>
                </div>
            </div>

        </div>
    </div>

    @endsection




