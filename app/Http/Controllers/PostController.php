<?php

namespace App\Http\Controllers;
use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function myFavourites(){
        $fav= Auth::user()->favouritePosts()->get();
        return view('posts.favourites',['posts'=>$fav,'categories'=>Category::all()]);

    }
    public function favourite (Request $request,Post $post){
        $favpost=Auth::user()->favouritePosts()->where('post_id',$post->id)->first();

        if($favpost!=null){
            Auth::user()->favouritePosts()->detach($post->id);
        }
        else{
            Auth::user()->favouritePosts()
                ->attach($post->id);
        }
        return back();
    }
    public function product(Request $request){
        $x = Post::with('category')->get();
        return view('posts.index', ['products' => $x, 'product'=>Post::all()]);
    }

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
    public function store(Request $request){
        $this->authorize('create',Post::class);
       $validated= $request->validate([
            'title'=>'required',
            'content'=>'required',
            'category_id'=>'required|numeric |exists:categories,id'
        ]);

//        $fillname = time().$request->file('image')->getClientOriginalName();
//        $image_path = $request->file('image')->storeAs('posts', $fillname, 'public');
//        $validated ['image'] = '/storage/'.$image_path;
//        Auth::user()->posts()->create($validated);



        Auth::user()->posts()->create($validated);
        return redirect()->route('posts.index')->with('message','ПОСТ УСПЕШНО СОХРАНЕН !!');
    }
    public function show(Post $post){
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
        return redirect()->route('posts.product')->with('message','ПОСТ ИЗМЕНЕН');

    }
    public function avatar(Request $request,User $user)
    {

        $validated = $request->validate([
            'avatar' =>'image|mimes:jpg,png,jpeg,gif,svg|max:2048'
        ]);

        $fileName = time() . $request->file('avatar')->getClientOriginalName();
        $image_path = $request->file('avatar')->storeAs('posts', $fileName, 'public');
        $user->update([
            'avatar' => '/storage/'.$image_path,
        ]);
        return redirect()->route('user.profile', ['categories'=>Category::all()]) ->with('message','Product Duris Saktaldy');
    }

    public function profile()
    {
        $user = Auth::user();
        return view('auth.passwords.profile',['user'=>$user, 'categories'=>Category::all()]);
    }

    public function destroy(Post $post)
    {
        $this->authorize('delete',$post);
        $post->delete();
        return redirect()->route('posts.index');

    }

    public function message_v(Request $request,Post $post){
        $request->validate([
            'message'=>'required|max:255'
        ]);

        Auth::user()->Rposts()->attach($post->id, ['message'=>$request->input('message')]);
        return back();
    }

    public function message(Post $post){
        $otk = $post->Rposts2()->get();
        return view('posts.message',['posts'=>$otk]);
    }
}
