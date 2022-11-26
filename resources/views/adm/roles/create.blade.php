@extends('layouts.adm')
@section('title','Vacancy page')
@section('content')
     <h1> Create Vacancy! </h1>

     <div class="container text-white" style="padding: 10px;margin-top:60px; ">

         <div class="col" style="padding: 5px 300px 30px 300px; ">
             <form action="{{ route('vacancy.store') }}" method="post" style="background-color: #66f;padding: 10px 30px 10px 30px ; border-radius: 20px">
                 @csrf

                 <div class="mb-2">
                     <label class="form-label">
                         Name
                         </label>
                     <input type="text" required name="name" class="form-control">
                     </div>
                 <div class="mb-2">
                     <label class="form-label">
                         Code
                         </label>
                     <input type="text" required name="code" class="form-control">
                     </div>
                 <div class="mb-2">
                     <button class="btn btn-light">ADD </button>
                     </div>
@endsection


{{--@extends('layouts.adm')--}}
{{--@section('title','create page')--}}
{{--@section('content')--}}
{{--    <div class="container">--}}
{{--        @if($errors->any())--}}
{{--            <div class="alert alert-danger">--}}
{{--                <ul>--}}
{{--                    @foreach ($errors->all() as $error)--}}
{{--                        <li>{{$error}}</li>--}}
{{--                    @endforeach--}}
{{--                </ul>--}}
{{--            </div>--}}
{{--            @endif--}}
{{--        <div class="row justify-content-center" style="margin-top: 200px">--}}
{{--            <div class="col-md-10">--}}

{{--                    <form action ="{{route('posts.store')}}" method="post">--}}
{{--                    @csrf--}}
{{--                        <div class="form-group">--}}
{{--                            <label for="titleInput" >Title</label>--}}
{{--                            <input type="text" class="form-control  @error('title') is-invalid @enderror" name="title" id="titleInput" placeholder="Enter title " >--}}

{{--                        </div>--}}

{{--                        <div class="form-group">--}}
{{--                            <label for="imageInput" >Image</label>--}}
{{--                            <input type="text" class="form-control  @error('image') is-invalid @enderror" name="image" id="imageInput" placeholder="Enter image url " >--}}

{{--                        </div>--}}
{{--                        <div class="form-group">--}}
{{--                            <label for="contentInput" >Content</label>--}}
{{--                            <textarea class="form-control @error('content') is-invalid @enderror " id="contentInput" rows="3" name="content"></textarea>--}}
{{--                            @error('content')--}}
{{--                            <div class="alert alert-danger">{{$message}}</div>--}}
{{--                            @enderror--}}
{{--                        </div>--}}
{{--                        <div class="form-group">--}}
{{--                            <label for="categoryInput" >Category</label>--}}
{{--                            <select class="form-control @error('category_id') is-invalid @enderror  " name="category_id" id="categoryInput">--}}
{{--                                @foreach($categories as $cat)--}}
{{--                                    <option value =" {{$cat->id}}">{{$cat->name}}</option>--}}
{{--                                @endforeach--}}
{{--                            </select>--}}
{{--                            @error('category_id')--}}
{{--                            <div class="alert alert-danger">{{$message}}</div>--}}
{{--                            @enderror--}}
{{--                        </div>--}}
{{--                        <button class="btn btn-outline-success" type="submit"> Save post</button>--}}
{{--                    </form>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--@endsection--}}

