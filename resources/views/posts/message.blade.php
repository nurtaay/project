@extends('layouts.app')
@section('title','create page')
@section('content')

    <table>
       <thead>
       <tr>
           <th class="col">Name</th>
           <th class="col">resume</th>
       </tr>
       </thead>
        <tbody>
            @foreach($posts as $post)
                <tr>
                    <td>{{$post->name}}</td>
                    <td>{{$post->pivot->message}}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

@endsection
