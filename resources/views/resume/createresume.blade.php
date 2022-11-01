@extends('layouts.app')
@section('title','createresume PAGE')
@section('content')
<div class="container">
    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
    @endif


    <div class="row justify-content-center">
        <div class="col-md-10">
            <form action="{{route('resumes.store')}}" method="post">
                @csrf
                <div class="form-group">
                    <label for="photoInput" >Photo</label>
                    <input type="text" class="form-control  @error('photo') is-invalid @enderror" name="photo" id="photoInput" placeholder="Enter photo url " >

                </div>
                <div class="form-group">
                    <label for="nameInput" >Name:</label>
                    <input type="text" class="form-control  @error('name') is-invalid @enderror" name="name" id="nameInput" placeholder="Enter name " >
                    @error('name')
                    <div class="alert alert-danger">{{$message}}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="surnameInput" >Surname:</label>
                    <input type="text" class="form-control  @error('surname') is-invalid @enderror" name="surname" id="surnameInput" placeholder="Enter surname " >
                    @error('surname')
                    <div class="alert alert-danger">{{$message}}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="emailInput" >Email:</label>
                    <input type="text" class="form-control  @error('email') is-invalid @enderror" name="email" id="emailInput" placeholder="Enter email " >
                    @error('email')
                    <div class="alert alert-danger">{{$message}}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="professionInput" >Profession:</label>
                    <input type="text" class="form-control  @error('profession') is-invalid @enderror" name="profession" id="professionInput" placeholder="Enter your profession " >
                    @error('profession')
                    <div class="alert alert-danger">{{$message}}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="dataInput" >Date,month,year of birth:</label>
                    <input type="text" class="form-control  @error('data') is-invalid @enderror" name="data" id="dataInput" placeholder="Enter your date: " >
                    @error('data')
                    <div class="alert alert-danger">{{$message}}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="languageInput" >Language:</label>
                    <input type="text" class="form-control  @error('language') is-invalid @enderror" name="language" id="languageInput" placeholder="Enter your language: " >
                    @error('language')
                    <div class="alert alert-danger">{{$message}}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="adressInput" >Adress:</label>
                    <input type="text" class="form-control  @error('adress') is-invalid @enderror" name="adress" id="adressInput" placeholder="Enter your adress: " >
                    @error('adress')
                    <div class="alert alert-danger">{{$message}}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="hobbiInput" >Hobbies:</label>
                    <input type="text" class="form-control  @error('hobbi') is-invalid @enderror" name="hobbi" id="hobbiInput" placeholder="Enter your hobbi: " >
                    @error('hobbi')
                    <div class="alert alert-danger">{{$message}}</div>
                    @enderror
                </div>

                <button class="btn btn-outline-success" type="submit"> Save post</button>

            </form>
        </div>

    </div>





































</div>



@endsection
