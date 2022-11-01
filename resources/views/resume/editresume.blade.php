@extends('layouts.app')
@section('title','editresume page')
@section('content')


    <div>
        <div class="card">
            <div class="card-body">
                <form action ="{{route('resumes.update',$resume->id)}}" method="post">
                    @csrf
                    @method('PUT')

                    <input class="card-title" type="text" name="photo" value="{{$resume->photo}}"><br>
                    <input class="card-title" type="text" name="name" value="{{$resume->name}}"><br>
                    <input class="card-title" type="text" name="surname" value="{{$resume->surname}}"><br>
                    <input class="card-title" type="text" name="email" value="{{$resume->email}}"><br>
                    <input class="card-title" type="text" name="profession" value="{{$resume->profession}}"><br>
                    <input class="card-title" type="text" name="data" value="{{$resume->data}}"><br>
                    <input class="card-title" type="text" name="language" value="{{$resume->language}}"><br>
                    <input class="card-title" type="text" name="adress" value="{{$resume->adress}}"><br>
                    <input class="card-title" type="text" name="hobbi" value="{{$resume->hobbi}}"><br>
                    <button type="submit" class="btn btn-outline-success"> Update post</button>
                </form>
            </div>
        </div>
    </div>










@endsection

