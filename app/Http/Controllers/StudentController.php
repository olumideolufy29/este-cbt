<?php

namespace Eoola\Http\Controllers;

use Illuminate\Http\Request;

use Eoola\Http\Requests;
use Validator;
use Eoola\Test;

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
    	$questions = Test::find($id)->questions->all();
		return view('ujian',[
			'questions' => $questions,
			]);
    }
}
