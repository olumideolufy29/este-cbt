<?php

namespace Eoola\Http\Controllers\Make;

use Illuminate\Http\Request;

use Eoola\Http\Requests;
use Eoola\Http\Controllers\Controller;

class QuestionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
      $check = \Eoola\Test::where('id',$id)->first();
      if ($check == null) {
        return redirect()->route('test-management.create')->withErrors(['msg' => 'kode ujian untuk '.$code.' tidak ditemukan']);
      }

      return view('admin-teacher.question-management.edit',['exam' => $check]);
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
        'soal.*' => 'required',
        'key.*' => 'required',
        'jawaban.*.*' => 'required',
      ];

      $validator = \Validator::make($request->all(),$field);

      if ($validator->fails()) {
        // return redirect('/teacher')->withErrors($validator)->withInput();
          //->withInput()
        return back()
          ->withErrors($validator)
          ->with('soal',$request->soal)
          ->with('key',$request->key)
          ->with('jawaban',$request->jawaban);
      }

      if (\Eoola\Question::where('test_id',$id)->count() > 0) {
        $questions = \Eoola\Question::where('test_id',$id)->delete();
      }

      foreach ($request->soal as $key => $value) {
        $soal = $value;
        $a = $request->jawaban[$key][0];
        $b = $request->jawaban[$key][1];
        $c = $request->jawaban[$key][2];
        $d = $request->jawaban[$key][3];
        $e = $request->jawaban[$key][4];

        $jawaban = $request->key[$key];

        $question = new \Eoola\Question;
        $question->type = 'text';
        $question->test_id = $id;
        $question->question = $soal;
        $question->a = $a;
        $question->b = $b;
        $question->c = $c;
        $question->d = $d;
        $question->e = $e;
        $question->correct_answer = $jawaban; 
        $question->save();
      }
      
      return redirect()->route('test-management.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $questions = \Eoola\Question::where('test_id',$id)->delete();
        return redirect()->route('test-management.index');
    }
}
