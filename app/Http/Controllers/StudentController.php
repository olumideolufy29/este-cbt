<?php

namespace Eoola\Http\Controllers;

use Illuminate\Http\Request;

use Eoola\Http\Requests;

class StudentController extends Controller
{
    public function index()
    {
      return view('DashboardSiswa');
    }

    public function ujian($id)
    {
      return view('ujian');
    }
}
