@extends('layouts.adm')
@section('title','create page')
@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="row">
                <br>
                @foreach($posts as $post)
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="card-header" ><h5 class="card-title">{{$post->title}} </h5></div>
                                <p class="card-text">{{$post->content}}</p>
                                <a class="btn-outline-primary" href="{{route('adm.admcomment.show',$post->id)}}">Read more</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
