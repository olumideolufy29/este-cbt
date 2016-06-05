<?php

namespace Eoola\Http\Controllers\Student;

use Illuminate\Http\Request;

use Eoola\Http\Requests;
use Eoola\Http\Controllers\Controller;

class AnswerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('student.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tests = \Eoola\Test::where('id',$id)->first();

        return view('student.ujian',['tests' => $tests]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    /**
    * Redirect user, and create session for timer
    *
    * @param \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
    public function init(Request $request)
    {
        $field = [
            'test_code' => 'required',
        ];

        $validator = \Validator::make($request->all(),$field);

        if ($validator->fails()) {
            return back()->withErrors($validator);
        }

        if(!\Eoola\Test::where('code',$request->test_code)->exists()) {
            return back()->withErrors(['msg' => 'kode ujian tidak ditemukan']);
        }

        // if (!\Session::has('start_time'))
        // {
        //     session(['start_time' => time()]);
        // }

        session(['start_time' => time()]);

        $test = \Eoola\Test::where('code',$request->test_code)->first();

        return redirect()->route('student.answer.show', $test->id);
    }
}
