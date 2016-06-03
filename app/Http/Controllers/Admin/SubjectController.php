<?php

namespace Eoola\Http\Controllers\Admin;

use Illuminate\Http\Request;

use Eoola\Http\Requests;
use Eoola\Http\Controllers\Controller;
use Eoola\Http\Requests\SubjectManagement;
use Eoola\Http\Requests\SubjectUpdate;

use Eoola\Subject;

class SubjectController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subjects = Subject::paginate(20);
        return view('admin.subject.index',[
            'subjects' => $subjects,
            ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.subject.create');
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SubjectManagement $request)
    {
        $subject = new Subject;
        $subject->code = $request->code;
        $subject->name = $request->name;
        $subject->save();
        return redirect()->route('admin.subject-management.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $subject = Subject::find($id);
        return view('admin.subject.show',[
            'subject' => $subject,
            ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $subject = Subject::find($id);
        return view('admin.subject.edit',[
            'subject' => $subject,
            ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SubjectUpdate $request, $id)
    {
        $subject = Subject::find($id);
        $subject->name = $request->name;
        $subject->save();
        return redirect()->route('admin.subject-management.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $subject = Subject::find($id)->delete();
        return redirect()->route('admin.subject-management.index');
    }   
}
