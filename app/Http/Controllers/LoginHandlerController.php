<?php

namespace Eoola\Http\Controllers;

use Illuminate\Http\Request;

use Eoola\Http\Requests;
use Auth;

class LoginHandlerController extends Controller
{
	public function handle()
	{
		if (Auth::check()) {
			switch (Auth::user()->role) {
				case 'admin':
					return redirect('admin');
					break;
				case 'student':
					return redirect('student');
					break;
				case 'teacher':
					return redirect('teacher');
					break;
			}
		} else{
			return redirect('login');
		}
	}
}
