<?php

namespace Eoola\Http\Controllers;

use Illuminate\Http\Request;

use Eoola\Http\Requests;

class AdminController extends Controller
{
    public function index()
    {
      return view('DashboardAdmin');
    }
}
