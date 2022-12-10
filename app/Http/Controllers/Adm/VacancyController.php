<?php

namespace App\Http\Controllers\Adm;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VacancyController extends Controller
{
    public function  index (){
        $allPosts= Category::all();

        return view('adm.vacancy.index',['vacancy'=>$allPosts,'categories'=>Category::all()]);
    }

    public function  create(){
        return view ('adm.vacancy.create',['categories'=>Category::all()]);
    }

    public function store(Request $request){
        Category::create([
            'name' => $request->input('name'),
            'code' => $request->input('code'),

        ]);

        return redirect()->route('adm.vacancy.index',['categories'=>Category::all()])->with('message','ПОСТ УСПЕШНО СОХРАНЕН !!');
    }
    public function show(Category $category ){


        return view('adm.vacancy.show',['post'=>$category]);
    }


    public function edit(Post $post)
    {
        return view('adm.vacancy.edit',['post'=>$post,'categories'=>Category::all()]);
    }


    public function update(Request $request, Category $category)
    {
        $category->update([
            'name'=>$request->input('name'),
            'code'=>$request->input('code'),
        ]);
        return redirect()->route('adm.vacancy.index', ['categories'=>Category::all()])->with('message','ПОСТ ИЗМЕНЕН');

    }

    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route('adm.vacancy.index');

    }
}
