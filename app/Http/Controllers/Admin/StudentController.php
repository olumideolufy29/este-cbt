<?php

namespace Eoola\Http\Controllers\Admin;

use Illuminate\Http\Request;

use Eoola\Http\Requests;
use Eoola\Http\Controllers\Controller;
use Eoola\Http\Requests\StudentManagement;
use Eoola\Http\Requests\StudentUpdate;

use Eoola\Student;
use Eoola\User;
use Eoola\Kelas;

class StudentController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students = Student::paginate(20);
        return view('admin.student.index',[
            'students' => $students,
            ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $class = Kelas::all();
        return view('admin.student.create', [
            'classes' => $class,
            ]);
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StudentManagement $request)
    {
        $user = new User;
        $user->name = $request->name;
        $user->no_induk = $request->no_induk;
        $user->password = bcrypt('siswa'.$request->no_induk);
        $user->role = 'student';
        $user->save();
        $user = User::where('no_induk', $request->no_induk)->first();

        $student = new Student;
        $student->user_id = $user->id;
        $student->gender = $request->gender;
        $student->class_id = $request->class;
        $student->save();
        return redirect()->route('admin.student-management.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $student = Student::find($id);
        return view('admin.student.show',[
            'student' => $student,
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
        $class = Kelas::all();
        $student = Student::find($id);
        return view('admin.student.edit',[
            'student' => $student,
            'classes' => $class,
            ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StudentUpdate $request, $id)
    {
        $student = Student::find($id);
        $student->user->name = $request->name;
        $student->user->password = $request->password;
        $student->gender = $request->gender;
        $student->class_id = $request->class;
        $student->save();
        return redirect()->route('admin.student-management.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $student_id = Student::find($id)->user->id;
        $student = User::find($student_id)->delete();
        return redirect()->route('admin.student-management.index');
    }   
}
