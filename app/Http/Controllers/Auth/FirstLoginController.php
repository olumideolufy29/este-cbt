<?php

namespace Eoola\Http\Controllers\Auth;

use Illuminate\Http\Request;

use Eoola\Http\Requests;
use Eoola\Http\Controllers\Controller;

use Eoola\User;

use Auth;
use Validator;

class FirstLoginController extends Controller
{

	public function getIndex()
	{
		return view('auth.first-login');
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
            'first' => 'no',
        	]);

        return redirect('/');
    }

    public function getSkip()
    {
    	session()->set('skip', true);
    	return redirect('/');
    }
}
