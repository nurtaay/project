@extends('layouts.app')
@section('title','indexresume PAGE')
@section('content')
    <a class="btn btn-danger" href="{{ route('resumes.create') }}">Create resume</a>

    <div class="container">
        <a style="margin-top: 100px" href="{{route('resumes.create')}}" class="btn btn-primary">Create</a>
        <div class="row justify-content-center">
            <div class="col-md-10">
                <table  style="width: 800px; margin-top: 100px">
                    @foreach($resumes as $resume)
                    <tr>
                        <td> <img src="{{$resume->photo}}" class="card-img-top" alt="..."></td>
                        <td>

                            <div class="col " style="align-items: end">
                                <div class="row row-cols-1 row-cols-md-3 g-1">
                                        <div class="col " style="margin-bottom: 20px;">
                                            <div class="card text-white  h-100 "
                                                 style="width: 240px;background: linear-gradient(110.07deg, rgba(255, 255, 255, 0.2) 15.92%, rgba(164, 226, 185, 0) 101.14%), #4FA480;; ">
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
                                                    <form action="{{route('resumes.destroy',$resume->id)}}" method="post">
                                                        @csrf
                                                        @method('Delete')
                                                        <button class="btn btn-danger" type="submit">delete</button>
                                                    </form>
                                                    <button type="button" class="btn btn-success"><a href="{{route('resumes.show',$resume->id)}}" >read more</a></button>

                                                </div>
                                                </div>
                                            </div>
                                    @endforeach
                                </div>
                            </div>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>

@endsection
