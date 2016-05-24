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
}
