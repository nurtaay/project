@extends('layouts.adm')
@section('title','index page')
@section('content')

    <a href="{{route('vacancy.create')}}" class="btn btn-outline-primary">Create</a>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Code</th>
            <th scope="col">Edit</th>
            <th scope="col">Delete</th>

        </thead>
        <tbody>
        @for($i=0;$i<count($vacancy);$i++)
            <tr>
                <th scope="row">{{$i+1}}</th>
                <td>{{$vacancy[$i]->name}}</td>
                <td>{{$vacancy[$i]->code}}</td>
                <td><a class="btn btn-outline-success">Edit</a></td>
                <td>
                    <form action="{{route('vacancy.destroy', $vacancy[$i]->id)}}" method="post">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger" type="submit">Delete</button>
                    </form>
                </td>
            </tr>
        @endfor
        </tbody>

    </table>
@endsection




