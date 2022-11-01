@extends('layouts.app')
@section('title','indexresume PAGE')
@section('content')
    <a class="btn btn-danger" href="{{ route('resumes.create') }}">Create resume</a>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">

                <div class="col " style="align-items: end">
                    <div class="row row-cols-1 row-cols-md-3 g-1">
                        @foreach($resumes as $resume)
                            <div class="col " style="margin-bottom: 20px;">
                                <div class="card text-white  h-100 "
                                     style="width: 240px;background: linear-gradient(110.07deg, rgba(255, 255, 255, 0.2) 15.92%, rgba(164, 226, 185, 0) 101.14%), #4FA480;; ">

                                        <img src="{{$resume->photo}}" class="card-img-top" alt="...">

                                    <div class="card-body">
                                        <h5 class="card-title"></h5>
                                        <hr>
                                        <p class="card-text">Name:{{$resume->name}} </p>
                                        <p class="card-text">Surname:{{$resume->surname}} </p>
                                        <p class="card-text">Email:{{$resume->email}} </p>
                                        <p class="card-text">Profession:{{$resume->profession}}</p>
                                        <p class="card-text">Data:{{$resume->data}} </p>
                                        <p class="card-text">Language:{{$resume->language}} </p>
                                        <p class="card-text">Adress:{{$resume->adress}} </p>
                                        <p class="card-text">Hobbi:{{$resume->hobbi}} </p>
                                        <button type="button"class="btn btn-warning"><small>{{$resume->user->name}} </small>
                                        </button >
                                        <button type="button"class="btn btn-warning"><small>{{$resume->created_at}} </small></button>
                                    </div>
                                </div>

                                <form action="{{route('resumes.destroy',$resume->id)}}" method="post">
                                    @csrf
                                    @method('Delete')
                                    <button class="btn btn-danger" type="submit">delete</button>
                                </form>
                                <button type="button" class="btn btn-success"><a href="{{route('resumes.show',$resume->id)}}" >read more</a></button>

                            </div>

                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
