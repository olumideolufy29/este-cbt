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
        return redirect()->route('teacher.test-management.create')->withErrors(['msg' => 'kode ujian untuk '.$code.' tidak ditemukan']);
      }

      return view('teacher.question-management.edit',['exam' => $check]);
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
      foreach ($request->soal as $id => $value) {
        $soal = $value;
        $a = $request->jawaban[$id][0];
        $b = $request->jawaban[$id][1];
        $c = $request->jawaban[$id][2];
        $d = $request->jawaban[$id][3];
        $e = $request->jawaban[$id][4];

        $jawaban = $request->key[$id];

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
        $question->difficulty = "GODLIKE";
        $question->save();
      }
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
}
