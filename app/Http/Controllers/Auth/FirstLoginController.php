<?php

namespace Eoola\Http\Controllers\Auth;

use Illuminate\Http\Request;

use Eoola\Http\Requests;
use Eoola\Http\Controllers\Controller;

use Eoola\User;

use Auth;

class FirstLoginController extends Controller
{
	public function __construct()
    {
        $this->middleware('first-login');
    }

	public function getIndex()
	{
		return view('auth.change-password');
	}

    public function postIndex(Request $request)
    {
    	$validator = Validator::make($request->all(), [
    			'password' => 'required|min:6|confirmed'
    		]);

        if ($validator->fails()) {
            return redirect()->back()
                ->with('errors', $validator);
        }

        $user = User::where('id', Auth::user()->id)->update([
        	'password' => bcrypt($request->password),
        	]);
    }

    public function getSkip()
    {
    	session()->set('skip', true);
    	return redirect('/');
    }
}
