@extends('layouts.adm')

@section('title', 'Users')

@section('content')

    <h1>Product List</h1>

    <a class="btn btn-outline-success mt-5" href="{{route('posts.create')}}">Add</a>
    <table class="table">
        <thead class="thead-dark">
        <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Content</th>
            <th scope="col">Category</th>
            <th scope="col">Edit</th>
            <th scope="col">Delete</th>
        </tr>
        </thead>
        <tbody>
        @for($i=0; $i<count($products); $i++)
            <tr>
                <th scope="row">{{$i+1}}</th>
                <td>{{$products[$i]->title}}</td>
                <td>{{$products[$i]->content}}</td>
                <td>{{$products[$i]->category->name}}</td>
                <td>
                  <a href="{{route('posts.edit', $products[$i]->id)}}" class="btn btn-success">EDIT</a>
                </td>
                <td>
                    <form action="{{route('posts.destroy', $products[$i]->id)}}" method="post">
                        @csrf
                        @method('DELETE')
                        <button class="flex-sm-row btn btn-danger mt-1" type="submit">Delete</button>
                    </form>
                </td>
            </tr>
        @endfor
        </tbody>
    </table>
@endsection
