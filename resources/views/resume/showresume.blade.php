@extends('layouts.app')
@section('title','showresume page')
@section('content')



    <div class="card" style="width: 18rem;">
        <img src="{{$resume->photo}}" class="card-img-top" alt="...">
        <div class="card-body">
            <h5 class="card-title">{{$resume->name}}</h5>
            <p class="card-text">{{$resume->surname}}</p>
            <p class="card-text">{{$resume->email}}</p>
            <p class="card-text">{{$resume->profession}}</p>
            <p class="card-text">{{$resume->data}}</p>
            <p class="card-text">{{$resume->language}}</p>
            <p class="card-text">{{$resume->adress}}</p>
            <p class="card-text">{{$resume->hobbi}}</p>
            <a href="{{route('resumes.edit',$resume->id)}}" class="btn btn-primary">Edit</a>
        </div





@endsection
