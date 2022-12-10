@extends('layouts.app')

@section('content')
    <div class="container">
        <section style="background-color: #eee; margin-top: 100px">
            <div class="container py-5">
                <div class="row">
                    <div class="col">
                        <nav aria-label="breadcrumb" class="bg-light rounded-3 p-3 mb-4">
                            <ol class="breadcrumb mb-0">
                                <a href="{{route('posts.index')}}" class="btn btn-outline-info">{{__('messages.back')}}</a>
                            </ol>
                        </nav>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4">
                        <div class="card mb-4">
                            <div class="card-body text-center">
                                <form action="{{ route('avatar',Auth::user()->id) }}" method="post" enctype="multipart/form-data">

                                    @csrf
                                    @method('PUT')
                                    <img src="{{asset(Auth::user()->avatar)}}" class="card-img-top" style="width: 170px; margin-right: auto; margin-left: auto; margin-top: 10px;" >
                                    <div class="mb-3">
                                        <h5 class="my-3">{{$user->name}}</h5>
                                        <label for="imgInput" class="form-label">{{ __('messages.image') }}:</label>

                                        <input type="file" class="form-control @error('img') is-invalid @enderror" id="imgInput" name="avatar">

                                        @error('img')

                                        <div class="alert alert-danger">{{$message}}</div>

                                        @enderror

                                    </div>

                                    <button type="submit" class="btn btn-primary">{{ __('buttons.add') }}</button>
                                </form>
                            </div>
                        </div>

                    </div>
                    <div class="col-lg-8">
                        <div class="card mb-4">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-3">
                                        <p class="mb-0">{{__('messages.title')}}</p>
                                    </div>
                                    <div class="col-sm-9">
                                        <p class="text-muted mb-0">{{$user->name}}</p>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <p class="mb-0">{{__('messages.email')}}</p>
                                    </div>
                                    <div class="col-sm-9">
                                        <p class="text-muted mb-0">{{$user->email}}</p>
                                    </div>
                                </div>


                                <hr>
                                <div class="row">

                                    <div class="col-sm-9">
                                        <a href="{{route('posts.index')}}" class="btn btn-outline-info">{{__('buttons.edit')}}</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    </form>
                </div>
                </div>
        </section>
    </div>
@endsection
