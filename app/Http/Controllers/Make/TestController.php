<?php

namespace Eoola\Http\Controllers\Make;

use Illuminate\Http\Request;

use Eoola\Http\Requests;
use Eoola\Http\Controllers\Controller;

use Eoola\Test;
use Eoola\Subject;

class TestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (auth()->user()->role == "admin") {
            $tests = Test::paginate(20);
        } else {
            $tests = Test::where('user_id',auth()->user()->id)->paginate(20);
        }
        return view('admin-teacher.test-management.index',[
            'tests' => $tests,
            ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $subject = array();
        if (auth()->user()->role == 'admin') {
            $subject = Subject::all();
        }
        return view('admin-teacher.test-management.create',[
            'subjects' => $subject,
            ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $field = [
        'code' => 'required|unique:tests',
        'name_test' => 'required',
        'subject' => 'required|integer',
        'type' => 'required',
        'duration' => 'required',
      ];

      $validator = \Validator::make($request->all(),$field);

      if ($validator->fails()) 
      {
        return redirect()->route('test-management.create')->withErrors($validator)->withInput();
      }

      $exams = new \Eoola\Test;
      $exams->name = $request->name_test;
      $exams->code = $request->code;
      $exams->duration = $request->duration;
      $exams->type = $request->type;
      $exams->subject_id = $request->subject;
      $exams->user_id = \Auth::user()->id;
      $exams->save();

      return redirect()->route('question-management.edit',['id' => $exams->id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $subject = array();
        if (auth()->user()->role == 'admin') {
            $subject = Subject::all();
        }
        $test = Test::find($id);
        return view('admin-teacher.test-management.edit',[
            'test' => $test,
            'subjects' => $subject,
            ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $field = [
        'name_test' => 'required',
        'subject' => 'required|integer',
        'type' => 'required',
        'duration' => 'required',
      ];

      $validator = \Validator::make($request->all(),$field);

      if ($validator->fails()) 
      {
        return redirect()->route('test-management.create')->withErrors($validator)->withInput();
      }
        $test = Test::find($id);
        $test->name = $request->name_test;
        $test->duration = $request->duration;
        $test->type = $request->type;
        $test->subject_id = $request->subject;
        $test->save();
        return redirect()->route('test-management.index');
    }

    /**
     *  the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $test = Test::find($id)->delete();
        return redirect()->route('test-management.index');
    }
}
