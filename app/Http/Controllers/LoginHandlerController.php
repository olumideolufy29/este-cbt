<?php

namespace Eoola\Http\Controllers;

use Illuminate\Http\Request;

use Eoola\Http\Requests;
use Auth;

use Session;

class LoginHandlerController extends Controller
{
	public function handle()
	{
		if (Auth::check()) {
			if (Auth::user()->first != 'yes' || Session::get('skip') == true) {
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

			} else {
				return redirect('first-login');
			}

		} else{
			return redirect('login');
		}
	}

	public function changePass()
	{
		return view('changePassword');
	}

}
