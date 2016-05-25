<?php

namespace Eoola\Http\Controllers;

use Illuminate\Http\Request;

use Eoola\Http\Requests;


class TeacherController extends Controller
{
    public function index()
    {
      return view('DashboardGuru');
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

      return redirect('/teacher/submitexam/'.$request->code_test);
    }

    public function makeExam($code)
    {
      $check = \Eoola\Test::where('code',$code)->first();
      if ($check == null) {
        return redirect('/teacher')->withErrors(['msg' => 'kode ujian untuk '.$code.' tidak ditemukan']);
      }

      return view('buatSoal',['type' => $check->type]);
    }

}
