<?php

namespace Eoola\Http\Controllers;

use Illuminate\Http\Request;

use Eoola\Http\Requests;


class TeacherController extends Controller
{
    public function index()
    {
      return view('teacher.createExam');
    }

    public function result($id)
    {
      return view('ListTest');
    }

    public function storeExam(Request $request)
    {

      $field = [
        'code_test' => 'required',
        'name_test' => 'required',
        'subject' => 'required|integer',
        'type' => 'required',
        'duration' => 'required',
      ];

      $validator = \Validator::make($request->all(),$field);

      if ($validator->fails()) {
        return redirect('/teacher')->withErrors($validator)->withInput();
      }

      $exams = new \Eoola\Test;
      $exams->name = $request->name_test;
      $exams->code = $request->code_test;
      $exams->duration = $request->duration;
      $exams->type = $request->type;
      $exams->subject_id = $request->subject;
      $exams->user_id = \Auth::user()->id;
      $exams->save();

      return redirect('/teacher/submitexam/'.$exams->id);
    }

    public function makeExam($id)
    {
      $check = \Eoola\Test::where('id',$id)->first();
      if ($check == null) {
        return redirect('/teacher')->withErrors(['msg' => 'kode ujian untuk '.$code.' tidak ditemukan']);
      }

      return view('teacher.createExamItem',['exam' => $check]);
    }

    public function storeExamItem(Request $request, $id)
    {

      //insert validator here

      foreach ($request->soal as $id => $value) {
        //insert soal
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
      }
    }
}
