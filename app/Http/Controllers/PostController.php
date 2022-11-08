<?php

namespace App\Http\Controllers;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function postsByCat(Category $category){
       return view('posts.index',['posts'=>$category->posts,'categories'=>Category::all()]);

    }
    public function  index (){
        $allPosts= Post::all();

        return view('posts.index',['posts'=>$allPosts,'categories'=>Category::all()]);
    }
    public function  create(){
        $this->authorize('create',Post::class);
        return view ('posts.create',['categories'=>Category::all()]);
    }
    public function store(Request $req){
        $this->authorize('create',Post::class);
       $validated= $req->validate([
            'title'=>'required',
            'image'=>'required',
            'content'=>'required',
            'category_id'=>'required|numeric |exists:categories,id'
        ]);



        Auth::user()->posts()->create($validated);
        return redirect()->route('posts.index')->with('message','ПОСТ УСПЕШНО СОХРАНЕН !!');
    }
    public function show(Post $post ){


        return view('posts.show',['post'=>$post]);
    }


    public function edit(Post $post)
    {
        return view('posts.edit',['post'=>$post,'categories'=>Category::all()]);
    }


    public function update(Request $request, Post $post)
    {
        $post->update([
            'title'=>$request->input('title'),
            'content'=>$request->input('content'),
            'category_id'=>$request->category_id,
        ]);
        return redirect()->route('posts.index')->with('message','ПОСТ ИЗМЕНЕН');

    }


    public function destroy(Post $post)
    {
        $this->authorize('delete',$post);
        $post->delete();
        return redirect()->route('posts.index');

    }
}
