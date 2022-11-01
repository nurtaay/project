<?php

namespace App\Http\Controllers;

use App\Models\Resume;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ResumeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $allResumes= Resume::all();
       return view('resume.indexresume',['resumes'=>$allResumes]);
    }


    public function create()
    {
        return view('resume.createresume');
    }


    public function store(Request $request)
    {
        $validated=$request->validate([
            'photo'=>'required',
            'name'=>'required',
            'surname'=>'required',
            'email'=>'required',
            'profession'=>'required',
            'data'=>'required',
            'language'=>'required',
            'adress'=>'required',
            'hobbi'=>'required'
        ]);

        Auth::user()->resumes()->create($validated);
        return redirect()->route('resumes.index')->with('message',' РЕЗЮМЕ УСПЕШНО СОХРАНЕН !!!');
    }

    function show(Resume $resume)
    {
        return view('resume.showresume',['resume'=>$resume]);
    }

    public function edit(Resume $resume)
    {
        return view('resume.editresume',['resume'=>$resume]);
    }


    public function update(Request $request, Resume $resume)
    {
        $resume->update([
            'photo'=>$request->input('photo'),
            'name'=>$request->input('name'),
            'surname'=>$request->input('surname'),
            'email'=>$request->input('email'),
            'profession'=>$request->input('profession'),
            'data'=>$request->input('data'),
            'language'=>$request->input('language'),
            'adress'=>$request->input('adress'),
            'hobbi'=>$request->input('hobbi'),
        ]);
        return redirect()->route('resumes.index')->with('message','Резюме изменён!!!');

    }


    public function destroy(Resume $resume)
    {
        $resume->delete();
        return redirect()->route('resumes.index');
    }
}
