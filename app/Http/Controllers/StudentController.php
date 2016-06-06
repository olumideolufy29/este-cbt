<?php

namespace Eoola\Http\Controllers;

use Illuminate\Http\Request;

use Eoola\Http\Requests;
use Validator;
use Eoola\Test;
use Eoola\Answer;
use Eoola\Question;
use Eoola\Result;

class StudentController extends Controller
{
	public function __construct(){
    	if (session()->get('ujianberlangsung')) {
			return $this->ujian(session()->get('test-id'));
    	}		
	}
    public function index()
    {
    	if (session()->get('ujianberlangsung')) {
			return $this->ujian(session()->get('test-id'));
    	}		

      return view('student.index');
    }
    public function submit(Request $request)
    {
    	$rules = [
    		'answer.*' => 'in:a,b,c,d,e',
    		'question.*' => 'required'
    	];
    	$validator = Validator::make($request->all(), $rules);
    	if ($validator->fails()) {	
    		return redirect()->back()->withErrors($validator)->withInput($request->input());
    	}

    	$jmlSoal = count($request->question);
    	$benar = 0;
    	foreach ($request->question as $key => $question_id) {
			$question = Question::find($question_id);
			$test = $question->test_id;

    		if ($request->answer[$key] != "") {
    			if ($question->correct_answer == $request->answer[$key]) {
    				$benar++;
    			}
    			$answer = new Answer;
    			$answer->answer = $request->answer[$key];
    			$answer->question_id = $question_id;
    			$answer->user_id = auth()->user()->id;
    			$answer->save();
    		}

    	}
    	$nilai = round($benar/$jmlSoal*100,2);

    	$result = new Result;
    	$result->score=$nilai;
    	$result->test_id=$test;
    	$result->user_id=auth()->user()->id;
    	$result->save();

    	return redirect('logout')->with('message','Terimakasih, jawabanmu sudah tersimpan. :)');
    }
    public function masuk(Request $request)
    {

    	$rules = [
    		'test_code' => 'required'
    	];
    	$validator = Validator::make($request->all(), $rules);
    	if ($validator->fails()) {	
    		return redirect()->back()->withErrors($validator);
    	}
    	$ujian = Test::where('code',$request->test_code)->first();
    	if ($ujian == null) {
    		return redirect()->back()->withErrors(['Kode Tes yang kamu masukkan tidak ada.']);
    	} 
		return $this->ujian($ujian->id);
//	    return redirect('student/ujian/'. $ujian->id);
    }
    public function ujian($id)
    {
    	session()->set('ujianberlangsung',true);
    	session()->set('test-id', $id);
    	$test = Test::find($id);
    	$questions = $test->questions->all();
		return view('ujian',[
			'questions' => $questions,
			'test' => $test,
			]);
    }
}
