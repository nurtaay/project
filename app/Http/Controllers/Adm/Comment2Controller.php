<?php

namespace App\Http\Controllers\Adm;

use App\Http\Controllers\Controller;
use App\Http\Controllers\PostController;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
use Carbon\CarbonImmutable;
use Illuminate\Http\Request;

class Comment2Controller extends Controller
{
    public function  index (){
        $allPosts= Post::all();

        return view('adm.admcomment.index',['comments' => Comment::all(), 'posts'=>$allPosts,'categories'=>Category::all()]);
    }

    public function show(Post $post){
        return view('adm.admcomment.show',['post'=>$post, 'comments' => Comment::all()]);
    }

   public function destroy(Comment $admcomment){
       $admcomment->delete();
       return back();
   }
}
