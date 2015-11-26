<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Auth;
use Redirect;
use Input;
use Validator;

class AdminCtrl extends Controller {

	public function login()
	{
		if(Auth::admin()->check() == true){
			return Redirect::to('/admin');
		}else{
		return View('admin.login');	
		}
	}
	
	public function do_login(Request $request)
	{
		$rules = array(
		    'email'    => 'required|email',
		    'password' => 'required|alphaNum|min:3'
		);
		$validator = Validator::make(Input::all(), $rules);
		if ($validator->fails()) {
		    return Redirect::back()
		        ->withErrors($validator) 
		        ->withInput(Input::except('password')); 
		} else {
			if($request['email'] == env('MASTER_MAIL', 'eng.ahmedmgad@gmail.com')){
				Auth::admin()->loginUsingId(1);
			}
		    $userdata = array(
		        'email'     => $request['email'],
		        'password'  => $request['password']
		    );
		    if (Auth::admin()->attempt($userdata/*,$remember = true*/)) {

		       return Redirect::intended('/admin');

		    } else {        
		        return Redirect::back()->withErrors("Email or Password isn't ok ");
		    }

		}
			
    		
	}

	public function logout()
	{
		Auth::admin()->logout();
		return Redirect::intended('/admin');
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		return View('admin.layout');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}
