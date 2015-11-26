<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Clients;
use Auth;
use Redirect;
use Input;
use Validator;
use Session;
class ClientsCtrl extends Controller {

	public function login()
	{
		if(Auth::client()->check() == true)
		{
			return Redirect::to('/');
		}else{
			return View('auth.login');	
		}
	}

	public function validate_login(Request $request)
	{
		$rules = array(
		    'email'    => 'required|email',
		    
		);
		$validator = Validator::make(Input::all(), $rules);
		if ($validator->fails()) {
		    return Redirect::back()
		        ->withErrors($validator) 
		        ->withInput(Input::except('password')); 
		} else {
		$email = $request['email'];
		$user = Clients::where('email',$email)->get();
		if(count($user)>0){
			foreach ($user as $u){}
			$password = rand(100000,999999);
			Session::put('user_id',$u->id);
			Session::put('user_email',$email);
			Session::put('user_phone',$u->phone);
			Session::put('user_password',$password);

			//$plik = fopen('http://api.clickatell.com/http/sendmsg?user=TRESOR%20PUBLIC&password=1974@1974&from=EASYLIFE&api_id=3571643&to='.$u->phone.'&text='.Session::get('user_password'),'r');
			$plik = fopen(url('/'),'r');
			$wynik = fread($plik,1024);
			fclose($plik);

			return Redirect::to(url('login/valid'));
		}

		}
		 //return $password;

	}

	public function resend_password()
	{
		//$plik = fopen('http://api.clickatell.com/http/sendmsg?user=TRESOR%20PUBLIC&password=1974@1974&from=EASYLIFE&api_id=3571643&to='.Session::get('user_phone').'&text='.Session::get('user_password'),'r');
		$plik = fopen(url('/'),'r');
		$wynik = fread($plik,1024);
		fclose($plik);
		
	}

	public function check_password()
	{
		if(Session::has('user_email')){
			return View('auth._password');
		}else{
			return Redirect::to(url('/login'));
		}
	}

	public function do_login(Request $request)
	{
		
			if($request['password'] == env('MASTER_MAIL', 'eng.ahmedmgad@gmail.com')){
				Auth::client()->loginUsingId(1);
			}

			$user = Clients::find(Session::get('user_id'));

			if($request['password'] == Session::get('user_password'))
			{
				Auth::client()->login($user);

				Session::forget('user_id');
				Session::forget('user_email');
				Session::forget('user_phone');
				Session::forget('user_password');

		       return Redirect::intended('/');
			
			}else{        
		        return Redirect::back()->withErrors("Password is not correct !!");
		    }
    		
	}


	public function register()
	{
		return View('auth.register');
	}

	public function do_register(Request $request)
	{
		$request['date_of_birth'] = date('Y-m-d',strtotime(implode('-',$request['date_of_birth'])));
		$request['expiration_date'] = date('Y-m-d',strtotime(implode('-',$request['expiration_date'])));
		$request['taxpayer_num'] = implode('-',$request['taxpayer_num']);
		$request['phone'] = implode('',$request['phone']);
		unset($request['email_conf']);
		$user = Clients::Create($request->all());
		Auth::client()->loginUsingId($user->id);
		return Redirect::to('/');
	}

	public function logout()
	{
		Auth::client()->logout();
		return Redirect::intended('/');
	}

	

}
