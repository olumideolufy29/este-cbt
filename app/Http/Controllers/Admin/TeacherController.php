<?php

namespace Eoola\Http\Controllers\Admin;

use Illuminate\Http\Request;

use Eoola\Http\Requests;
use Eoola\Http\Controllers\Controller;
use Eoola\Http\Requests\TeacherManagement;
use Eoola\Http\Requests\TeacherUpdate;

use Eoola\Teacher;
use Eoola\User;
use Eoola\Subject;

class TeacherController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $teachers = Teacher::paginate(20);
        return view('admin.teacher.index',[
            'teachers' => $teachers,
            ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $subjects = Subject::all();
        return view('admin.teacher.create',[
            'subjects' => $subjects,
            ]);
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TeacherManagement $request)
    {
        $user = new User;
        $user->name = $request->name;
        $user->no_induk = $request->no_induk;
        $user->password = bcrypt('guru123');
        $user->role = 'student';
        $user->save();
        $user = User::where('no_induk', $request->no_induk)->first();

        $teacher = new Teacher;
        $teacher->user_id = $user->id;
        $teacher->gender = $request->gender;
        $teacher->subject_id = $request->subject;
        $teacher->save();
        return redirect()->route('admin.teacher-management.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $teacher = Teacher::find($id);
        return view('admin.teacher.show',[
            'teacher' => $teacher,
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
        $subjects = Subject::all();
        $teacher = Teacher::find($id);
        return view('admin.teacher.edit',[
            'teacher' => $teacher,
            'subjects' => $subjects,
            ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TeacherUpdate $request, $id)
    {
        $teacher = Teacher::find($id);
        $teacher->user->name = $request->name;
        $teacher->user->password = $request->password;
        $teacher->gender = $request->gender;
        $teacher->subject_id = $request->subject;
        $teacher->save();
        return redirect()->route('admin.teacher-management.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $teacher_id = Teacher::find($id)->user->id;
        $teacher = User::find($teacher_id)->delete();
        return redirect()->route('admin.teacher-management.index');
    }   
}
