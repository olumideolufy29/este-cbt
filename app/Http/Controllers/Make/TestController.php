<?php

namespace Eoola\Http\Controllers\Make;

use Illuminate\Http\Request;

use Eoola\Http\Requests;
use Eoola\Http\Controllers\Controller;

use Eoola\Test;

class TestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tests = Test::paginate(20);
        return view('teacher.test-management.index',[
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
        return view('teacher.test-management.create');
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
        'code_test' => 'required',
        'name_test' => 'required',
        'subject' => 'required|integer',
        'type' => 'required',
        'duration' => 'required',
      ];

      $validator = \Validator::make($request->all(),$field);

      if ($validator->fails()) 
      {
        return redirect()->route('teacher.test-management.create')->withErrors($validator)->withInput();
      }

      $exams = new \Eoola\Test;
      $exams->name = $request->name_test;
      $exams->code = $request->code_test;
      $exams->duration = $request->duration;
      $exams->type = $request->type;
      $exams->subject_id = $request->subject;
      $exams->user_id = \Auth::user()->id;
      $exams->save();

      return redirect()->route('teacher.question-management.edit',['id' => $exams->id]);
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
        $test = Test::find($id);
        return view('teacher.test-management.edit',[
            'test' => $test
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
        $test = Test::find($id);
        $test->name = $request->name_test;
        $test->code = $request->code_test;
        $test->duration = $request->duration;
        $test->type = $request->type;
        $test->subject_id = $request->subject;
        $test->save();
        return redirect()->route('teacher.test-management.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $test = Test::find($id)->delete();
        return redirect()->route('teacher.test-management.index');
    }
}
